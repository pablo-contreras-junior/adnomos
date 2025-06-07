<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Caso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container { margin-top: 30px; }
        .section-title { margin-bottom: 20px; font-size: 1.5rem; font-weight: bold; color: #333; }
        .info-box { background-color: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
        .info-box h5 { font-weight: bold; color: #007bff; }
        .file-upload, .file-list, .actions { margin-top: 20px; }
        .modal-title { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Detalhes do Caso</h1>

        <!-- Informações do Caso -->
        <div class="info-box mb-4">
            <h5>Informações do Caso</h5>
            <p><strong>Número do Processo:</strong> {{ $caso->numero_processo }}</p>
            <p><strong>Tribunal:</strong> {{ $caso->tribunal }}</p>
            <p><strong>Órgão Julgador:</strong> {{ $caso->orgaoJulgador }}</p>
            <p><strong>Assuntos:</strong> {{ $caso->assunto }}</p>
            <p><strong>Situação:</strong>
                @if($caso->encerrado)
                    <span class="badge bg-danger">Encerrado</span>
                @else
                    <span class="badge bg-success">Em andamento</span>
                @endif
            </p>
        </div>

        <!-- Ações -->
        <div class="actions mb-4">
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#comentarioModal">Adicionar Comentário</button>
            <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#prazoModal">
                {{ $caso->prazo ? 'Editar Prazo' : 'Adicionar Prazo' }}
            </button>
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#arquivoModal">Adicionar Arquivo</button>
        </div>

        <!-- Comentários -->
        <div class="mb-4">
            <h5 class="section-title">Comentários</h5>
            @if($caso->comentarios && $caso->comentarios->count())
                <ul class="list-group">
                    @foreach($caso->comentarios as $comentario)
                        <li class="list-group-item">
                            <strong>{{ $comentario->titulo }}</strong><br>
                            <span>{{ $comentario->conteudo }}</span>
                            <div class="text-muted small">Criado em: {{ $comentario->created_at->format('d/m/Y H:i') }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Nenhum comentário ainda.</p>
            @endif
        </div>

        <!-- Prazo (apenas um por caso, sem descrição) -->
        <div class="mb-4">
            <h5 class="section-title">Prazo</h5>
            @if($caso->prazo)
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>{{ $caso->prazo }}</strong>
                    </li>
                </ul>
            @else
                <p class="text-muted">Nenhum prazo cadastrado.</p>
            @endif
        </div>

        <!-- Lista de Arquivos -->
        <div class="file-list">
            <h5 class="section-title">Documentos Enviados</h5>
            @if($caso->documentos && $caso->documentos->isNotEmpty())
                <ul class="list-group">
                    @foreach($caso->documentos as $documento)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $documento->nome }}
                            <a href="{{ route('casos.download', $documento->id) }}" class="btn btn-sm btn-success">Baixar</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Nenhum arquivo enviado.</p>
            @endif
        </div>
    </div>

    <!-- Modal Comentário -->
    <div class="modal fade" id="comentarioModal" tabindex="-1" aria-labelledby="comentarioModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="{{ route('casos.comentar',['idCaso'=> $caso->id]) }}">
            @csrf
            <input type="hidden" name="caso_id" value="{{ $caso->id }}">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="comentarioModalLabel">Adicionar Comentário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="conteudo" class="form-label">Descrição</label>
                    <textarea class="form-control" id="conteudo" name="conteudo" rows="3" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar Comentário</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Modal Prazo (apenas data, um por caso) -->
    <div class="modal fade" id="prazoModal" tabindex="-1" aria-labelledby="prazoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="{{ route('casos.prazo',['idCaso' => $caso->id]) }}">
            @csrf
            <input type="hidden" name="casos_id" value="{{ $caso->id }}">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="prazoModalLabel">{{ $caso->prazo ? 'Editar Prazo' : 'Adicionar Prazo' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="data_prazo" class="form-label">Data do Prazo</label>
                    <input type="date" class="form-control" id="data_prazo" name="prazo"
                           value="{{ $caso->prazo ? $caso->prazo : '' }}" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">{{ $caso->prazo ? 'Salvar Alteração' : 'Salvar Prazo' }}</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Modal Arquivo -->
    <div class="modal fade" id="arquivoModal" tabindex="-1" aria-labelledby="arquivoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="{{ route('casos.upload', ['idCaso' => $caso->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="arquivoModalLabel">Adicionar Arquivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Selecione um arquivo:</label>
                    <input type="file" class="form-control" id="arquivo" name="documento" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar Arquivo</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>