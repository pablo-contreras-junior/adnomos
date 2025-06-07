@extends('auth.layout.dashboard')
@section('content')
    <h1 class="adnomos"></h1>
            <div class="date">
                
            </div>

            <div class="insights">

                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total de Casos</h3>
                            <h1>{{$totalCasos}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <small class="text-muted"></small>
                </div>
                    <!-- ---------- End Of Sales ------------ -->
                <div class="expenses">
                        <span class="material-icons-sharp">bar_chart</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Casos em Andamento</h3>
                                <h1>{{$numeroCasosAbertos}}</h1>
                            </div>
    
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p></p>
                                </div>
                            </div>
                        </div>
    
                        <small class="text-muted"></small>
                </div>
                        <!-- ---------- End Of Expenses ------------ -->   
                <div class="income">
                        <span class="material-icons-sharp">bar_chart</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Casos Finalizados</h3>
                                <h1>{{$numeroCasosEncerrados}}</h1>
                            </div>
    
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p></p>
                                </div>
                            </div>
                        </div>
    
                        <small class="text-muted"></small>
                </div>
                 <!--------------- End Of Icome ------------ -->

            </div>
                  <!--------------- End Of Insights ------------ -->
           
                    <div class="recent-orders">
                        <h3>Acessados Recentemente</h3>

                            <input name="numero_processo" type="text" id="filtro" placeholder="Buscar numero do processo ou nome da" style="padding:17px; border-radius:10px; margin-bottom:20px;">
                            <button id="botao-filtro" type="submit">Buscar</button>

                        <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Numero do Processo</th>
                                    <th>Polo Ativo</th>
                                    <th>Tribunal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>   
                                @foreach($casos->take(7) as $caso)
                                    @if(!empty($caso->id))
                                        <tr>
                                            <td>{{$caso->numero_processo}}</td>
                                            <td>{{$caso->polo_ativo}}</td>
                                            <td>{{$caso->tribunal}}</td>
                                            <td class="warning">Aberto</td>
                                            <td class="primary"><a href="{{route('casos.detalhes', ['idCaso' => $caso->id])}}">Details</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
@endsection

@section('right-side')
    
@endsection