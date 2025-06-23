@extends('auth.layout.dashboard')

@section('estilo')
    <link rel="stylesheet" href="{{ asset('views/css/caso-detalhes.css') }}">
    <link rel="stylesheet" href="{{ asset('views/css/caso-detalhes-modais.css') }}">
@endsection

@section('content')
<div class="processo-container">
    <!-- Informações do Caso -->
    <div class="info-box">
        @if($caso->encerrado)
            <span class="tag-dashboard encerrado">Finalizado</span>
        @else
            <span class="tag-dashboard">Em andamento</span>
        @endif
        <p><strong>Número do Processo:</strong> {{ $caso->numero_processo }}</p>
        <p><strong>Tribunal:</strong> {{ $caso->tribunal }}</p>
        <p><strong>Órgão Julgador:</strong> {{ $caso->orgaoJulgador }}</p>
        <p><strong>Assuntos:</strong> {{ $caso->assunto }}</p>
            
        
    </div>

    <!-- Ações -->
    <div class="actions">
        <button class="btn-dashboard" onclick="document.getElementById('comentarioModal').classList.add('ativo')">Adicionar Comentário</button>
        <button class="btn-dashboard btn-prazo" onclick="document.getElementById('prazoModal').classList.add('ativo')">
            {{ $caso->prazo ? 'Editar Prazo' : 'Adicionar Prazo' }}
        </button>
        <button class="btn-dashboard btn-arquivo" onclick="document.getElementById('arquivoModal').classList.add('ativo')">Adicionar Arquivo</button>

        @if(!$caso->encerrado)
        <form action="{{route('caso.finalizar', $caso->id)}}" method="POST">
            @csrf
            <button type="submit" class="btn-dashboard btn-finalizar">Finalizar</button>
        </form>
        @else
            <form action="{{route('caso.reabrir', $caso->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn-dashboard btn-reabrir">Abrir</button>
            </form>
        @endif
    </div>

    <!-- Comentários -->
    <div class="mb-4">
        <h5 class="section-title">Comentários</h5>
        @if($caso->comentarios && $caso->comentarios->count())
            <ul class="agenda-tarefas-list">
                @foreach($caso->comentarios as $comentario)
                    <li class="agenda-tarefa-card">
                        <div class="agenda-tarefa-info">
                            <div class="agenda-tarefa-textos">
                                <span class="agenda-tarefa-titulo">{{ $comentario->titulo }}</span>
                                <span class="agenda-tarefa-descricao">{{ $comentario->conteudo }}</span>
                                <span class="agenda-tarefa-data">Criado em: {{ $comentario->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="agenda-sem-tarefas">Nenhum comentário ainda.</div>
        @endif
    </div>

    <!-- Prazo -->
    <div class="mb-4">
        <h5 class="section-title">Prazo</h5>
        @if($caso->prazo)
            <div class="agenda-tarefa-card">
                <div class="agenda-tarefa-info">
                    <div class="agenda-tarefa-textos">
                        <span class="agenda-tarefa-titulo">{{ $caso->prazo }}</span>
                    </div>
                </div>
            </div>
        @else
            <div class="agenda-sem-tarefas">Nenhum prazo cadastrado.</div>
        @endif
    </div>

    <!-- Lista de Arquivos -->
    <div class="file-list">
        <h5 class="section-title">Anexos</h5>
        @if($caso->documentos && $caso->documentos->isNotEmpty())
            <ul class="agenda-tarefas-list">
                @foreach($caso->documentos as $documento)
                    <li class="agenda-tarefa-card" style="align-items: center;">
                        <div class="agenda-tarefa-info">
                            <div class="agenda-tarefa-textos">
                                <span class="agenda-tarefa-titulo">{{ $documento->nome }}</span>
                            </div>
                        </div>
                        <a href="{{ route('casos.download', $documento->id) }}" class="btn-dashboard btn-download">Baixar</a>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="agenda-sem-tarefas">Nenhum arquivo enviado.</div>
        @endif
    </div>
</div>

<div class="modal-externo-caso" id="comentarioModal">
    <div class="modal-interno-caso">
        <button id="closeComentario" type="button">&times;</button>
        <form method="POST" action="{{ route('casos.comentar', $caso->id) }}">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            <div class="form-group">
                <label for="conteudo">Comentário</label>
                <textarea name="conteudo" id="conteudo" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn-dashboard">Salvar</button>
        </form>
    </div>
</div>

<!-- Modal Adicionar Prazo -->
<div class="modal-externo-caso" id="prazoModal">
    <div class="modal-interno-caso">
        <button id="closePrazo" type="button">&times;</button>
        <form method="POST" action="{{ route('casos.prazo', $caso->id) }}">
            @csrf
            <div class="form-group">
                <label for="prazo">Prazo</label>
                <input type="date" name="prazo" id="prazo" value="{{ $caso->prazo }}">
            </div>
            <button type="submit" class="btn-dashboard">Salvar</button>
        </form>
    </div>
</div>

<!-- Modal Adicionar Arquivo -->
<div class="modal-externo-caso" id="arquivoModal">
    <div class="modal-interno-caso">
        <button id="closeArquivo" type="button">&times;</button>
        <form method="POST" action="{{ route('casos.upload', $caso->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="documento">Arquivo</label>
                <input type="file" name="documento" id="documento" required>
            </div>
            <button type="submit" class="btn-dashboard">Enviar</button>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('closeComentario').onclick = function() {
                document.getElementById('comentarioModal').classList.remove('ativo');
            };
            document.getElementById('closePrazo').onclick = function() {
                document.getElementById('prazoModal').classList.remove('ativo');
            };
            document.getElementById('closeArquivo').onclick = function() {
                document.getElementById('arquivoModal').classList.remove('ativo');
            };
            ['comentarioModal','prazoModal','arquivoModal'].forEach(function(id){
                document.getElementById(id).onclick = function(e){
                    if(e.target === this) this.classList.remove('ativo');
                }
            });
        });
    </script>
@endsection