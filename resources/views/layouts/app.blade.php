<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>StSemTag | @yield('mytitle') </title>

    <meta name="description" content="Nossa missão é oferecer o melhor possível aos nossos jogadores enquanto trazemos alegria à nossa torcida. Ano após ano estamos evoluindo para sermos a maior família gamer do mundo!">
    <meta name="keywords" content="streamer, games, team, scum, torneio, rpg, recrutar" />
    <meta name="revised" content="15/04/2022" />
    <meta name="google-site-verification" content="ACphy9ljwZokf3teYxBC-A0FUhFoZh1z_LGH2SVNKIQ" />

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C32BJ91254"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-C32BJ91254');
    </script>

    <!-- Cookies -->
    <meta name="adopt-website-id" content="e1e42867-478e-4bf8-a145-a8f6af1a2f97" />
    <script src="//tag.goadopt.io/injector.js?website_code=e1e42867-478e-4bf8-a145-a8f6af1a2f97" class="adopt-injector"></script>

    <!-- Google Optimize -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-NRXJBVG"></script>


    <!-- Hotjar Tracking Code for https://stsemtag.com.br/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:3048710,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Styles -->
    <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"></noscript>
    <link href="{{ asset('assets/css/app.css') }}" async rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"></noscript>



</head>
<body>
    <div id="app">


          <header class="sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

                    <a class="navbar-brand d-block d-lg-none" href="#">
                        <img src="{{ asset('assets/img/logo-principal.png') }}" alt="logo principal" class="img-logo"  style="width: 50px; " loading="lazy">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mt-3 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home.index') }}">INÍCIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.sobre') }}">SOBRE</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.recrutamento') }}">RECRUTAMENTO</a>
                            </li>
                            <li class="nav-item d-none d-lg-block nav-img-logo" style="width: 140px; margin-top:-25px;">
                                <a class="navbar-brand btn-block" href="{{ route('home.index') }}" >
                                    <img src="{{ asset('assets/img/logo-principal.png') }}" alt="logo principal" class="img-logo"  style="width: 130px; border-radius:100%;position: absolute;" loading="lazy">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.torneios') }}">TORNEIOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contato">CONTATO</a>
                            </li>

                            <li class="nav-item dropdown d-flex">

                                @if(Auth::check() )

                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" role="button" data-toggle="dropdown" aria-expanded="false">

                                        <img src="{{ Auth::user()->avatar}}" alt="avatar {{ Auth::user()->username }}" style="width: 30px;border-radius:50px;" loading="lazy">

                                        Olá, {{ Auth::user()->username }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('home.contribuir') }}">Contribuir</a></li>
                                        @if (Auth::user()->nivel == 1)
                                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Area restrita</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>

                                    </ul>



                                @else
                                    <a href="{{ route('auth.steam') }}" class="nav-link"><img src="{{ asset('assets/img/login.png') }}" alt="fazer login" loading="lazy" class="pr-2" style="width: 25px"> Fazer login</a>
                                @endif
                            </li>
                        </ul>
                    </div>

            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="w-100 img-fundo-doacao">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="margin-top: 5%;height:400px;">

                            <div class="mx-auto" style="width: 300px">
                                <img src="{{ asset('assets/img/game-06.png') }}" alt="" loading="lazy" class="float-left" style="width: 70px">
                                <h4 class="text-white text-center font-weight-bold">FAÇA PARTE DA NOSSA DOAÇÃO:</h4>
                            </div>
                            <p class="text-white text-center mx-auto py-4" style="max-width: 500px">Conectamos gamers que tem equipamentos para doar, com outros gamers que necessitam de um equipamento. Colabore com o ST!
                            </p>

                            <div class="mx-auto text-center" style="width: 325px">
                                <h4 class="text-white">QUER COLABORAR E AJUDAR OUTROS GAMERS?</h4>
                                <a class="btn px-4 my-4 btn-principal text-dark font-weight-bold"  href="{{ route('home.contribuir') }}" style="border-radius:10px;">DOAR EQUIPAMENTO</a>
                            </div>

                            {{-- <div class="row justify-content-center">
                                <div class="col-4">
                                    <h3 class="text-white text-center py-3" style="width: 350px">QUER COLABORAR E AJUDAR OUTROS GAMERS?
                                    </h3>
                                    <button class="btn px-4 text-center btn-primeira text-white" type="button" style="border-radius:10px;">DOAR EQUIPAMENTO</button>
                                </div>
                                <div class="col-4">
                                    <h3 class="text-white text-center py-3" style="width: 350px">PRECISA DE EQUIPAMENTO PARA JOGAR?
                                    </h3>
                                    <button class="btn px-4 text-center" type="button" style="color:#fff;border-radius:10px;border:1 solid #fff;border-color:#fff;">SOLICITAR EQUIPAMENTO</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 img-fundo-youtube">
                        <div class="w-100 p-5">
                            <h3 class="font-weight-bold text-white mt-4">YOUTUBE</h3>
                            <p class="text-principal font-weight-bold">Canal</p>

                            <button class="btn px-4 my-3" type="button" style="color:#fff;border-radius:10px;border:1 solid #fff;border-color:#fff;">Ver mais</button>
                        </div>
                    </div>
                    <div class="col-md-4 img-fundo-twitch">
                        <div class="w-100 p-5">
                            <h3 class="font-weight-bold text-white mt-4">TWITCH</h3>
                            <p class="text-principal font-weight-bold">Stream</p>

                            <button class="btn px-4 my-3" type="button" style="color:#fff;border-radius:10px;border:1 solid #fff;border-color:#fff;">Ver mais</button>
                        </div>
                    </div>
                    <div class="col-md-4 img-fundo-instagram">
                        <div class="w-100 p-5">
                            <h3 class="font-weight-bold text-white mt-4">INSTAGRAM</h3>
                            <p class="text-principal font-weight-bold">Rede social</p>

                            <button class="btn px-4 my-3" type="button" style="color:#fff;border-radius:10px;border:1 solid #fff;border-color:#fff;">Ver mais</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container" id="contato">

                <h4 class="text-center py-5"><b>ENTRE EM CONTATO</b></h4>

                <div class="row justify-content-center pb-5">
                    <div class="col-10 col-md-5 img-fundo-contato" style="border-radius:5px;">
                        <h5 class="text-white text-center w-75 mx-auto" style="margin-top:40%;margin-bottom:20%;"><b>Deixe sua mensagem que em breve nossa equipe retornará!</b></h5>
                    </div>
                    <div class="col-10 col-md-5" style="background-color:#1F0037; border-radius:5px; box-shadow: 5px 5px 2em black;">

                        <p class="text-white text-center w-75 mx-auto my-3" ><b>Preencha o formulário</b></p>

                        <form class="text-center p-3" method="POST" action="{{ route('email.contato') }}">
                            @csrf
                            <div class="form-group">

                              <input type="text" class="icon-avatar form-person bg-segundaria" id="nomeContato" name="nomeContato" placeholder="Seu nome" required>

                            </div>
                            <div class="form-group">

                                <input type="text" class="icon-send form-person bg-segundaria" id="emailContato" name="emailContato" placeholder="Email" required>

                            </div>
                            <div class="form-group">

                                <input type="text" class="icon-send form-person bg-segundaria" id="assuntoContato" name="assuntoContato" placeholder="Assunto">

                            </div>
                            <div class="form-group">

                                <textarea class="form-person bg-segundaria" id="mensagemContato" name="mensagemContato" rows="3" placeholder="Escreva sua mensagem"></textarea>

                            </div>

                            <button type="submit" class="btn btn-principal px-4 text-dark font-weight-bold">Enviar</button>
                        </form>






                    </div>
                </div>


            </div>

            @if (count($patrocinadores) != 0)
            <div class="container">
                <div class="w-100 mt-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                 <div class="border w-100 my-3"></div>
                            </div>
                            <div class="col-12 col-md-5 text-center">
                             <h4><b>PARCEIROS</b></h4>
                            </div>
                            <div class="col-3">
                                 <div class="border w-100 my-3"></div>
                            </div>
                        </div>

                        <div class="row justify-content-center pb-4">
                            @foreach ($patrocinadores as $patrocinio)
                                <div class="col-7 col-md-3 my-3">
                                    <div class="w-100 text-center">
                                        <div style="width: 100%;height:80px;">
                                            <img src="{{ env('APP_URL') }}/storage/img/patrocinadores/{{ $patrocinio->imagem }}" alt="patrocinadores" style="width:100%;height:100%;object-fit: contain;" loading="lazy">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            @endif
            <div class="container-fluid img-fundo-rodape">
                <div class="container">
                    <div class="row justify-content-center pt-5">
                        <div class="col-md-4 col-lg-3 mb-2">
                            <div class="w-100">
                                <p class="text-white font-weight-bold my-3">REDE SOCIAL</p>

                                <div class="w-100 pt-3">
                                    <a href="#"><img src="{{ asset('assets/img/redes-sociais/icon-instagram.png') }}" alt="instagram" class="mx-1" style="width: 30px" loading="lazy"></a>
                                    <a href="#"><img src="{{ asset('assets/img/redes-sociais/icon-twitch.png') }}" alt="twitch" class="mx-1" style="width: 30px" loading="lazy"></a>
                                    <a href="#"><img src="{{ asset('assets/img/redes-sociais/icon-youtube.png') }}" alt="youtube" class="mx-1" style="width: 38px" loading="lazy"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 mb-2">
                            <div class="w-100 text-center">

                                <p class="text-white font-weight-bold my-3">MENU DO SITE</p>
                                <div class="row pt-3">
                                    <div class="col-6">
                                        <p><a href="{{ route('home.index') }}" class="text-white" style="text-decoration:none">INICIO</a></p>
                                        <div class="border mx-auto w-75 my-3"></div>

                                        <p><a href="{{ route('home.sobre') }}" class="text-white" style="text-decoration:none">SOBRE</a></p>
                                        <div class="border mx-auto w-75 my-3"></div>

                                        <p><a href="{{ route('home.recrutamento') }}" class="text-white" style="text-decoration:none">RECRUTAMENTO</a></p>

                                        <p><a href="{{ route('home.torneios') }}" class="text-white" style="text-decoration:none">TORNEIO</a></p>
                                        <div class="border mx-auto w-75 my-3"></div>

                                    </div>
                                    <div class="col-6">


                                        <p><a href="#contato" class="text-white" style="text-decoration:none">CONTATO</a></p>
                                        <div class="border mx-auto w-75 my-3"></div>

                                        <p><a href="{{ route('home.contribuir') }}" class="text-white" style="text-decoration:none">CONTRIBUA</a></p>

                                        <p><a href="#contato" class="text-white" style="text-decoration:none">TERMOS DE USO</a></p>
                                        <div class="border mx-auto w-75 my-3"></div>

                                        <p><a href="{{ route('home.contribuir') }}" class="text-white" style="text-decoration:none">POLÍTICA DE PRIVACIDADE</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-3 mb-2">
                            <div class="w-100">
                                <p class="text-white font-weight-bold my-3">CONTATO</p>

                                <div class="w-100 pt-3">
                                    <p>
                                        <a href="mailto:contato@stsemtag.com.br" class="text-white">
                                            <img src="{{ asset('assets/img/redes-sociais/icon-email.png') }}" alt="email" class="mx-1" style="width: 20px" loading="lazy">
                                            contato@stsemtag.com.br
                                        </a>
                                    </p>
                                    {{-- <p>
                                        <a href="#" class="text-white">
                                            <img src="{{ asset('assets/img/redes-sociais/icon-whatsapp.png') }}" alt="" class="mx-1" style="width: 20px">
                                            48 9 1234 - 5678
                                        </a>
                                    </p>
                                    <p>
                                        <a href="#" class="text-white">
                                            <img src="{{ asset('assets/img/redes-sociais/icon-fone.png') }}" alt="" class="mx-1" style="width: 20px">
                                            48 3445 - 4564
                                        </a>
                                    </p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="w-100 text-center">
                                <img src="{{ asset('assets/img/logo-principal.png') }}" alt="logo principal" class="mx-1" style="width: 80px" loading="lazy">
                                <p class="text-secondary small"><b>NÃO SOMOS SÓ UM TIME SOMOS UMA FAMÍLIA</b></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/libs/jquery.js') }}" defer></script>
    <script src="{{ asset('assets/js/libs/bootstrap.js') }}" defer></script>
    <script src="{{ asset('assets/js/navbar.js') }}" defer></script>
    <script src="{{ asset('assets/js/inputFile.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" defer> </script>
    <script src="{{ asset ('assets/js/mask.js')}}" defer></script>

    {{-- <link rel="stylesheet" async type="text/css"
    href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <script async src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function () {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#1E0037",
                        "width": "100%",
                        "text": '#fff',
                        "link": '#E89A22'
                    },
                    "button": {
                        "background": "#FF8F1C",
                        "text": '#000'                }
                },


                "content": {
                    header: 'Cookies used on the website!',
                    message: 'Este site usa cookies para melhorar sua experiência.',
                    dismiss: 'ACEITAR!',
                    allow: 'Allow cookies',
                    deny: 'Decline',
                    link: 'Política de Cookies',
                    href: 'https://soul.med.br/politicas-de-privacidade-soulmed',
                    close: '&#x274c;',
                    policy: 'Cookie Policy',
                    target: '_blank',
                }
            })
        });
    </script> --}}

</body>
</html>
