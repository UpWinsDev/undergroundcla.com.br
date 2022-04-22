@extends('layouts.adm')

@section('content')

<div class="row justify-content-center mb-5">


    <div class="col-md-8">

      

    <div class="w-100 text-center my-5">
        <h3 class="text-white"><b>EDITAR TORNEIO</b></h3>
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
          <form action="{{ route('torneios.edit.do', ['id'=> $torneio->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $torneio->titulo }}" value="{{ $torneio->titulo }}" required>
              </div>
              <div class="form-group col-md-3">
                <label for="qtd_players">Qntd de playes</label>
                <input type="text" class="form-control" id="qtd_players" name="qtd_players" value="{{ $torneio->qtd_players }}" required>
              </div>
            
              <div class="form-group col-md-3">
                <label for="id_game">Game</label>
                <select class="form-control" id="id_game" name="id_game">
                    <option value="{{ $torneio->torneio_game->id }}">{{ $torneio->torneio_game->nome }}</option>

                    @foreach ($games as $game)

                        @if ($game->id != $torneio->id_game)
                            <option value="{{ $game->id }}">{{ $game->nome }}</option>
                        @endif

                    @endforeach

                    <option value="">Selecione categoria</option>

                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="duracao_media">Duração média</label>
                <input type="text" class="form-control" id="duracao_media" name="duracao_media" value="{{ $torneio->duracao_media }}" required>
              </div>
              <div class="form-group col-md-3">
                <label for="valor_inscricao">Valor inscrição</label>
                <input type="text" class="form-control mask-money-value" id="valor_inscricao" name="valor_inscricao" value="{{ $torneio->valor_inscricao }}" required>
              </div>
              <div class="form-group col-md-3">
                <label for="data_evento">Data Evento</label>
                <input type="text" class="form-control mask-data" id="data_evento" name="data_evento" value="{{ $torneio->data_evento }}" required>
              </div>
              <div class="form-group col-md-6">
                <label for="premiacao">Qntd premiações</label>
                <textarea class="form-control edit-textarea" d="descricao" id="premiacao" name="premiacao" rows="3">{{ $torneio->premicacao }}</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="descricao">Regras e descrição</label>
                <textarea class="form-control edit-textarea" d="descricao" name="descricao" rows="3">{{ $torneio->descricao }}</textarea>
              </div>
              
              <div class="form-group col-md-4 text-center">
                <div  style="border-radius: 10px 10px 0px 0px;width: 100%;height:160px;">
                  <img src="{{ env('APP_URL') }}/storage/img/torneios/{{ $torneio->imagem }}" class="mt-2" style="width:140px;height:140px;object-fit: cover;">
                </div>
              </div>

              <div class="form-group col-md-7">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="arquivo">
                      <label class="custom-file-label" for="customFile">Alterar imagem</label>
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