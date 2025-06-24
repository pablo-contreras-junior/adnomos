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
                            <div class="circle-round" style="--percentage: 100%;">
                            </div>
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
    
                            <div class="circle-round" style="--percentage: {{ $numeroCasosAbertos > 0 ? ((($numeroCasosAbertos - $numeroCasosEncerrados) / $numeroCasosAbertos) * 100): 0 }}%">
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
    
                            <div class="circle-round" style="--percentage: {{ $numeroCasosAbertos > 0 ? ($numeroCasosEncerrados / $numeroCasosAbertos * 100) : 0 }}%;">
                                            
                                <div class="number">
                                    <p></p>
                                </div>
                            </div>
                        </div>
    
                        <small class="text-muted"></small>
                </div
                 <!-- End Of Icome -------------->

            </div>
                  <!--------------- End Of Insights ------------ -->
           
                    <div class="recent-orders">
                        <h3>Acessados frequentemente</h3>
                        <form method="GET" action="{{route('dashboard')}}">
                            @csrf
                            <input name="busca" type="text" id="filtro" placeholder= "Numero do processo" style="padding:17px; border-radius:10px; margin-bottom:20px;" oninput="formatarNumeroProcesso(this)">
                            <button id="botao-filtro" type="submit">Buscar</button>
                        </form>

                        <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Numero do Processo</th>
                                    <th>Polo Ativo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>   
                                @foreach($casos->take(7) as $caso)
                                    @if(!empty($caso->id))
                                        <tr class="{{ $caso->ultimo_visto ? 'last-seen' : '' }}">
                                            <td>{{$caso->numero_processo}}</td>
                                            <td>{{$caso->polo_ativo}}</td>
                                            <td class="{{$caso->encerrado ? 'warning' : 'success'}}">{{$caso->encerrado ? 'Finalizado' : 'Em andamento'}}</td>
                                            <td class="primary"><a href="{{route('casos.detalhes', ['idCaso' => $caso->id])}}">Detalhes</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
@endsection

@section('script')
    <script>
        function formatarNumeroProcesso(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 20);
            let res = '';
            if (v.length > 7) res += v.substr(0,7) + '-';
            else res += v;
            if (v.length > 7) {
                res += v.substr(7,2);
                if (v.length > 9) res += '.' + v.substr(9,4);
                if (v.length > 13) res += '.' + v.substr(13,1);
                if (v.length > 14) res += '.' + v.substr(14,2);
                if (v.length > 16) res += '.' + v.substr(16,4);
            }
            input.value = res;
        }
    </script>
@endsection