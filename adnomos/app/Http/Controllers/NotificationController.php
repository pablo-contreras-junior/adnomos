<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $notificacoes = Auth::user()->notifications;
        return view('auth.notificacoes', compact('notificacoes'));
    }

    public function ler($id){
        $notificacao = Auth::user()->notifications()->find($id);
        $notificacao->markAsRead();
        $notificacao->delete();
        return redirect()->route('notificacoes');
    }
}
