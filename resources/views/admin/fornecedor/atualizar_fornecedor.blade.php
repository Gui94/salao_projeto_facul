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
#forms{
	position:relative;
	left:250px;
}
#forms,input{
	width:300px;
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
                <a class="btn btn-primary" href="{{route('listar.fornecedor')}}">Voltar</a>
                <br/>
                    <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <p>Nome do fornecedor:</p><input name="nome_fornecedor" class="form-control" type="text" value="{{$fornecedor->nome_fornecedor}}">
                        <p class="mensagem_error">{{$errors->first('nome_fornecedor',':message')}}</p>
                        <br/>
                        Marca de fornecedores:
                        <select name="id_marca_fornecedor">
                            @foreach($marca as $f)
                            <option  value="{{$f->id_marca_fornecedor}}">{{$f->nome}}</option>
                            @endforeach
                        </select>
                        <p class="mensagem_error">{{$errors->first('marca',':message')}}</p>
                        <br/>
                        <p>Telefone:</p><input type="text" name="telefone" class="form-control"  value="{{$fornecedor->telefone}}">
                        <p class="mensagem_error">{{$errors->first('telefone',':message')}}</p>
                        <br/>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="atualizar">
                    </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.rodape_admin')