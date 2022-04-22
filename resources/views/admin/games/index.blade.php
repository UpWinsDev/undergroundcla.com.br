@extends('layouts.adm')

@section('content')


<div class="row justify-content-center" style="height: 600px">


    <div class="col-md-10">

      <div class="w-100 text-center mt-5">
        <h3 class="text-white"><b>GAMES</b></h3>
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


      
    <div class="w-100 my-3">
        <a class="btn btn-primary" role="button" href="{{ route('games.create') }}"><img src="{{ asset('assets/img/add.png') }}" class="mb-1" alt="" style="width:20px;"> Add Game</a>
    </div>

    <div class="w-100 bg-white p-3 mb-5" style="border-radius:10px;">
      <table class="data-table-style table table-responsive-md">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descricao</th>
            <th scope="col">Imagem</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <th scope="row">{{ $game->id }}</th>
                    <td>{{ $game->nome }}</td>
                    <td>{{ $game->descricao }}</td>
                    <td>
                      <div  style="border-radius: 10px 10px 0px 0px;width: 100%;height:160px;">
                        <img src="{{ env('APP_URL') }}/storage/img/games/{{ $game->imagem }}" class="mt-2" style="width:100px;height:100px;object-fit: cover;">
                      </div>
                    </td>
                    <td class="text-center"style="width: 180px">
                       
                        <a class="btn btn-info" role="button" href="{{ route('games.edit', ['id'=> $game->id]) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                          <img src="{{ asset('assets/img/edit.png') }}" class="mb-1" alt="" style="width:20px;">
                        </a>  
                        <a class="btn btn-danger" role="button" href="{{ route('games.destroy', ['id'=> $game->id]) }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                          <img src="{{ asset('assets/img/excluir.png') }}" alt="" style="width:25px;">
                        </a>  
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
    

    {{-- <div class="col-md-12">
      {{ $games->links('layouts.pagination'); }}
    </div> --}}


  
</div>
@endsection