@extends('layouts.adm')

@section('content')

<div class="row justify-content-center mb-5">


    <div class="col-md-8">

      

    <div class="w-100 text-center my-5">
        <h3 class="text-white"><b>CADASTRAR TORNEIO</b></h3>
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
          <form action="{{ route('torneios.create.do') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
              </div>
              <div class="form-group col-md-3">
                <label for="qtd_players">Qntd de playes</label>
                <input type="text" class="form-control" id="qtd_players" name="qtd_players" required>
              </div>
              <div class="form-group col-md-3">
                <label for="id_game">Game</label>
                <select class="form-control" id="id_game" name="id_game">
                    <option>Selecione game</option>
                    @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->nome }}</option>
                    
                    
                    @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="duracao_media">Duração média</label>
                <input type="text" class="form-control" id="duracao_media" name="duracao_media" placeholder="Ex: 2 horas" required>
              </div>
              <div class="form-group col-md-3">
                <label for="valor_inscricao">Valor inscrição</label>
                <input type="text" class="form-control mask-money-value" id="valor_inscricao" name="valor_inscricao" placeholder="Ex: 30.50" required>
              </div>
              <div class="form-group col-md-3">
                <label for="data_evento">Data Evento</label>
                <input type="text" class="form-control mask-data" id="data_evento" name="data_evento" placeholder="Ex: 06/07/2022" required>
              </div>

              <div class="form-group col-md-6">
                <label for="premiacao">Qntd premiações</label>
                <textarea class="form-control edit-textarea" d="descricao" id="premiacao" name="premiacao" rows="3"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="descricao">Regras e descrição</label>
                <textarea class="form-control edit-textarea" d="descricao" name="descricao" rows="3"></textarea>
              </div>
              
              <div class="form-group col-md-12">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="arquivo">
                      <label class="custom-file-label" for="customFile">Anexar imagem</label>
                  </div>
              </div>
            </div>
            <a class="btn btn-primary" role="button" href="{{ route('adm.torneios.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
          </form>
        </div>

    </div>

</div>



@endsection