<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CadastroController extends Controller
{
    public function stepOne(){
        return view('cadastro');
    }

    public function stepOnePost(Request $request){

        Session::put('form:steps', $request->tipo_pessoa);
        return redirect()->route('stepTwo.get');
    }

    public function stepTwo(){
        if(Session::get('form:steps') === "Pessoa Física"){
            return view('cadastro-fisica');
        } else{
            return view('cadastro-juridica');
        }
    }

    public function stepTwoPostFisica(Request $request){
        
        $validated = Validator::make($request->all(),[
            'nome' => 'string|required|max:255',
            'celular' => 'string|required',
            'email' => 'string|required|email|unique:users',
            'cpf' => 'string|required',
            'password' => 'required|confirmed',
        ],[
            'nome.string' => 'o nome deve conter apenas letras',
            'nome.max' => 'o nome deve conter apenas 255 caractéres',
            'email.email' => 'o email informado não é válido',
            'email.unique' => 'o email informado já existe',
            'password.confirmed' => 'as senhas não são iguais',
        ]);

        if(!$validated->fails()){
            return $this->cadastrarFisica($request);
        }else{
            return back()->withErrors($validated->errors())->withInput();
        }
    }

    public function cadastrarFisica($request){
        User::create([
            'name' => $request->nome,
            'email' =>$request->email,
            'password' => $request->password,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
        ]);
        return redirect()->route('login');
    }

    public function stepTwoPostJuridica(Request $request){

        $validated = Validator::make($request->all(),[
            'nome' => 'string|required|max:255',
            'email' => 'string|email|unique:users',
            'cnpj' => 'string|required',
            'password' => 'required|confirmed',
        ],[
            'nome.string' => 'o nome deve conter apenas letras',
            'nome.max' => 'o nome deve conter apenas 300 caractéres',
            'email.email' => 'o email informado não é válido',
            'email.unique' => 'o email informado já existe',
            'password.confirmed' => 'as senhas não são iguais',
        ]);

        if(!$validated->fails()){
            return $this->cadastrarJuridica($request);
        }else{
            return back()->withErrors($validated->errors())->withInput();
        }
    }

    public function cadastrarJuridica($request){
        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password'=> $request->password,
            'cnpj' => $request->cnpj,
        ]);
        
        return redirect()->route('login');
    }
}
