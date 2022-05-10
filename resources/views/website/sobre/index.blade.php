@extends('layouts.app')

@section('mytitle', 'Sobre')

@section('content')

<div class="w-100 img-fundo-sobre">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 10%;height:650px;">
                <h1 class="text-white" style="font-size:60px;"><b>NOSSA <br><span style="color:#FF8F1C;">HISTÓRIA</span> </b></h1>
                <p class="text-white py-3" style="width: 330px">A ST foi fundada em 2018 por <b>ROGER ANDERSON DE SOUZA</b> conhecido como <b>RAS</b>, na franquia SCUM. Inicialmente era apenas um hobby, ele tinha 13 anos e naquela época o esporte digital no Brasil nem existia.
                </p>

                <a class="btn px-4 btn-principal text-dark font-weight-bold" href="{{ route('home.recrutamento') }}" style="border-radius:10px;">FAÇA PARTE DO TIME</a>
            </div>
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

                    <div class="col-8 col-md-3 my-3">
                        <div style="border-radius: 10px 10px;background-color:#fff;">
                            <div class="text-center" style="border-radius: 10px 10px;width: 100%;height:190px;">
                                <img src="{{ env('APP_URL') }}/assets/img/avatars/persona-{{$i}}.png" class="mt-1" style="width:60%;height:100%;object-fit: cover;" alt="avatar {{ $user->user_players[0]->nome }}" loading="lazy">
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
            

            <div class="col-md-12">
                <p class="text-white text-center w-75 mx-auto">
                    Nossa missão é oferecer o melhor possível aos nossos jogadores enquanto trazemos alegria à nossa torcida. Ano após ano estamos evoluindo para sermos a maior família gamer do mundo
                </p>
            </div>
        
        </div>

        
    </div>



    
   
</div>


@endsection