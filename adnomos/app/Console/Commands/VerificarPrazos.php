<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Caso;
use App\Notifications\PrazoProximo;
use Illuminate\Console\Command;
use Carbon\Carbon;

class VerificarPrazos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:verificar-prazos';
    protected $description = 'verificar todos os prazos proxios e notificar os usuários';


    public function handle()
    {
        $amanha = Carbon::tomorrow()->toDateString();
        $users = User::all();
        
        foreach($users as $user){
            $casosProximos = $user->casos()->whereDate('prazo', $amanha)->get();
            foreach($casosProximos as $caso){
                $user->notify(new PrazoProximo($caso));
            }
        }

        $this->info('notificação enviada com sucesso');
    }
}
