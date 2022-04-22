@extends('layouts.adm')

@section('content')

<div class="row justify-content-center mb-5">


    <div class="col-md-6">

      

    <div class="w-100 text-center my-5">
        <h3 class="text-white"><b>CADASTRAR TIMES SQUAD</b></h3>
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
          <form action="{{ route('times.create.do') }}" method="POST" >
            @csrf
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
              </div>
              <div class="form-group col-md-12">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" d="descricao" name="descricao" rows="3"></textarea>
              </div>
              <div class="form-group col-md-12">
                <label for="id_game">Game</label>
                <select class="form-control" id="id_game" name="id_game">
                    <option>Selecione game</option>
                    @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->nome }}</option>
                    
                    
                    @endforeach
                </select>
              </div>
  
            </div>
            <a class="btn btn-primary" role="button" href="{{ route('times.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
          </form>
        </div>

    </div>

</div>



@endsection