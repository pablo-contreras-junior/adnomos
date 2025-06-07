<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">

    <!-- awesone fonts css-->
    <link href="{{asset('views/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="{{asset('views/owl-carousel/assets/owl.carousel.min.css')}}" type="text/css">
    <!-- Bootstrap  icones CSS -->
    <link rel="stylesheet" href="{{asset('views/css/bootstrap.min.css')}}">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{asset('views/css/style.css')}}">
    <title>Adnomos </title>
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container"><a class="navbar-brand">AdNomos</a>
            <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                    class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item"><a class="nav-link" href="#services">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">Novidades</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contatos</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="{{ route('login') }}" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">Entrar</a> <a
                        href="{{ route('stepOne.get') }}" class="btn btn-info my-2 my-sm-0 text-uppercase">Cadastre-se
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- apresentação começa aqui-->
    <div class="container-fluid gtco-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Prometemos trazer
                        o melhor <span>AdNomos</span> Para seu negocio
                        seu negócio </h1>
                    <p> Prático, inteligente e funcional.
                        Tenha mais tranquilidade na advocacia
                        com o software jurídico <span> Adnomos</span> </p>
                        <p>Buscamos todos seus processos vinculados a sua OAB</p>

                    <a href="#">Começe Grátis <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-61">
                    <div class="card"><img class="card-img-top img-fluid" src="{{asset('views/images/banner-img.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <!-- apresentação termina  aqui-->



    <div class="container-fluid gtco-feature" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="cover">
                        <div class="card">
                            <svg class="back-bg" width="100%" viewBox="0 0 900 700"
                                style="position:absolute; z-index: -1">
                                <defs>
                                    <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                        <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                                        <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />
                                    </linearGradient>
                                </defs>
                                <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                    d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z" />
                            </svg>
                            <!-- *************-->

                            <svg width="100%" viewBox="0 0 700 500">
                                <clipPath id="clip-path">
                                    <path
                                        d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z">
                                    </path>
                                </clipPath>
                                <!-- xlink:href for modern browsers, src for IE8- -->
                                <image clip-path="url(#clip-path)" xlink:href="{{asset('views/images/learn-img.jpg')}}" width="100%"
                                    height="465" class="svg__image"></image>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- informações de serviços começa aqui aqui-->
                <div class="col-md-5">
                    <h2> Somos a solução para o seu acompanhamento de processos jurídicos!
                    </h2>
                    <p> Introduzimos a Adnomos, a plataforma mais completa e inovadora para acompanhar seus processos
                        jurídicos de forma fácil e segura.

                    </p>
                    <p>
                        <small>Acompanhe seus processos em tempo real
                            Tenha acesso a todos os documentos e informações
                            Receba notificações e alertas personalizados
                            Otimize seu tempo e aumente sua produtividade
                            Cadastre-se Grátis
                        </small>
                    </p>
                    <!-- informações de serviços acaba aqui-->



                    <!-- FALTA DESENVOLVER-->
                    <a href="#">Planos <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>


            </div>
        </div>
    </div>
    <div class="container-fluid gtco-features" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2> Explore os serviços<br />
                        que oferecemos para você </h2>
                    <p>Nossa plataforma oferece uma solução completa para o acompanhamento de processos jurídicos. Com nossa ferramenta, 
                        você pode acompanhar seus processos em tempo real, tendo acesso às atualizações mais recentes.
                        Além disso, você pode gerenciar todos os documentos relacionados ao seu processo, armazenando-os de 
                        forma segura e organizada. Nossa plataforma também oferece notificações e alertas personalizados, garantindo que você nunca perca um prazo importante.

                        </p>
                    <a href="#contact">Saiba Mais <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
                <div class="col-lg-8">
                    <svg id="bg-services" width="100%" viewBox="0 0 1000 800">
                        <defs>
                            <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                                <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />
                            </linearGradient>
                        </defs>
                        <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)"
                            d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z" />
                    </svg>
                    <div class="row">
                        <div class="col">
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="{{asset('views/images/web-design.png')}}" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Design moderno</h3>
                                    <p class="card-text">Simples, intuitivo e atraente,Nossa equipe cria soluções de design que são funcionais, 
                                        eficazes e incrivelmente bonitas.</p>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="{{asset('views/images/marketing.png')}}" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Marketing</h3>
                                    <p class="card-text">Utilize nossa ferramenta como gancho 
                                        para alavancar  Marketing do seu escritório.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="{{asset('views/images/seo.png')}}" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Sistema Inteligente</h3>
                                    <p class="card-text">Vincule sua OAB e acesse um mecanismo de busca avançado que reúne todos os prazos e processos em um só lugar, 
                                        simplificando sua gestão e aumentando sua produtividade..</p>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="{{asset('views/images/graphics-design.png')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"> Design Gráficos</h3>
                                    <p class="card-text">Desing Gráficos modernos e intuitivo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>c
            </div>
        </div>
    </div>
    <div class="container-fluid gtco-numbers-block">
        <div class="container">
            <svg width="100%" viewBox="0 0 1600 400">
                <defs>
                    <linearGradient id="PSgrad_03" x1="80.279%" x2="0%" y2="0%">
                        <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                        <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />

                    </linearGradient>

                </defs>
                <!-- <clipPath id="clip-path3">

                                      </clipPath> -->

                <path fill-rule="evenodd" fill="url(#PSgrad_03)"
                    d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z">
                </path>

                <clipPath id="ctm" fill="none">
                    <path
                        d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z">
                    </path>
                </clipPath>

                <!-- xlink:href for modern browsers, src for IE8- -->
                <image clip-path="url(#ctm)" xlink:href="{{asset('views/images/word-map.png')}}" height="800px" width="100%"
                    class="svg__image">

                </image>

            </svg>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">1.819</h5>
                            <p class="card-text">Escritório espalhos pelo Brasil</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">380 mil</h5>
                            <p class="card-text">Advogados cadastrado na OAB </p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Projeto </h5>
                            <p class="card-text">60% Concluído</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">10</h5>
                            <p class="card-text">professores felizes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid gtco-testimonials">
        <div class="container">
            <h2>Developers AdNomos: </h2>
            <div class="owl-carousel owl-carousel1 owl-theme">
                <div>
                    <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/LuanH.jpg')}}" alt="">
                        <div class="card-body">
                            <h5>Luan Henrique <br />
                                <span> Project Manager / Front-End</span>
                            </h5>
                            <p class="card-text">30 anos, Frond-End, team lead no projeto do AdNomos, em transição de carreira.
                                 </p>
                        </div>
                    </div>
                </div>
                <!-- Parei aqui-->
                <div>
                    <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/RaphaS.jpg')}}" alt="">
                        <div class="card-body">
                            <h5>Raphael Alves<br />
                                <span> Project Manager / Front-End  </span>
                            </h5>
                            <p class="card-text"> 17 anos, Front-End,  colaborador na criação da identidade visual do AdNomos, 
                                suporte criativo. </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/ivilaB.jpg')}}" alt="">
                        <div class="card-body">
                            <h5>Ivila Barbosa<br />
                                <span> Project Manager / Integrated Management </span>
                            </h5>
                            <p class="card-text">21 anos, developer na área de gestão integrada no projeto AdNomos, visando unir as áreas, 
                                processos e projetos. </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/Jhonatan.jpg')}}" alt="">
                        <div class="card-body">
                            <h5>Jhonathan Silva<br />
                                <span> Project Manager / Back-end </span>
                            </h5>
                            <p class="card-text">17 anos, developer em estruturação e modelagem do banco de dados no projeto AdNomos </p>
                       </div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/pabloC.jpg')}}" alt="">
                        <div class="card-body">
                            <h5>Pablo Contreras<br />
                                <span> Project Manager / Integrated Management </span>
                            </h5>
                            <p class="card-text">21 anos, developer na área de gestão integrada no projeto AdNomos, visando unir as áreas, 
                                processos e projetos. </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/DanielL.jpg')}}" alt="">
                        <div class="card-body">
                            <h5>Daniel Leão<br />
                                <span> Project Manager / Integrated Management </span>
                            </h5>
                            <p class="card-text">Dannyel, 18 Anos
                                Iniciativa,negociação, Empatia, motivação, pontualidade, colaboração, resolução de problemas, Escuta ativa, Comunicação verbal.
                                Trabalhando na API do Adnomos </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid gtco-features-list">
        <div class="container">
            <div class="row">
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="{{asset('views/images/quality-results.png')}}" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Qualidade Nos resultados</h5>
                        Com AdNomos, você pode aumentar a eficiência e a precisão dos seus 
                        processos, garantir a segurança e a satisfação dos clientes e acessar informações 
                        atualizadas e confiáveis. Além disso, 
                        nossa plataforma é projetada para ser fácil de usar e intuitiva, 
                        permitindo que você se concentre em suas atividades principais.

                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="{{asset('views/images/analytics.png')}}" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Sistema Analitico</h5>
                        plataforma projetada para coletar, processar e interpretar dados. Ele ajuda a transformar grandes volumes de informações em insights 
                        úteis para a tomada de decisões.
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="{{asset('views/images/affordable-pricing.png')}}" alt="">
                    </div>
                    <div class="media-body">
                        <h5 class="mb-0">Preços Acessíveis</h5>
                        Experimente gratuitamente por 10 dias. Cancele a qualquer momento,
                        Planos a partir de R$329/mês
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="{{asset('views/images/easy-to-use.png')}}" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Fácil de Usar</h5>
                        Com AdNomos, sua rotina fica mais facil com nosso sistema intuitivo
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="{{asset('views/images/free-support.png')}}" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Suporte Gratuito</h5>
                        Tenha Suporte técnico, tire suas duvidas de forma gratuita. 
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="{{asset('views/images/effectively-increase.png')}}" alt="">
                    </div>
                    <div class="media-body">
                        <h5 class="mb-0">Aumentar de Forma Eficaz</h5>
                        Aumente a produtividade do seu escritório, o direiro com AdNomos fica mais Eficaz.
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid gtco-news" id="news">
            <div class="container">


                <h2>Links úteis </h2>
                <div class="owl-carousel owl-carousel2 owl-theme">
                    <div>
                        <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/stj.jpeg')}}" alt="">
                            <div class="card-body text-left pr-0 pl-0">
                                <h5>Superior Tribunal de Justiça STJ</h5>
                                    
                                     
                                
                                
                                <p class="card-text"> </p>
                                <a href="https://www.stj.jus.br/sites/portalp/Inicio">Acesse <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/stf2.png')}}" alt="">
                            <div class="card-body text-left pr-0 pl-0">
                                <h5> Superior Tribunal Federal (STF). </h5>
                               
                                

                                <p class="card-text">
                                     </p>
                                <a href="https://portal.stf.jus.br/">Acesse<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/jusbrasil.jpeg')}}" alt="">
                            <div class="card-body text-left pr-0 pl-0">
                                <h5>JusBrasil </h5>
                                <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a
                                    feugiat augue,
                                    et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare
                                    purus risus
                                    . . . </p>
                                <a href="https://www.jusbrasil.com.br/">Acesse <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/tjsp.jpeg')}}" alt="">
                            <div class="card-body text-left pr-0 pl-0">
                                <h5>TJSP </h5>
                                <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a
                                    feugiat augue,
                                    et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare
                                    purus risus
                                    . . . </p>
                                <a href="#">Acesse <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/STE.jpeg')}}" alt="">
                            <div class="card-body text-left pr-0 pl-0">
                                <h5> Superior Tribunal Eleitoral </h5>
                                <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a
                                    feugiat augue,
                                    et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare
                                    purus risus
                                    . . . </p>
                                <a href="#">Acesse <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card text-center"><img class="card-img-top" src="{{asset('views/images/TRT.jpeg')}}" alt="">
                            <div class="card-body text-left pr-0 pl-0">
                                <h5>Tribubal Superior Trabalista </h5>
                                <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a
                                    feugiat augue,
                                    et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare
                                    purus risus
                                    . . . </p>
                                <a href="#">Acesse <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid" id="gtco-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" id="contact">
                        <h4> Contato </h4>
                        <input type="text" class="form-control" placeholder="Nome Ccompleto">
                        <input type="email" class="form-control" placeholder="Endereço de E-mail">
                        <textarea class="form-control" placeholder="Mensagem"></textarea>
                        <a href="#" class="submit-button">Enviar <i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>Company</h4>
                                <ul class="nav flex-column company-nav">
                                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">Serviços</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#news">Novidades</a></li>
                                    <li class="nav-item"><a class="nav-link" href="##about">FAQ's</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contac">Contate-nos</a></li>
                                </ul>
                                <h4 class="mt-5">Siga em nossas redes sociais</h4>
                                <ul class="nav follow-us-nav">
                                    <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google"
                                                aria-hidden="true"></i></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <h4>Serviços</h4>
                                <ul class="nav flex-column services-nav">
                                    <li class="nav-item"><a class="nav-link" href="#">Qualidade Nos resultados</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Sistema Analitico</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Preços Acessíveis</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Fácil de Usar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Suporte Gratuito</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Aumentar de Forma Eficaz</a></li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <p>&copy; 2025. AdNomos todos os direitos reservados <a href="https://gettemplates.co"
                                        target="_blank">AdNomos</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('views/js/jquery-3.3.1.slim.min.js')}}"></script>
        <script src="{{asset('views/js/popper.min.js')}}"></script>
        <script src="{{asset('views/js/bootstrap.min.js')}}"></script>
        <!-- owl carousel js-->
        <script src="{{asset('views/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('views/js/main.js')}}"></script>
</body>

</html>