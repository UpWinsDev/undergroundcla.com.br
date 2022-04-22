@extends('layouts.adm')

@section('content')

<div class="row justify-content-center mb-5">


    <div class="col-md-6">

      

    <div class="w-100 text-center my-5">
        <h3 class="text-white"><b>EDITAR GAMES</b></h3>
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
          <form action="{{  route('games.edit.do' , ['id'=> $game->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $game->nome }}" required>
              </div>
              <div class="form-group col-md-12">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" d="descricao" name="descricao" rows="3">{{ $game->descricao }}</textarea>
              </div>
              <div class="form-group col-md-12 my-4 form-check form-check-inline">

                <input class="form-check-input" type="checkbox" id="game_principal" name="game_principal" 
          
                @php
                if($game->ativo == 1){
                  echo 'checked';
                }
                @endphp>
                <label class="form-check-label" for="game_principal">Definir como Jogo Principal</label>
  
              </div>

              <div class="form-group col-md-4 text-center">
                <div  style="border-radius: 10px 10px 0px 0px;width: 100%;height:160px;">
                  <img src="{{ env('APP_URL') }}/storage/img/games/{{ $game->imagem }}" class="mt-2" style="width:140px;height:140px;object-fit: cover;">
                </div>
              </div>

              <div class="form-group col-md-7">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="arquivo">
                      <label class="custom-file-label" for="customFile">Alterar imagem</label>
                  </div>
              </div>
            </div>
            <a class="btn btn-primary" role="button" href="{{ route('games.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
          </form>
        </div>

    </div>

</div>



@endsection