@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#d9edf7;
    border:1px solid white;
    display:inline;
}
.mensagem{
    width:250px;
    height:310px;
    background-color:green;
    border:1px solid white;
    display:inline;
}
.btn-primary{
    background-color:#4CCFC1;
    border-color: #4CCFC1;

}
.btn-primary:hover{
    color: white;
    background-color: #009999;
    border-color: #009999;
}
.jumbotron{
    background:white;
}
h2{
   font-size:25px;
}

.logo_embaixo{
    color:white;
    font-size:40px;
}
.logo_embaixo2{
    color:white;
    font-size:40px;
}
</style>
<div class="main_bg">
    <div class="wrap">      
        <div class="main">
            <br/>
            <div class="jumbotron">
                <div class="text-center">
                    <br/>
                    <br/>   
                    <h2>Atualizar suas informações cadastrais</h2>
                    <form action="{{route('atualizando.cliente.dados')}}" method="post">
                        <input type="hidden" value="{{$cliente->id}}" name="id">    
                            <br/>
                            <p class="mensagem_error">{{$errors->first('name',':message')}}</p>
                            <p class="coluna">Nome:<input name="name" type="text"value="{{Session::get('nome_cliente')}}"></p>
                            <br/>
                            <p class="mensagem_error">{{$errors->first('sobrenome',':message')}}</p>
                            <p class="coluna">Sobrenome:<input name="sobrenome" type="text"value="{{$cliente->sobrenome}}"></p>
                            <br/>
                            <p class="mensagem_error">{{$errors->first('telefone_residencial',':message')}}</p>
                            <p class="coluna">Telefone Residencial:<input name="telefone_residencial" type="text"value="{{$cliente->telefone_residencial}}"></p>
                            <br/>
                            <p class="mensagem_error">{{$errors->first('telefone_celular',':message')}}</p>
                            <p class="coluna">Telefone Celular<input name="telefone_celular" type="text"value="{{$cliente->telefone_celular}}"></p>
                            <br/>
                            <p class="mensagem_error">{{$errors->first('endereco',':message')}}</p>
                            <p class="coluna">Endereço:<input name="endereco" class="form" type="text"value="{{$cliente->endereco}}"></p>
                            <br/>
                            <br/>
                            <input type="submit" value="atualizar informaçòes" class="btn btn-primary btn-lg" id="detalhes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.rodape')
@stop