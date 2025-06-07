<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
        rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="{{asset('views/css/style_PainelADM.css')}}">
        <link rel="stylesheet" href="{{asset('views/css/tarefas-dashboard.css')}}">
        <link rel="stylesheet" href="{{asset('views/css/modelos-dashboard.css')}}">
        @yield('estilo')
        <title>AdNomos - Painel</title>
        
    </head>

    <div class="modal-tarefa-bg" id="modalTarefaBg">
        <div class="modal-tarefa">
            <button class="close-modal-tarefa" id="closeModalTarefa">&times;</button>
            <h2 class="modal-tarefa-title">Nova Tarefa Semanal</h2>
            <form action="{{ route('tarefas.criar') }}" method="POST">
                @csrf
                <div class="modal-tarefa-group">
                    <label for="titulo-tarefa">Título</label>
                    <input type="text" id="titulo-tarefa" name="titulo" required>
                </div>
                <div class="modal-tarefa-group">
                    <label for="descricao-tarefa">Descrição</label>
                    <textarea id="descricao-tarefa" name="conteudo" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn-dashboard" style="width:100%;">Salvar Tarefa</button>
            </form>
        </div>
    </div>

<body>
    <div class="modal-externo" id="modalDocumento">
        <div class="modal-interno">
            <div class="top">
                <h3  class="modal-titulo"></h3>
                <button id="modal-fechar">&times;</button>
            </div> 
            <iframe id="iframe-pdf" src=""></iframe>
        </div>
    </div>

    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img  src="{{asset('views/images/logo(fundoBranco).png')}}" alt="">
                    <h2>Ad<span class="danger">Nomos</span></h2>
                </div>
               
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{route('dashboard')}}" class="{{ request()->routeIs('dashboard')? 'active': '' }}">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Home</h3>
                </a>
                <a href="{{ route('casos') }}" class="{{ request()->routeIs('casos')? 'active': '' }}">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Casos</h3>
                </a>             
                <a href="{{ route('notificacoes') }}" class="{{ request()->routeIs('notificacoes')? 'active': '' }}">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Notificações</h3>
                    <span class="message-count" style="color:white">{{Auth::user()->notifications->count()}}</span>
                </a>
                <a href="{{route('tarefas')}}" class="{{ request()->routeIs('tarefas')? 'active': '' }}">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Tarefas</h3>
                </a>
                <a href="{{route('perfil')}}" class="{{ request()->routeIs('perfil')? 'active': '' }}">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Perfil</h3>
                </a>
                <a href="{{route('caso.add')}}" class="{{ request()->routeIs('caso.add')? 'active': '' }}">
                    <span class="material-icons-sharp">add</span>
                    <h3>Adicionar Caso</h3>
                </a>
                <a href="{{route('calendario')}}" class="{{ request()->routeIs('calendario')? 'active': '' }}">
                    <span  i class='bx bx-calendar'></i></span>
                    <h3>Calendário</h3>
                </a>
                <a href="" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Sair</h3>
                </a>

                <form action="{{ route('logout') }}" method="POST" id="form-logout" style="display:none;">
                    @csrf
                </form>
                
            </div>
        </aside>

        <main>
            @yield('content') 
        </main>

            <div class="right">
                <div class="top">
                    <button id="menu-btn"> 
                        <span class="material-icons-sharp">
                            menu
                            </span>
                    </button>

                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>

                    <div class="profile">
                        <div class="info">
                            <p>Olá, <b>{{explode(' ',Auth::user()->name)[0]}}</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('storage/images/user-default.png') }}">
                        </div>
                    </div>

                </div>
                    <div class="recent-updates">
                    <h2>Tarefas Semanais</h2>
                    <div class="updates">
                        @forelse(Auth::user()->tarefas()->take(3)->get() as $tarefa)
                            <div class="update tarefa-card">
                                <div class="tarefa-icone">
                                    <span class="material-icons-sharp">event_note</span>
                                </div>

                                <div class="message tarefa-message">
                                    <p class="tarefa-titulo">
                                        {{ $tarefa->titulo }}
                                    </p>
                                    <p class="tarefa-descricao">
                                        {{ $tarefa->conteudo }}
                                    </p>
                                    <small class="tarefa-data">
                                        {{ \Carbon\Carbon::parse($tarefa->data ?? $tarefa->created_at)->format('d/m/Y') }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <div class="update tarefa-card">
                                <div class="message">
                                    <p>Nenhuma tarefa semanal cadastrada.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="item add-product">
                        <div id="abrirModalTarefa" style="cursor:pointer;">
                            <span class="material-icons-sharp">add</span>
                            <h3>Adicionar Tarefa</h3>
                        </div>
                    </div>
                </div>
                
                <br><br>

                <div class="sales-analytics">
                    <h2>Modelos de documentos</h2>

                    <div 
                        class="item customers abrir-modal-doc"
                        data-doc="{{ asset('storage/modelos/peticao.pdf') }}"
                        data-val="Petição Inicial"
                    >
                        <div class="icon">
                            <span class="bx bxs-cloud-download"></span>
                        </div>
                        
                        <div class="right">
                            <div class="info">
                                <p>
                                    Petição Inicial
                                </p>
                            </div>
                            
                        </div>
                    </div>

                    <div 
                        class="item customers abrir-modal-doc"
                        data-doc="{{ asset('storage/modelos/peticao.pdf') }}"
                        data-val="Recursos"
                    >

                        <div class="icon">
                            <span class="bx bxs-cloud-download"></span>
                        </div>
                        
                        <div class="right">
                            <div class="info">
                                <p>
                                    Recursos
                                </p>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div 
                        class="item customers abrir-modal-doc"
                        data-doc="{{ asset('storage/modelos/peticao.pdf') }}"
                        data-val="Agravos"
                    >
                        <div class="icon">
                            <span class="bx bxs-cloud-download"></span>
                        </div>
                        
                        <div class="right">
                            <div class="info">
                                <p>
                                    Agravos
                                </p>
                            </div>
                            
                        </div>
                    </div>

                    
                </div>
            </div>
                
        </div>
    </div>
    
    <script src="{{asset('views/js/script_painelADM.js')}}"></script>
    <script src="{{asset('views/js/ordes_painelADM.js')}}"></script>

    <script>

        function calcularGrafico(circulo, comparativo, total){
            const raio = parseFloat(circulo.getAttribute('r'));
            const circunferencia = 2 * Math.PI * raio;

            circulo.style.strokeDasharray = ${circunferencia};
            if(total > 0){
                circulo.style.strokeDashoffset = ${circunferencia * (1 - (comparativo / total))}; 
            }else{
                circulo.style.strokeDashoffset = 0;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const circleAbertos = document.querySelector("main .insights .expenses svg circle");
            const circleEncerrados = document.querySelector("main .insights .income svg circle");

            const numCasosAbertos = {{Auth::user()->casos()->where('encerrado','==',true)->count()}};
            const numCasosEncerrados = {{Auth::user()->casos()->where('encerrado','!=',true)->count()}};

            const totalCasos = {{Auth::user()->casos()->count()}};

            calcularGrafico(circleAbertos,numCasosAbertos,totalCasos);
            calcularGrafico(circleEncerrados,numCasosEncerrados,totalCasos);
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const abrir = document.getElementById('abrirModalTarefa');
            const modalBg = document.getElementById('modalTarefaBg');
            const fechar = document.getElementById('closeModalTarefa');

            if(abrir && modalBg && fechar){
                abrir.onclick = () => modalBg.classList.add('active');
                fechar.onclick = () => modalBg.classList.remove('active');
                window.onclick = function(e) {
                    if (e.target === modalBg) modalBg.classList.remove('active');
                }
            }
        });
    </script>

    <script>
    
        const modal = document.getElementById('modalDocumento');
        const fechar = document.getElementById('modal-fechar');
        const iframe = document.getElementById('iframe-pdf');
        const botoes = document.querySelectorAll('.abrir-modal-doc');
        const titulo = document.getElementsByClassName('modal-titulo')[0];

        botoes.forEach(btn => {
            btn.addEventListener('click', function() {
                iframe.src = btn.getAttribute('data-doc');
                modal.classList.add('ativo');
                titulo.innerHTML = btn.getAttribute('data-val');
            });
        });

        fechar.addEventListener('click', function() {
            modal.classList.remove('ativo');
            iframe.src = "";
        });

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('ativo');
                iframe.src = "";
            }
        });
    
    </script>

    @yield('script')

</body>

</html>