@extends('auth.layout.dashboard')

@section('estilo')
    <link rel="stylesheet" href="{{asset('views/css/tarefas.css')}}">
@endsection

@section('content')
<div class="agenda-tarefas-container">
    
    @if($tarefas->count())
        <ul class="agenda-tarefas-list">
            @foreach($tarefas as $tarefa)
                <li class="agenda-tarefa-card {{ $tarefa->finalizada ? 'concluida' : '' }}">
                    <div class="agenda-tarefa-info">
                        <div class="agenda-tarefa-icone">
                            <span class="material-icons-sharp">event_note</span>
                        </div>
                        <div class="agenda-tarefa-textos">
                            <div class="agenda-tarefa-titulo">{{ $tarefa->titulo }}</div>
                            <div class="agenda-tarefa-descricao">{{ $tarefa->conteudo }}</div>
                        </div>
                    </div>
                    @if(!$tarefa->finalizada)
                        <form method="POST" action="{{ route('tarefa.concluir', $tarefa->id) }}">
                            @csrf
                            <button class="agenda-btn-concluir" title="Marcar como concluída">
                                <span class="material-icons-sharp">check_circle</span>
                                Concluir
                            </button>
                        </form>
                    @else
                        <span class="agenda-tarefa-status"><span class="material-icons-sharp">check</span> Concluída</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <div class="agenda-sem-tarefas">Nenhuma tarefa cadastrada.</div>
    @endif
</div>
@endsection