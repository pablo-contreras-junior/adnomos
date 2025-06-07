@extends('auth.layout.dashboard')

@section('estilo')
    <link rel="stylesheet" href="{{asset('views/css/processos-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('views/css/paginacao.css')}}">
@endsection

@section('content')
        <div class="middle-to-right">
            <table class="tabela-dashboard">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Polo Ativo</th>
                        <th>Assunto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casos as $caso)
                    <tr>
                        <td>{{ $caso->numero_processo }}</td>
                        <td>{{ $caso->polo_ativo }}</td>
                        <td>{{ $caso->assunto }}</td>
                        <td>
                            <a href="{{ route('casos.detalhes', ['idCaso' => $caso->id]) }}" class="btn-dashboard">
                                Acessar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($casos->hasPages())
                <div class="paginacao-processos">
                    
                    @if ($casos->onFirstPage())
                        <span class="pagina-link desativado">&laquo;</span>
                    @else
                        <a href="{{ $casos->previousPageUrl() }}" class="pagina-link">&laquo;</a>
                    @endif

                
                    @foreach ($casos->getUrlRange(1, $casos->lastPage()) as $pagina => $url)
                        @if ($pagina == $casos->currentPage())
                            <span class="pagina-link ativo">{{ $pagina }}</span>
                        @else
                        <a href="{{ $url }}" class="pagina-link">{{ $pagina }}</a>
                        @endif
                    @endforeach

                
                    @if ($casos->hasMorePages())
                        <a href="{{ $casos->nextPageUrl() }}" class="pagina-link">&raquo;</a>
                    @else
                        <span class="pagina-link desativado">&raquo;</span>
                    @endif

                </div>
            @endif
        </div>

            
@endsection