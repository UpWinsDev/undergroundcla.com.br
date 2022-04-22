@extends('layouts.adm')

@section('content')


<div class="row justify-content-center">


    <div class="col-md-6 mt-5">
        <div class="w-100 bg-white p-3 mb-5 text-center" style="border-radius:10px;">
            <h1 class="display-4">Olá, familía ST!</h1>
                <p class="lead">Você esta na área restrita, aqui é possível fazer a gestão dos players, games, patrocinadores, times, torneios e contribuições.</p>
                <hr class="my-4">
                <p>Cadastre, edite, delete e visualize quando quiser.</p>
                <p class="lead">
                    <a class="btn btn-principal btn-sm text-white" href="{{ route('home.index') }}" role="button">Voltar ao site</a>
                </p>
          </div>
    </div>
    

</div>
@endsection