<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function index(){
        return view('auth.perfil');
    }

    public function atualizar(Request $request){
        $validated = Validator::make($request->all(),[
            'password' => 'nullable|confirmed'
        ]);
        if($validated->passes()){
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cnpj = $request->filled('cnpj') ? $request->cnpj : null;
            $user->cpf = $request->filled('cpf') ? $request->cpf : null;
            if($request->filled('password')){
                $user->password = $request->password;
            }
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('foto_perfil', 'public');
                $user->foto = $foto;
            }

            $user->save();
            return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
        }
        return redirect()->back()->withErrors($validated)->withInput();
    }
}
