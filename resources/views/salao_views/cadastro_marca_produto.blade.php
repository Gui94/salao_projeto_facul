<style>
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#FFB3B3;
    border:1px solid white;
    display:inline;
}
</style>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"><br/>
<a class="btn btn-danger" href="cadastro_produto">Voltar</a><br/><br/>
<a class="btn btn-success" href="listar_marca_produto">Listar Marcas de produtos cadastradas</a><br/><br/>
@if($errors->has())
<div>
	<p class="mensagem_error">{{$errors->first('marca_produto',':message')}}</p>
</div>
@endif
<form action="{{route('cadastrando.marca.produto')}}" method="post">
	Marca do produto:
	<input class="form" type="text" name="marca_produto"><br/><br/>
	<input type="submit" class="btn btn-primary" value="cadastrar">
</form>