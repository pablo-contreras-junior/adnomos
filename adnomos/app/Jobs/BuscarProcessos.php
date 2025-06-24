<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;   
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class BuscarProcessos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $userId;
    protected string $userOAB;
    protected string $uf;

    public function __construct(int $userId, string $userOAB, string $uf)
    {
        $this->userId  = $userId;
        $this->userOAB = $userOAB;
        $this->uf      = $uf;
    }

    public function handle(): void
    {
        $url = config('services.escavador.base_url')
             . 'api/v2/advogado/processos?oab_numero='
             . $this->userOAB . '&oab_estado=' . $this->uf;

        $key = config('services.escavador.key');

        do {
            $response = Http::withoutVerifying()
                ->withHeaders([
                    'Authorization'    => 'Bearer ' . $key,
                    'X-Requested-With' => 'XMLHttpRequest',
                ])->get($url);

            $data = $response->json();
            $this->salvar($data);

            $url = $data['links']['next'] ?? null;
        } while ($url);
    }

    private function salvar(array $arrayDados): void
    {
        $items   = $arrayDados['items'];
        $now     = now();
        $records = [];

        foreach ($items as $item) {
            $records[] = [
                'user_id'         => $this->userId,
                'assunto'         => $item['fontes'][0]['capa']['assunto_principal_normalizado']['nome'] ?? 'Não Disponível',
                'numero_processo' => $item['numero_cnj'],
                'polo_ativo'      => $item['titulo_polo_ativo'] ?? 'Não Disponível',
                'tribunal'        => $item['unidade_origem']['tribunal_sigla'],
                'created_at'      => $now,
                'updated_at'      => $now,
            ];
        }

        $existing = DB::table('casos')
            ->whereIn('numero_processo', array_column($records, 'numero_processo'))
            ->pluck('numero_processo')
            ->toArray();

        $newRecords = array_filter(
            $records,
            fn($r) => !in_array($r['numero_processo'], $existing)
        );

        if (!empty($newRecords)) {
            DB::table('casos')->insert($newRecords);
        }
    }
}
