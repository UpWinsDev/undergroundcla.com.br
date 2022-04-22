@extends('layouts.adm')

@section('content')

<div class="row justify-content-center mb-5">


    <div class="col-md-6">

      

    <div class="w-100 text-center my-5">
        <h3 class="text-white"><b>DADOS PLAYER</b></h3>
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
          <form action="{{  route('players.edit.do' , ['id'=> $player->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-12 text-center">
                <div  style="border-radius: 10px 10px 0px 0px;width: 100%;height:110px;">
                  <img src="{{ $player->player_users->avatar }}" class="mt-2" style="width:100px;height:100px;object-fit: cover;border-radius:50%;">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $player->nome }}" required>
              </div>
              <div class="form-group col-md-6">
                <label for="nasc">Data de nascimento</label>
                <input type="text" class="form-control" id="nasc" name="nasc" value="{{ $player->nasc }}" required>
              </div>
              <div class="form-group col-md-12">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $player->email }}" required>
              </div>
              <div class="form-group col-md-12">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" d="descricao" name="descricao" rows="3">{{ $player->descricao }}</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="id_classe">Classe</label>
                <select class="form-control" id="id_classe" name="id_classe">

                  <option value="{{ $player->player_classes->id }}">{{ $player->player_classes->nome }}</option>
        
                    @foreach ($classes as $classe)

                        @if ($classe->id != $player->id_classe)
                            <option value="{{ $classe->id }}">{{ $classe->nome }}</option>
                        @endif

                    @endforeach

                    <option value="">Selecione classe</option>

                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="id_recrutar">Status Recrutamento</label>
                <select class="form-control" id="id_recrutar" name="id_recrutar">

                  <option value="{{ $player->recrutado }}">{{ $recrutaStatus[$player->recrutado] }}</option>

                  @foreach ($recrutaStatus as $k => $status)

                      @if ($k != $player->recrutado)
                          <option value="{{ $k }}">{{ $status }}</option>
                      @endif

                  @endforeach


                    <option value="">Selecione Status</option>

                </select>
              </div>
            </div>
            <div class="form-group col-md-12 form-check form-check-inline">

              <input class="form-check-input" type="checkbox" id="patrocinar_streamer" name="patrocinar_streamer" 
        
              @php
              if($player->patrocinar_streamer == 1){
                echo 'checked';
              }
              @endphp>
              <label class="form-check-label" for="patrocinar_streamer">Patrocinar Streamer</label>
              

            </div>
            <div class="form-group col-md-12 my-3 text-center">

              @if ($player->arquivo != '')
                <p> <a href="{{ env('APP_URL') }}/storage/img/user-doc/{{ $player->player_users->id }}/{{ $player->arquivo }}" target="_blank">Baixar documento</a></p>
              @else
                
              @endif
              

            </div>
            <a class="btn btn-primary" role="button" href="{{ route('players.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
          </form>
        </div>

    </div>

</div>



@endsection