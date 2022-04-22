<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>StSemTag | Área Administrativa @yield('mytitle') </title>

    <meta name="description" content="Nossa missão é oferecer o melhor possível aos nossos jogadores enquanto trazemos alegria à nossa torcida. Ano após ano estamos evoluindo para sermos a maior família gamer do mundo!">
    <meta name="keywords" content="streamer, games, team, scum, torneio, rpg, recrutar" />
    <meta name="revised" content="15/04/2022" />

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <!-- Editor de textarea -->
    <script src="https://cdn.tiny.cloud/1/d40wa0x9ijj10jlpcbu10qtpb9qa8k52vw2ldgn22fq3z1a6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '.edit-textarea'
      });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    
</head>
<body style="background-color:#132941 ">
    <div id="adm">

        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        
                    <a class="navbar-brand d-block d-lg-none" href="#">
                        <img src="{{ asset('assets/img/logo-principal.png') }}" alt="" class="img-logo"  style="width: 70px; ">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mt-3 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('players.index') }}">PLAYERS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('games.index') }}">GAMES</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('patrocinadores.index') }}">PATROCINADORES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('times.index') }}">TIMES</a>
                            </li>
                            <li class="nav-item d-none d-lg-block nav-img-logo" style="width: 160px; margin-top:-25px;">
                                <a class="navbar-brand btn-block" href="#" >
                                    <img src="{{ asset('assets/img/logo-principal.png') }}" alt="" class="img-logo"  style="width: 130px; border-radius:100%;position: absolute;">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('adm.torneios.index') }}">TORNEIOS</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contribuicao.index') }}">CONTRIBUIÇÕES</a>
                            </li>
                            
                            <li class="nav-item dropdown d-flex">
    
                                @if(Auth::check() )
                                
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">

                                        <img src="{{ Auth::user()->avatar}}" alt="" style="width: 30px;border-radius:50px;">
                                        
                                        Olá, {{ Auth::user()->username }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('home.index') }}">Ir para Site</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                                        
                                    </ul>
    
                                    
            
                                @else
                                    <a href="{{ route('auth.steam') }}" class="nav-link">FAZER LOGIN</a>
                                @endif
                            </li>
                        </ul>
                    </div>
            </nav>
        </header>

        <main class="py-4">
            <div class="container" style="margin-top: 100px">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/libs/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/libs/bootstrap.js') }}" defer></script>
    <script src="{{ asset('assets/js/navbar.js') }}" defer></script>
    <script src="{{ asset ('assets/js/inputFile.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" defer> </script>
    <script src="{{ asset ('assets/js/mask.js')}}" defer></script>
    

    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        
          <script>
          $(document).ready(function(){
              $('.data-table-style').DataTable({
                    "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nada encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)"
                    }
                });
          });


          </script>

    <script>

    $(document).ready(function() {

        // desabilita botão ao enviar requisição
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
            $('#load-modal').modal('show');
        });


});
</script>

</body>
</html>
