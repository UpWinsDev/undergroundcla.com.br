@extends('layouts.app')

@section('mytitle', 'Torneios')

@section('content')
<div class="w-100 img-fundo-torneios">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 10%;height:480px;">
                <img src="./img/icones/not1.png" alt="" style="width: 70%;margin-bottom: 15%;">
                <h1 class="text-white" style="font-size:60px;"><b>TORNEIOS </b></h1>
                

                <a class="btn px-4 btn-principal text-white mt-4" href="{{ route('home.recrutamento') }}" style="border-radius:10px;">FAÇA PARTE DO TIME</a>
                
            </div>
        </div>

    </div>
</div>

<div class="w-100">
    <div class="container">

       <div class="row justify-content-center mt-5">
           <div class="col-6">
            <h4><b>TODOS OS CAMPEONATOS</b></h4>
           </div>
           <div class="col-6">
                
           </div>
       </div>

        <div class="row justify-content-center pt-5">

            @foreach ($torneios as $torneio )
                <div class="col-12 col-md-3 my-2">
                    <div class="card text-white" style="border-radius: 10px 10px;background-color:#16253A;">
                        <div style="border-radius: 10px 10px;width: 100%;height:160px; border:3px solid #FF8F1C;">
                            <img src="{{ env('APP_URL') }}/storage/img/torneios/{{ $torneio->imagem }}" alt="torneio {{ $torneio->titulo }}" style="width:100%;height:100%;object-fit: cover;border-radius: 7px 7px;">
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
                        <p class="small">
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
            <a href="#" class="text-dark"><h4><b>VER TODOS OS TORNEIOS</b></h4></a>
        </div>
    </div>
</div>



@endsection
