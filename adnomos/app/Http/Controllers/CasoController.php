<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Comentario;
use App\Helpers\Datajud\EndpointFinder;
use App\Jobs\BuscarProcessos;
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

    public function buscarComAPI()
    {
        $oabPedacos = explode('/', Auth::user()->oab);
        $userOAB    = $oabPedacos[0];
        $uf         = $oabPedacos[1];
        $userId     = Auth::id();

    
        BuscarProcessos::dispatch($userId, $userOAB, $uf);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Importação iniciada! Aguarde alguns instantes.');
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