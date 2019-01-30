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
.jumbotron{
	background-color:white;
}
h1{
	font-size:25px;
}
.btn-info{
	color: #fff;
    background-color: #009999;
    border-color: #009999;
    font-size:25px;
}
.btn-info:hover{
	color: white;
    background-color: #4CCFC1;
    border-color: #4CCFC1;
    font-size:25px;
}
.btn-primary{
	background-color:#4CCFC1;
	border-color: #4CCFC1;
	font-size:25px;

}
.btn-primary:hover{
	color: white;
    background-color: #009999;
    border-color: #009999;
    font-size:25px;
}
</style>
<br/>
{!!Form::open(array('route' => 'gerar.pedido','method'=>'post'))!!}
	<div class="main_bg">
		<div class="wrap">	
			<div class="main">
				<h1 class="text-center">Tem certeza que deseja realizar o agendamento?</h1>
				<br/>
				<br/>
				<input type="hidden" name="horario_inicio" value="{{$hora_inicio}}">
				<input type="hidden" name="data_agendamento" value="{{$data_agendamento}}">
				<input type="submit" class="btn btn-info btn-block"   value="Sim">
				<br/>
				<a  class="btn btn-primary btn-block" href="{{route('carrinho')}}">Não</a>
			</div>
		</div>
	</div>
{{ Form::close() }}
</div>
@include('layouts.rodape')
@stop