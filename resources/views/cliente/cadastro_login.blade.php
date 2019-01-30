@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
.logo_embaixo{
	color:white;
	font-size:40px;
}
.logo_embaixo2{
	color:white;
	font-size:40px;
}
</style>
<br/><br/><br/>
@if(Session::has('mensagens-sucesso'))
    <p class="alert alert-info text-center">{{Session::get('mensagens-sucesso')}}</p>
@endif
@if(Auth::guest())
<div class="container">
	@include('cliente.login_form')
	@include('cliente.cadastro_form')
</div>
@else
@endif
@include('layouts.rodape')
@stop