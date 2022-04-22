@extends('layouts.adm')

@section('content')


<div class="row justify-content-center" style="height: 600px">


    <div class="col-md-10">

      <div class="w-100 text-center mt-5">
        <h3 class="text-white"><b>TORNEIOS</b></h3>
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
        <a class="btn btn-primary" role="button" href="{{ route('torneios.create') }}"><img src="{{ asset('assets/img/add.png') }}" class="mb-1" alt="" style="width:20px;"> Add Torneio</a>
    </div>

    <div class="w-100 bg-white p-3 mb-5" style="border-radius:10px;">
      <table class="data-table-style table table-responsive-md">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Game</th>
            <th scope="col">Players</th>
            <th scope="col">data</th>
            <th scope="col">Inscrição</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($torneios as $torneio)
 
                <tr>
                    <th scope="row">{{ $torneio->id }}</th>
                    <td>{{ $torneio->titulo }}</td>
                    <td>{{ $torneio->torneio_game->nome }}</td>
                    <td>{{ $torneio->qtd_players }}</td>
                    <td>{{ date('d/m/Y',strtotime($torneio->data_evento)) }}</td>
                    <td>{{ $torneio->valor_inscricao }}</td>
                    <td class="text-center"style="width: 180px">
                       
                        <a class="btn btn-info" role="button" href="{{ route('torneios.edit', ['id'=> $torneio->id]) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                          <img src="{{ asset('assets/img/edit.png') }}" class="mb-1" alt="" style="width:20px;">
                        </a>  
                        <a class="btn btn-danger" role="button" href="{{ route('torneios.destroy', ['id'=> $torneio->id]) }}" data-toggle="tooltip" data-placement="top" title="Excluir">
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
      {{ $torneios->links('layouts.pagination'); }}
    </div> --}}


  
</div>
@endsection