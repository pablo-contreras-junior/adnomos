<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Comentario;
use App\Helpers\Datajud\EndpointFinder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Documento;

class CasoController extends Controller
{
    public function index(){
        $casos = Auth::user()->casos()->orderBy('acessos','desc')->paginate(10);
        return view('auth.casos.casos',compact('casos'));
    }

    public function mostrarDetalhes($idCaso){
        $caso = Caso::findOrFail($idCaso);

        Caso::where('ultimo_visto', true)->update(['ultimo_visto' => false]);
        
        $caso->acessos++;
        $caso->ultimo_visto = true;
        $caso->save();
        return view('auth.caso-detalhes',compact('caso'));
    }

    public function buscarComAPI(){       
        $OABPedacos = explode('/',Auth::user()->oab);
        $userOAB = $OABPedacos[0];
        $uf = $OABPedacos[1];

        $url = config('services.escavador.base_url').'api/v2/advogado/processos?oab_numero='.$userOAB.'&oab_estado='.$uf;
        $key = config('services.escavador.key');
        do{    
            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => 'Bearer '. $key,
                'X-Requested-With' => 'XMLHttpRequest',
            ])->get($url);
            
            $jsonAPIResponse = $response->json();
            $this->salvar($jsonAPIResponse);

            $url = $jsonAPIResponse['links']['next'] ?? null;
        }while(isset($url));

        return redirect()->route('dashboard');
    }

    public function salvar($arrayDados){
        $items = $arrayDados['items'];
        
        $registros = [];
        $userId = Auth::id();

        foreach($items as $item){
            $assunto = $item['fontes'][0]['capa']['assunto_principal_normalizado']['nome'] ?? null;
            $polo_ativo = $item['titulo_polo_ativo'] ?? null;
            $status = $item['fontes'][0]['status_predito'] ?? null;

            $registros[] = [
                'user_id'=> $userId,
                'assunto' => isset($assunto) ? $assunto : 'Não Disponível',
                'numero_processo' => $item['numero_cnj'],
                'polo_ativo' => isset($polo_ativo) ? $polo_ativo : 'Não Disponível',
                'tribunal' => $item['unidade_origem']['tribunal_sigla'],
            ];
        }

        foreach(array_chunk($registros,100) as $lote){
            DB::table('casos')->insert($lote);
        }
    }

    public function upload(Request $request, $idCaso){
        $caso = Caso::findOrFail($idCaso);
        $filename = $request->file('documento')->getClientOriginalName();
        $path = $request->file('documento')->storeAs('documentos' , $filename, 'local');
        $caso->documentos()->create([
            'nome' => $filename,
            'path' => $path,
        ]);

        return redirect()->route('casos.detalhes',['idCaso' => $idCaso]);
    }

    public function download($idDocumento){
        $documento = Documento::findOrFail($idDocumento);
        return response()->download(storage_path("app/private/{$documento->path}"));
    }

    public function criarComentario(Request $request, $idCaso){
        Comentario::create([
            'caso_id' => $idCaso,
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);
        return redirect()->route('casos.detalhes',[
            'idCaso' => $idCaso,
        ]);
    }

    public function addPrazo(Request $request, $idCaso){
        $caso = Caso::findOrFail($idCaso);
        $caso->prazo = $request->prazo;
        $caso->save();
        return redirect()->route('casos.detalhes',['idCaso'=> $idCaso]);
    }


    public function add(){
        return view('auth.add-processo');
    }

    public function save(Request $request){
        $numero_processo = $request->numero_processo;
        $polo_ativo = $request->polo_ativo;
        $assunto = $request->assunto;
        $tribunal = $request->tribunal;
        $orgaoJulgador = $request->orgaoJugador;
        
        Caso::create([
            'user_id' => Auth::id(),
            'numero_processo' => $numero_processo,
            'polo_ativo' => isset($polo_ativo) ? $polo_ativo : '',
            'assunto' => isset($assunto) ? $assunto : '',
            'tribunal' => isset($tribunal) ? $tribunal: null,
            'orgaoJulgador' => isset($orgaoJulgador) ? $orgaoJulgador : null,
        ]);
        return redirect()->route('casos');
    }

    public function finalizar(Request $request, $idCaso){
        $caso = Caso::find($idCaso);
        $caso->encerrado = true;
        $caso->save();

        return redirect()->route('casos.detalhes', $idCaso);
    }

    public function reabrir(Request $request, $idCaso){
        $caso = Caso::find($idCaso);
        $caso->encerrado = false;
        $caso->save();

        return redirect()->route('casos.detalhes', $idCaso);
    }
}