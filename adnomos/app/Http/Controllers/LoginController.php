<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){

        $dados = $request->only('email','password');

        if (Auth::attempt($dados)){
            if(Auth::user()->oab === null){
                return redirect()->route('cadastroOAB.get');
            }
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->with('error','Email ou senha inválidos');
    }
}
