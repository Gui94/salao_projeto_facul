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
.servicos_cadastrados{
	position:relative;
	left:550px;
	bottom:45px;
	background-color:purple;
	border:3px solid silver;
	font-size:25px;
	color:silver;
	border-radius:10px;
}
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#d9edf7;
    border:1px solid white;
    display:inline;
    color: #31708f;
}
.mensagem{
    width:250px;
    height:310px;
    background-color:green;
    border:1px solid white;
    display:inline;
}
</style>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
				@if($errors->has())
					<div>
						<p class="mensagem_error">{{$errors->first('nome_produto',':message')}}</p>
						<p class="mensagem_error">{{$errors->first('id_marca_fornecedor',':message')}}</p>
						<p class="mensagem_error">{{$errors->first('preco',':message')}}</p>
						<p class="mensagem_error">{{$errors->first('id_fornecedor',':message')}}</p>
					</div>
				@endif
				<div class="mensagem">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))
				      <p class="mensagem">{{ Session::get('alert-'.$msg) }}</p>
				      @endif
				    @endforeach
				</div><br/>
				{!! Form::open(array('route' =>'atualizar.produto'))!!}
					<input type="hidden" value="{{$produto->id_produto}}" name="id_produto">
						<p>Nome do produto</p><input class="form-control" type="text" value="{{$produto->nome_produto}}" name="nome_produto"><br/>
						<p>Preço:</p><input type="text" class="form-control" value="{{$produto->preco}}" name="preco"><br/><br/>
							Fornecedores:
							<select name="id_fornecedor">
							@foreach($fornecedor as $f)
				    			<option  value="{{$f->id_fornecedor}}">{{$f->nome_fornecedor}}</option>
							@endforeach
							</select><br/><br/>
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="cadastrar">
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>