@extends('layouts.app')

@section('mytitle', 'Home')

@section('content')



<div class="w-100 img-fundo-1" id="inicio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 10%;height:650px;">

                <h1 class="text-white" style="font-size:60px;font-weight:800;"><b>FAÇA <br> PARTE <br> DO <span style="color:#FF8F1C;font-size:70px;">ST</span> </b></h1>
                <p class="text-white py-3" style="width: 330px">Organização fundada em 2019, com uma ideia de juntar amigos, conseguimos mais do que isso e hoje, <b>somos um time E-sports.</b>
                </p>


                <a class="btn px-4 mb-2 btn-principal text-dark font-weight-bold" href="{{ route('home.recrutamento') }}" style="border-radius:10px;">FAÇA PARTE DO TIME</a>
                <a class="btn px-5 mb-2 font-weight-bold" href="{{ route('home.torneios') }}" style="color:#fff;border-radius:10px;border:1 solid #fff;border-color:#fff;">TORNEIOS</a>

            </div>
        </div>

    </div>
</div>

<div class="w-100" style="background: #FF8F1C;">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-2">
                <h2 class="font-weight-bold">SOBRE <br> A <span class="text-white">ST</span></h2>
            </div>
            <div class="col-12 col-md-2 pt-4">
                <div class="border border-dark w-100 my-3"></div>
            </div>
            <div class="col-12 col-md-6 pb-4">
                <h4 class="">Organização fundada em 2019, com uma ideia de juntar amigos, conseguimos ser mais do que isso e hoje, somos um time de E-sports...  <a href="{{ route('home.sobre') }}" class="text-white">Ver mais</a> </h4>
            </div>
        </div>
    </div>
</div>

<div class="w-100">
    <div class="container">

        <div class="w-100 mx-auto text-center py-5">
            <img src="{{ env('APP_URL') }}/assets/img/banners/bannerpix.png" alt="" class="bannerpix" alt="banner do pix" loading="lazy" style="margin-bottom: 10%;">
        </div>



       <div class="row justify-content-center">
           <div class="col-3">
                <div class="border w-100 my-3"></div>
           </div>
           <div class="col-12 col-md-2 text-center">
            <h3><b>TORNEIOS</b></h3>
           </div>
           <div class="col-3">
                <div class="border w-100 my-3"></div>
           </div>
       </div>

        <div class="row justify-content-center pt-5">

            @foreach ($torneios as $torneio )
                <div class="col-12 col-md-3 my-2">
                    <div class="card text-white" style="border-radius: 10px 10px;background-color:#16253A;">
                        <div style="border-radius: 10px 10px;width: 100%;height:160px; border:3px solid #FF8F1C;">
                            <img src="{{ env('APP_URL') }}/storage/img/torneios/{{ $torneio->imagem }}" style="width:100%;height:100%;object-fit: cover;border-radius: 7px 7px;" loading="lazy" alt="torneios de {{ $torneio->titulo }}">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{ $torneio->titulo }}</h5>
                        <div class="card-text small" style="height: 100px">
                            {!! $torneio->premicacao !!}
                            {{-- 1° Lugar: R$ 800 <br>
                            2° Lugar: R$ 800 <br>
                            3° Lugar: R$ 800 <br>
                            4° Lugar: R$ 800 <br>
                            5° Lugar: R$ 800 --}}
                        </div>
                        <p class="small pt-2">
                            <span class="px-2" style="border:1px solid #FF8F1C; border-radius:8px;">PLAYERS {{ $torneio->qtd_players }}</span>
                            <span class="px-2" style="border:1px solid #FF8F1C; border-radius:8px;">VALOR {{ number_format($torneio->valor_inscricao, 2, ',', '.') }}</span>
                        </p>

                        <p>{{ $torneio->data_evento }}, {{ $torneio->duracao_media }} - BR</p>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="w-100 text-center py-5">
            <a href="{{ route('home.torneios') }}" class="text-dark"><h4><b>VER TODOS OS TORNEIOS</b></h4></a>
        </div>
    </div>
</div>

<div class="w-100" style="background: #181818;">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-3">
                <div class="border w-100 my-3"></div>
            </div>
            <div class="col-12 col-md-3 text-center">
                <h4 class="text-white">ADMINISTRADORES</h4>
            </div>
            <div class="col-3 pb-4">
                <div class="border w-100 my-3"></div>
            </div>
        </div>

        <div class="row justify-content-center pb-5">

            @php
                $i = 1
            @endphp

            @foreach ($users as $user)


                @if (!empty($user->user_players[0]) && $user->user_players[0]->id_classe == 1)

                    <div class="col-12 col-md-3 my-3">
                        <div style="border-radius: 10px 10px;background-color:#fff;">
                            <div class="text-center" style="border-radius: 10px 10px;width: 100%;height:190px;">
                                <img src="{{ env('APP_URL') }}/assets/img/avatars/persona-{{$i}}.png" class="mt-0" style="width:60%;height:100%;object-fit: cover;" loading="lazy" alt="avatar {{ $user->user_players[0]->nome }}">
                            </div>
                            <div class="text-center text-white" style="border-radius: 10px 10px;width: 100%;height:110px; border:3px solid #444444; background-color:#444444;">
                                <h5 class="card-title mt-3">{{ $user->user_players[0]->nome }}</h5>
                                <span>{{ $user->user_players[0]->descricao }}</span>
                            </div>
                        </div>
                    </div>

                    @if ($i == 4)
                        {{ $i = 1 }}
                    @endif

                @endif



            @endforeach


        </div>
    </div>


    <div class="img-fundo-2 text-center" style="height:450px; border-radius:0px 0px 150px 150px;">

            <h1 class="text-white" style="padding-top:10%"><b>NÃO SOMOS SÓ UM TIME, SOMOS UMA FAMÍLIA</b></h1>
            <div class="w-25 mx-auto mt-5 border"></div>

    </div>

    <div class="container">
        <div class="row justify-content-center pt-3">

            <div class="col-4">
                {{-- <div class="border w-100 my-3"></div> --}}
            </div>
            <div class="col-12 col-md-4 text-center py-3">
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration:none">
                    <h4 class="text-principal"><b>JOGOS PRINCIPAIS</b> <img src="{{ env('APP_URL') }}/assets/img/icons/icon-arrow-down.png" alt="seta pra baixo" loading="lazy" class="ml-2 mb-2" style="width: 25px"></h4>
                </a>
            </div>
            <div class="col-4 pb-4">
                {{-- <div class="border w-100 my-3"></div> --}}
            </div>

        </div>

        <div class="collapse" id="collapseExample">

            <div class="row justify-content-center text-white">

                @foreach ($games as $game)

                @if ($game->ativo == 1)
                    <div class="col-md-3 text-center">
                        <div>
                            <p >
                                <div class="mx-auto" style="width: 50%;height:80px;">
                                    <img src="{{ env('APP_URL') }}/storage/img/games/{{ $game->imagem }}" style="width:70%;height:100%;object-fit: contain;border-radius: 30%;" alt="game {{ $game->nome }}" loading="lazy">
                                </div>
                            </p>
                            <h4>{{ $game->nome }}</h4>
                            <p>{{ $game->descricao }}</p>
                        </div>
                    </div>

                @endif


                @endforeach

                <div class="w-100 text-center my-4">
                    <a class="btn px-4 btn-principal text-dark font-weight-bold" href="{{ route('home.recrutamento') }}" style="border-radius:10px;">FAÇA PARTE DO TIME</a>
                {{-- <button class="btn px-4" type="button" style="color:#fff;border-radius:10px;border:1 solid #fff;border-color:#fff;">VER TODOS OS TIMES</button> --}}
                </div>

            </div>




        </div>

    </div>
</div>

<div class="w-100" style="background: #F1F1F1">
    <div class="container">

       <div class="row justify-content-center pt-5">
           <div class="col-4">
               <hr>
           </div>
           <div class="col-12 col-md-4 text-center">
            <h4><b>LÍDERES DE SQUAD</b></h4>
           </div>
           <div class="col-4">
               <hr>
           </div>
       </div>

            @foreach ($games as $game)

            {{-- VERIFICA SE O GAME POSSUI TIME --}}
            @if (count($game->games_time) > 0)
                <div class="row justify-content-center pt-5">
                    <div class="w-100">
                        <h4 class="text-center mb-4"><b>{{$game->nome}}</b></h4>
                    </div>
                    @foreach ($game->games_time as $time )

                    {{-- VERIFICA SE POSSUI PLAYERS NO TIME --}}
                        @if (count($time->time_playes) > 0)

                            @foreach ($time->time_playes as $player)

                                {{-- VERIFICA SE POSSUI PLAYERS LIDERES NO TIME --}}
                                @if ($player->status == 1)



                                    <div class="col-12 col-md-3 my-3">
                                        <div style="border-radius: 10px 10px;background-color:#fff;">
                                            <div class="text-center" style="border-radius: 10px 10px;width: 100%;height:150px;">
                                                <img src="{{ env('APP_URL') }}/assets/img/avatars/persona-<?php
                                                $min=1;
                                                $max=4;
                                                echo rand($min,$max);
                                            ?>.png" alt="avatar {{ $player->player_time->nome }}" loading="lazy" class="mt-0" style="width:55%;height:100%;object-fit: cover;">
                                            </div>
                                            <div class="text-center text-white" style="border-radius: 10px 10px;width: 100%;height:100px; border:3px solid #444444; background-color:#444444;">
                                                <h5 class="card-title mt-3">{{ $player->player_time->nome }}</h5>
                                                <p>{{$time->nome}}</p>

                                            </div>
                                        </div>
                                    </div>

                                @endif

                            @endforeach
                        @endif



                    @endforeach

                </div>
            @endif


            @endforeach

        <div class="w-100 text-center py-5">
            <a class="btn px-4 btn-principal text-white"  href="{{ route('home.recrutamento') }}" style="border-radius:10px;">FAÇA PARTE DO TIME</a>
        </div>
    </div>
</div>

@if (count($playersPatrocinados) != 0)

<div class="w-100 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                 <div class="border w-100 my-3"></div>
            </div>
            <div class="col-12 col-md-5 text-center">
             <h4><b>STREAMER PATROCINADO</b></h4>
            </div>
            <div class="col-3">
                 <div class="border w-100 my-3"></div>
            </div>
        </div>


            <div class="row justify-content-center">

                @foreach ($playersPatrocinados as $streamer)
                    <div class="col-7 col-md-2 my-3">
                        <div class="w-100 text-center">
                            <div class="mx-auto" style="border-radius: 30px 30px;width: 100px;height:100px;box-shadow: 3px 3px 0.3em #000;">
                                <img src="{{ $streamer->player_users->avatar }}" style="width:100%;height:100%;object-fit: contain;border-radius: 20px 20px;" alt="patrocinado {{ $streamer->nome }}" loading="lazy">
                            </div>
                            <p class="mt-3"><b>{{ $streamer->nome }}</b></p>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
</div>
@endif







@endsection