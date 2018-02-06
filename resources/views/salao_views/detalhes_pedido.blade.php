@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
thead{
	text-indent:100px;
}
.remover_carrinho{
	color:black;
	background-color:red;
	border-radius:5px;
	font-size:20px;
	left:1060px;
	position: relative;
}
#item{
	border:solid 5px silver;
	width:1250px;
	height:70px;
	top:50px;
	position:relative;
}
#item_servico{
	border:solid 5px silver;
	width:1250px;
	height:70px;
	top:50px;
	position:relative;
}
.coluna{
	text-indent:135px;
	position:relative;
	right:155px;
}
.coluna2{
	text-indent:130px;
	position:relative;
	right:155px;
}
.coluna3{
	text-indent:130px;
	position:relative;
	right:90px;
	top:15px;
}
.coluna4{
	text-indent:186px;
	position:relative;
	right:125px;
	top:15px;
}
.coluna_cima{
	text-indent:130px;
	position:relative;
	right:120px;
	top:15px;
}
.coluna_item{
	text-indent:186px;
	position:relative;
	right:125px;
	top:15px;
}
.finalizar{
	color:black;
	background-color:green;
	border-radius:5px;
	font-size:35px;
	position: relative;
	left:450px;
	top:45px;
}
.btn-info{
	background-color:#4CCFC1;
	border-color: #4CCFC1;
}
.btn-info:hover{
	color: white;
    background-color: #009999;
    border-color: #009999;
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
		<a class="btn btn-info btn-lg" href="{{url('pedidos')}}">Voltar para meus agendamentos</a>
		<br/>
		<table class="table table-bordered">
			<thead>
				<td>Data do agendamento<td>
				<td>Hora do agendamento<td>
				<td>Total a pagar<td>
				<td>Status<td>
			</thead>
		<br/>
		<br/>
			<tbody>
				<td>{{$pedido->data_agendamento}}<td>
				<td>{{$pedido->horario}}<td>
				<td>R$:{{$pedido->total}}<td>
				@if($pedido->pago == true)
				<td>Pago<td>
				@else
				<td>Não pago<td>
				@endif
			</tbody>
		</table>
		<br/>
		<br/>
		<br/>
		<br/>
		@foreach($pedido->itens as $item)
		@foreach($servico as $s)
		@if($item->id_servico == $s->id_servico)
		<table class="table table-striped table-inverse">
		  <thead>
		    <tr>
		      <th>Imagem</th>
		      <th>Servico</th>
		      <th class="text-right">Preço unitario</th>
		      <th class="text-right">Quantidade de pessoas</th>
		      <th class="text-right">Subtotal</th>
		    </tr>
		  </thead>
		    <tr>
		      <td class="text-right"><img height="130px" width="130px" src="{{route('imagem.file',$s->imagem)}}" alt="{{$s->imagem}}"></td>
		      <td class="text-right">{{$s->nome_servico}}</td>
		      <td class="text-right">{{$item->valor_unitario}}</td>
		      <td class="text-right">{{$item->quant_pessoa}}</td>
		      <td class="text-right">{{$item->quant_pessoa*$item->valor_unitario}}</td>
		    </tr>
		  </tbody>
		</table>
		</div>
		</div>
		</div>
		@endif
		@endforeach
		@endforeach
		<br/>
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