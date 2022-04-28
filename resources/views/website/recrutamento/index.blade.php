

@extends('layouts.app')

@section('mytitle', 'Recrutamento')

@section('content')



@if(Auth::check() )

<div class="w-100 img-fundo-recrutamento-login">
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 13%;">
            <div class="col-md-6">
                <div class="w-100 text-center">
                    <h5 class="text-white">Olá, {{ Auth::user()->username }}</h5>
                    <h3 class="text-white mt-3"><span class="text-principal">#FAÇA</span>PARTEDO<span class="text-principal">ST</span></h3>

                    @if (count(Auth::user()->user_players) == 0)
                        <p class="text-white w-50 mx-auto mt-3">Para fazer parte do time SEM TAG. preencha o formulário ao lado que em breve entraremos em contato via EMAIL com a resposta da sua solicitação.</p>
                    @endif

                </div>
            </div>
            <div class="col-md-5 pb-5" >
                <div class="w-100 text-center">
                    
                       
                    @if (count(Auth::user()->user_players) > 0)


                        @if (Auth::user()->user_players[0]->recrutado == 0)
                            <p>
                                <img src="{{ asset('assets/img/check.png') }}" alt="" class="img-logo" alt="checked"  style="width: 90px; ">
                            </p>
        
                            <p class="text-white w-50 mx-auto">Seu formulário foi enviado com sucesso. fique atento ao seu email que em breve entraremos em contato!</p>
                        @elseif (Auth::user()->user_players[0]->recrutado == 1)
                            <p>
                                <img src="{{ asset('assets/img/check.png') }}" alt="" class="img-logo" alt="checked"  style="width: 90px; ">
                            </p>
        
                            <p class="text-white w-50 mx-auto">Sejá bem vindo, nossa missão é oferecer o melhor possível aos nossos jogadores enquanto trazemos alegria à nossa torcida!</p>
                        @else
                            
                        @endif

                    @else

                        <div class="w-100 mx-auto p-4" style="background-color:#1F223C;">
                            <p class="text-white"><b>Preencha o formulário</b></p>

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

                            <form class="form-row" method="POST" action="{{ route('players.recrutar') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-12">
                                <input type="text" class="icon-avatar form-person bg-segundaria" name="nome" placeholder="Nome completo" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" class="icon-avatar form-person bg-segundaria" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="icon-avatar form-person bg-segundaria mask-fone" name="fone" placeholder="Telefone" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="icon-avatar form-person bg-segundaria mask-data" name="nasc" placeholder="Data de nascimento" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="icon-avatar form-person bg-segundaria mask-cpf" name="cpf" placeholder="CPF" required>
                                </div>
                                <div class="form-group col-md-6">
                                
                                    <textarea class="icon-avatar form-person bg-segundaria" id="exampleFormControlTextarea1" placeholder="Descrição" name="descricao" rows="1"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                        <div class="">
                                            <p class="text-white small">Anexo documento: <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm bg-principal text-white p-0 m-0" data-toggle="modal" data-target="#exampleModal" style="border-radius: 50px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="24" height="24"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
                                                </button></p>
                                            <input type="file" class="form-person bg-segundaria" id="customFile" name="arquivo" required>          
                                        </div>
                                </div>

                                <div class="form-check text-white col-md-12 text-center small">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" required>
                                    <label class="form-check-label" for="exampleRadios1">
                                    Aceito os termos de uso e política de privacidade
                                    </label>
                                </div>


                                <div class="form-group col-md-12 mt-3">
                                    <button class="btn px-4 btn-principal text-white" type="submit" style="border-radius:10px;">Enviar</button>
                                </div>

                                
                            </form>
                        </div>

                    @endif

                   

                    
                    
                </div>
            </div>

            @if (count(Auth::user()->user_players) != 0)
                <div class="col-md-12 pb-5">
                    <div class="w-100" >
                        <div class="row justify-content-center text-center pt-2 font-weight-bold" style="border:1px solid #FF8F1C; border-radius:25px; background-color:rgba(255, 255, 255, 0.159);">
                            <div class="col-md-3">
                                <p class="text-white">Usuário: {{ Auth::user()->user_players[0]->nome }} <span class="float-right">|</span> </p> 
                                
                            </div>
                            <div class="col-md-3">
                                <p class="text-white">id Steam: {{ Auth::user()->steamid }}</p> 
                            </div>
                            <div class="col-md-3">
                                <p class="text-white">Status:
                                    
                                    
                                    @switch(Auth::user()->user_players[0]->recrutado)
                                        @case(0)
                                            Pendente
                                            @break
                                        @case(1)
                                            Recrutado
                                            @break
                                        @default
                                            
                                    @endswitch
                                <span class="float-left">|</span> </p> 

                            </div>
                        </div>
                    </div>
                </div>
            @endif

            

        </div>

    </div>
</div>
                                                     
            
@else

<div class="w-100 img-fundo-recrutamento">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 15%;height:450px;">
       

                <h4 class="text-white py-3" style="width: 350px"><b> Ops... <br> <br> Parece que você não está conectado. Faça o login para enviar seu recrutamento</b>
                </h4>

                <a class="btn px-4 mt-4 btn-principal text-white" role="button" href="{{ route('auth.steam') }}" style="border-radius:10px;">FAZER LOGIN COM A STEAM</a>
            </div>
        </div>

    </div>
</div>

@endif



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content bg-segundaria">
      <div class="w-100 pr-2 pt-2">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>

        <div class="w-100 text-center p-3">
            <p class="text-white">Para verificarmos se você é você mesmo, envie uma foto segurando seu documento (identidade) ao lado do seu rosto, uma foto frente e outra com verso.</p>
            <p class="text-white"><b>Obs: A foto precisa estar legível</b></p>
            <p class="text-white"><small>Peso max 20MB</small></p>
            <button type="button" class="btn btn-danger btn-sm mt-2" data-dismiss="modal">Fechar</button>
        </div>
        
        
      </div>
    </div>
  </div>
</div>


@endsection