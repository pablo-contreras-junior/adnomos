<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OABController extends Controller
{
    public function index(){
        $nomeCompleto = Auth::user()->name;
        $partes = explode(" ",$nomeCompleto);
        $nome = $partes[0];
        return view('auth.buscar-oab',compact('nome'));
    }

    public function store(Request $request){
        $user = Auth::user();
        $user->oab = $request->oab . '/' . $request->uf;
        $user->save();

        // Vai redirecionar para a rota de buscar processos
        return redirect()->route('salvarCasos.get');
    }
}
