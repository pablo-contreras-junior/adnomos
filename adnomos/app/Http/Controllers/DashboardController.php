<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $nomeCompleto = Auth::user()->name;
        $partes = explode(" ",$nomeCompleto);
        $nome = $partes[0];

        $user = Auth::user();
        $casos = $user->casos()->get();
        $totalCasos = $casos->count();
        $numeroCasosEncerrados = $casos->filter(fn($caso)=>$caso->encerrado)->count();
        $numeroCasosAbertos = $casos->filter(fn($caso)=> !$caso->encerrado)->count();
        return view('auth.home', 
            compact(
                'nome',
                'user', 
                'casos',
                'totalCasos',
                'numeroCasosEncerrados',
                'numeroCasosAbertos',
            )
        );

    }
}
