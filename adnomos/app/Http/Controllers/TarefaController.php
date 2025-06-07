<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index(){
        $tarefas = Tarefa::where('user_id',Auth::id())->get();
        return view('auth.agenda',compact('tarefas'));
    }

    public function store(Request $request){
        Tarefa::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);
        return redirect()->route('dashboard');
    }

    public function concluir($id){
        $tarefa = Tarefa::find($id);
        $tarefa->finalizada = true;
        $tarefa->delete();
        return redirect()->route('tarefas');
    }
}
