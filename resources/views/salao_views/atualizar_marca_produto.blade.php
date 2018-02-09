<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
		background-color:#FFB3B3;
		border:1px solid white;
		display:inline;
	}
</style>
<br/>
<br/>
@if($errors->has())
	<div>
		<p class="mensagem_error">{{$errors->first('nome',':message')}}</p>
		<p class="mensagem_error">{{$errors->first('id_marca_produto',':message')}}</p>
	</div>
@endif
<a class="btn btn-primary" href="{{route('listar.marca.produto')}}">Voltar</a>
<br/>
<div id="forms">
	{!! Form::open(array('route' =>'atualizando.marca.produto'))!!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
		<input type="hidden" name="id_marca_produto" value="{{$marca->id_marca_produto}}">
		<p>Nome da marca:</p><input name="nome" type="text" value="{{$marca->nome}}">
		<input type="submit" class="btn btn-primary" value="atualizar">
	</form>
</div>