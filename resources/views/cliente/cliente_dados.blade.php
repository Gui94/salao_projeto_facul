@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
#sucesso{
    display:inline;
}
.alert-success{
    width:250px;
    height:45px;
    text-indent:30px;
    position:relative;
    left:550px;
    text-align:justify;
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
<br/>
<div class="main_bg">
	<div class="wrap">	
		<div class="main">
			@if(Session::has('mensagem_sucesso'))
			<div class="alert alert-info text-center">
				<p id="sucesso">{{Session::get('mensagem_sucesso')}}</p>
			</div>
			@endif
			<div class="jumbotron">
				<div class="text-center">
					<h2>Meus dados cadastrais</h2>
					<br/>
					<br/>
					<p>Nome:{{Session::get('nome_cliente')}}</p>
					<br/>
					<p>Sobrenome:{{Session::get('sobrenome')}}</p>
					<br/>
					<p>Email:{{Session::get('email')}}</p>
					<br/>
					<p>Telefone Residencial:{{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',Session::get('telefone_residencial'))}}</p>
					<br/>
					<p>Telefone Celular:{{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',Session::get('telefone_celular'))}}</p>
					<br/>
					<p>Endereço:{{Session::get('endereco')}}</p>
					<br/>
					<br/>
					<a class="btn btn-primary btn-lg" href="{{route('atualizar.cliente.form',Session::get('id'))}}">Atualizar</a>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.rodape')
@stop