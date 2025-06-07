<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index(){
        return view('auth.calendario');
    }

    public function casos(){
        $casos = Caso::whereNotNull('prazo');
        $userCasos = $casos->where('user_id','=',Auth::id())->get();

        return response()->json($userCasos->map(function($p){
            return [
                'title' => $p->numero_processo,
                'start' => $p->prazo,
            ];
        }));
    }
}
