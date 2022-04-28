

@extends('layouts.app')

@section('mytitle', 'Contribuir')

@section('content')



@if(Auth::check() )

<div class="w-100 img-fundo-contribuir">
    <div class="container">
        <div class="row justify-content-center pb-5" style="padding-top: 15%;">
            <div class="col-md-6">
                <div class="w-100 text-center mb-3">
                    <p>
                        <img src="{{ asset('assets/img/game-06.png') }}" alt="" class="img-logo"  style="width: 70px; ">
                    </p>
                    <h3 class="text-white mt-3"><span class="text-principal">#AJUDE</span>A<span class="text-principal">ST</span></h3>

                    <p class="text-white w-50 mx-auto mt-3">Caso você tenha algum equipamento usado ou novo que deseja doar e ajudar nossos jogadores. preencha o formulário ao lado!</p>

                </div>
            </div>
            <div class="col-md-5 pb-5" >
                <div class="w-100 text-center">
                    
                       
                    @if (Session::has('mensagem-sucesso'))

                        <p>
                            <img src="{{ asset('assets/img/check.png') }}" alt="" class="img-logo" alt="checked" style="width: 90px; ">
                        </p>

                        <p class="text-white w-50 mx-auto">Seu formulário foi enviado com sucesso. fique atento ao seu email que em breve entraremos em contato!</p>

    

                    @else

                        <div class="w-100 mx-auto p-4" style="background-color:#1F223C;">
                            <p class="text-white"><b>Preencha de acordo com seu produto:</b></p>

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

                            <form class="form-row" method="POST" action="{{ route('contribuir.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12">
                                    <input type="text" class="form-person bg-segundaria" id="exampleFormControlInput1" placeholder="Titulo do produto" name="titulo" required>
                                </div>
                                <div class="form-group col-12">
                                    <input type="email" class="form-person bg-segundaria" id="exampleFormControlInput1" placeholder="Email de contato" name="email" required>
                                </div>
                                <div class="form-group col-12">
                                
                                    <textarea class="form-person bg-segundaria" id="exampleFormControlTextarea1" rows="3" placeholder="Descrição do produto" name="descricao" required></textarea>
                                    
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="">
                                        <p class="text-white small">Anexo documento: <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm bg-principal text-white p-0 m-0" data-toggle="modal" data-target="#exampleModal" style="border-radius: 50px">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="24" height="24"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
                                            </button></p>
                                        <input type="file" class="form-person bg-segundaria" id="customFile" name="arquivo" required>          
                                    </div>

                                    <div class="form-check text-white small mt-2">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                        Aceito os termos de uso e política de privacidade
                                        </label>
                                    </div>
                              </div>

                                


                                <div class="form-group col-12 text-center">
                                    <button class="btn px-4 btn-principal text-white" type="submit" style="border-radius:10px;">Enviar</button>
                                </div>

                                
                            </form>
                        </div>

                    @endif

                   

                    
                    
                </div>
            </div>

           

            

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

                <button class="btn px-4 mt-4 btn-principal text-white" type="button" style="border-radius:10px;">FAZER LOGIN COM A STEAM</button>
            </div>
        </div>

    </div>
</div>

@endif


@endsection