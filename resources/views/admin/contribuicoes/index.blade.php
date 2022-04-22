@extends('layouts.adm')

@section('content')


<div class="row justify-content-center" style="height: 600px">


    <div class="col-md-10">

      <div class="w-100 text-center mt-5">
        <h3 class="text-white"><b>CONTRIBUIÇÕES</b></h3>
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
      <table class="data-table-style table table-responsive-md">
        <thead>
          <tr>
            <th scope="col">#idsteam</th>
            <th scope="col">Player</th>
            <th scope="col">E-mail</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descrição</th>
            {{-- <th scope="col">status</th> --}}
            <th scope="col">Img</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contribuicoes as $contribuicao)
                <tr>
                    <th scope="row" class="small">{{ $contribuicao->contribuir_user->steamid }}</th>
                    <td>{{ $contribuicao->contribuir_user->username }}</td>
                    <td>{{ $contribuicao->email }}</td>
                    <td>{{ $contribuicao->titulo }}</td>
                    <td>{{ $contribuicao->descricao }}</td>
                    {{-- <td>{{ $contribuicao->status }}</td> --}}
                    <td>
                      <div  style="border-radius: 10px 10px 0px 0px;width: 100%;height:160px;">
                        <img src="{{ env('APP_URL') }}/storage/img/contribuicao/{{ $contribuicao->id_user }}/{{ $contribuicao->imagem }}" class="mt-2" style="width:100px;height:100px;object-fit: contain;">
                      </div>
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