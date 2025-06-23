<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request){
    $user = Auth::user();
    $query = $user->casos();

    // Sempre pegue todos os casos para os totais
    $todosCasos = $query->get();

    $busca = $request->input('busca');
    if ($request->filled('busca')) {
        $casosBuscados = $query->where(function($q) use ($busca) {
            $q->where('numero_processo', 'like', "%$busca%");
        })->orderBy('acessos','desc')->get();

            $casosRestantes = $user->casos()
            ->where('numero_processo', 'not like', "%$busca%")
            ->orderBy('acessos','desc')->get();

            $casos = $casosBuscados->concat($casosRestantes);
        } else {
            $casos = $todosCasos->sortByDesc('acessos');
        }

        $nomeCompleto = $user->name;
        $partes = explode(" ",$nomeCompleto);
        $nome = $partes[0];

        
        $totalCasos = Auth::user()->casos()->count();
        $numeroCasosEncerrados = Auth::user()->casos()->where('encerrado', true)->count();
        $numeroCasosAbertos = Auth::user()->casos()->where('encerrado', false)->count();

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
