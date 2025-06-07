@extends('auth.layout.dashboard')

@section('estilo')
    <link rel="stylesheet" href="{{asset('views/css/notificacoes.css')}}">
@endsection

@section('content')
    <div class="notificacoes-container">
        
        @if(isset($notificacoes) && $notificacoes->count())
            <ul class="notificacoes-list">
                @foreach($notificacoes as $notificacao)
                    <li class="notificacao-item {{ $notificacao->read_at ? 'lida' : 'nao-lida' }}">
                        <div class="notificacao-icone">
                            <span class="material-icons-sharp">mail_outline</span>
                        </div>
                        <div class="notificacao-conteudo">
                            <div class="notificacao-titulo" style="font-weight:bold;">
                                {{ $notificacao->data['titulo'] ?? 'Notificação' }}
                            </div>
                            <div class="notificacao-mensagem">
                                {{ $notificacao->data['conteudo'] ?? '' }}
                            </div>
                            <div class="notificacao-data">
                                {{ $notificacao->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                        @if(!$notificacao->read_at)
                            <form method="POST" action="{{ route('notificacoes.ler', $notificacao->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-success notificacao-btn">Marcar como lida</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info">Você não possui notificações.</div>
        @endif
    </div>
@endsection