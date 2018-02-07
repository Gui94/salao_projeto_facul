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
{!!Form::open(array('url' => 'gerar_pedido','method'=>'post'))!!}
<!--<input type="hidden" name="horario" value="{{$horario}}"> -->
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
				<a  class="btn btn-primary btn-block" href="{{url('carrinho')}}">Não</a>
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
<div class="footer_bg">
	<div class="wrap">	
		<div class="footer">
			<!-- start grids_of_4 -->	
			<div class="grids_of_4">
				<center><h1   style=" display: inline; color:white; font-size:35px;">Anna monteiro</h1>
				<h1   style="display: inline; color:white; font-size:35px;">Beleza Estética e Moda Telefone:(42)9837-4046</h1></center>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- start footer -->
<div class="footer_bg1">
	<div class="wrap">
		<div class="footer">
			 <a href="" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
			<!--end scroll_top_btn -->
			<div class="copy">
				<p class="link">&copy;  All rights reserved | Template by&nbsp;&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
				<p>Editado por Guilherme Araujo e Adriano Kapp</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
@stop