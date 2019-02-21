@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
    .detalhes{
	    background-color:purple;
	    border:3px solid silver;
	    top:2px;
	    position:relative;
	    font-size:25px;
	    color:silver;
	    border-radius:10px;
    }
    #dados{
	    position:relative;
	    left:400px;
    }
    .coluna{
	    font-size:25px;
    }

    .mensagem_error{
        width:250px;
        height:310px;
        background-color:#d9edf7;
        border:1px solid white;
        display:inline;
        color: #31708f;
    }
</style>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <br/>
                <h3>Atualizando informações do cliente:<strong>{{$cliente->name}}</strong></h3>
                <form action="{{route('atualizando.cliente.admin')}}" method="post">
                    <input type="hidden" value="{{$cliente->id}}" name="id">
                    <br/>
                    <p class="coluna">Nome:<input name="name" class="form-control" type="text"value="{{$cliente->name}}"></p>
                    <p class="mensagem_error">{{$errors->first('name',':message')}}</p>
                    <br/>
                    <p class="coluna">Sobrenome:<input name="sobrenome" class="form-control" type="text"value="{{$cliente->sobrenome}}"></p>
                    <p class="mensagem_error">{{$errors->first('sobrenome',':message')}}</p>
                    <br/>
                    <p class="coluna">Email:<input name="email" class="form-control" type="text"value="{{$cliente->email}}"></p>
                    <p class="mensagem_error">{{$errors->first('email',':message')}}</p>
                    <br/>
                    <p class="coluna">Telefone Residencial:<input class="form-control" name="telefone_residencial" type="text"value="{{$cliente->telefone_residencial}}"></p>
                    <p class="mensagem_error">{{$errors->first('telefone_residencial',':message')}}</p>
                    <br/>
                    <p class="coluna">Telefone Celular<input name="telefone_celular" class="form-control" type="text"value="{{$cliente->telefone_celular}}"></p>
                    <p class="mensagem_error">{{$errors->first('telefone_celular',':message')}}</p>
                    <br/>
                    <p class="coluna">Endereço:<input name="endereco" class="form-control" type="text"value="{{$cliente->endereco}}"></p>
                    <p class="mensagem_error">{{$errors->first('endereco',':message')}}</p>
                    <br/>
                    <input type="submit" value="atualizar" class="btn btn-primary btn-lg btn-block">
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.rodape_admin')