@extends('layouts.adm')

@section('content')

<div class="row justify-content-center mb-5">


    <div class="col-md-6">

      

    <div class="w-100 text-center my-5">
        <h3 class="text-white"><b>ADICIONAR PLAYER</b></h3>
    </div>

    <div class="col-md-12">
        @if (Session::has('mensagem-falha'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ops!</strong> {{ Session::get('mensagem-falha') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
        @endif
        @if (Session::has('mensagem-sucesso'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Show!</strong> {{ Session::get('mensagem-sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
        @endif
    </div>

        <div class="w-100 bg-white p-3 mb-5" style="border-radius:10px;">
          <form action="{{ route('playerTimes.create.do', ['id'=> $player->id]) }}" method="GET" >
            @csrf
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="titulo">Nome</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $player->nome }}" disabled>
              </div>
              <div class="form-group col-md-12">
                <label for="time">Time</label>
                <select class="form-control" id="time" name="time">
                    <option>Selecione game</option>
                    @foreach ($times as $times)
                    <option value="{{ $times->id }}">{{ $times->nome }}</option>
                    
                    
                    @endforeach
                </select>
              </div>
              {{-- <div class="form-group col-md-12">
                <label for="funcao">Função</label>
                <textarea class="form-control" d="funcao" name="funcao" rows="3"></textarea>
              </div>
              <div class="form-group col-md-12 form-check form-check-inline">

                <input class="form-check-input" type="checkbox" id="lider_squad" name="lider_squad">
                <label class="form-check-label" for="lider_squad">Lider Squad</label>
                
  
              </div> --}}
            </div>
            <a class="btn btn-primary" role="button" href="{{ route('players.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
          </form>
        </div>

    </div>

</div>



@endsection