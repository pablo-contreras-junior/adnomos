<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class PeticaoController extends Controller
{
    public function index(){
        return view('auth.modelos.preencher-modelo');
    }

    public function gerar(Request $request){
        $pathModelo = storage_path("app/private/modelos/modelo_peticao.docx");
        $tp = new TemplateProcessor($pathModelo);
        
        $tp->setValue('teste','sucesso');
        $tp->setValue('comarca', $request->comarca);
        $tp->setValue('estado', $request->estado);

        $tp->setValue('autor_nome', $request->autor_nome);
        $tp->setValue('autor_nacionalidade', $request->autor_nacionalidade);
        $tp->setValue('autor_estado_civil', $request->autor_estado_civil);
        $tp->setValue('autor_profissao', $request->autor_profissao);
        $tp->setValue('autor_rg', $request->autor_rg);
        $tp->setValue('autor_cpf', $request->autor_cpf);
        $tp->setValue('autor_endereco', $request->autor_endereco);

        $tp->setValue('advogado_endereco', $request->advogado_endereco);

        $tp->setValue('tipo_acao', $request->tipo_acao);

        $tp->setValue('reu_nome', $request->reu_nome);
        $tp->setValue('reu_nacionalidade', $request->reu_nacionalidade);
        $tp->setValue('reu_estado_civil', $request->reu_estado_civil);
        $tp->setValue('reu_profissao', $request->reu_profissao);
        $tp->setValue('reu_rg', $request->reu_rg);
        $tp->setValue('reu_cpf', $request->reu_cpf);
        $tp->setValue('reu_endereco', $request->reu_endereco);

        $tp->setValue('fatos', $request->fatos);
        $tp->setValue('fundamentacao_juridica', $request->fundamentacao_juridica);

        $tp->setValue('valor_causa', $request->valor_causa);
        $tp->setValue('cidade', $request->cidade);
        $tp->setValue('data', date('d/m/Y')); 

        $tp->setValue('advogado_nome', $request->advogado_nome);
        $tp->setValue('advogado_oab', $request->advogado_oab);


        $file = "sua_peticao.docx";
        $fullPath = storage_path("app/private/gerados/".$file);

        if(!file_exists(dirname($fullPath))){
            mkdir(dirname($fullPath),0777,true);
        }

        $tp->saveAs($fullPath);
        return response()->download($fullPath)->deleteFileAfterSend(true);
    }
}