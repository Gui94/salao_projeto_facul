@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
#servico{
	width:650px;
	height:350px;
	border: 3px solid silver;
	position: relative;
	left:300px;
	top:30px;
}
#thumbnail{
	background-color:silver;
	height:250px;
	width:250px;
	position:relative;
	left:35px;
	top:5px;
}
#texto{
	position: relative;
	left:380px;
	bottom:210px;
}
#botao{
	font-size: 30px;
}
p{
	color:black;
	font-size:20px;
}
.preco_normal{
	color:red;
	font-size:25px;
	text-decoration:line-through;
}
.preco_desconto{
	color:green;
	font-size:35px;
}
.img_servico_promocao{
	max-height:160px;
	min-height:160px;
}
.grid1_of_3{
	margin-left:0;
}
.btn-info{
	color: #fff;
    background-color: #4CCFC1;
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
<br/>
<br/>
<div class="main_bg1">
	<div class="wrap">	
		<div class="main1">
			<center><h2>Serviços do salão</h2></center>
		</div>
	</div>
</div>
<br/>
<div class="main_bg">
	<div class="wrap">	
		<div class="main">
			<!-- start grids_of_3 -->
			<div class="grids_of_3"><div>
				@foreach($listar as $l)<!-- PRIMEIRO LISTA OS SERVIÇOS -->
					<div class="grid1_of_3">
						@if($l->promocao == true)<!-- VERIFICO SE ESTA EM PROMOCÃO,SE SIM,CARREGA O BLOCO DE CODIGO ABAIXO -->
						<font color="#009999">Promoção!!!!</font>
						<a href="{{route('detalhes',$l->id_servico)}}">
							<img class="img_servico_promocao" src="{{route('imagem.file',$l->imagem)}}" alt="{{$l->imagem}}">
							<h3>{{$l->nome_servico}}</h3>
							<div class="price">
								<h4>De: R${{$l->preco}}<span>Por: R${{$l->preco_desconto}}</span></h4>
							</div>
							@else<!-- SE NÃO,CARREGA O BLOCO DE CODIGO ABAIXO-->
						<div class="price">
							<a href="{{route('detalhes',$l->id_servico)}}">
							<img class="img_servico_promocao" src="{{route('imagem.file',$l->imagem)}}" alt="{{$l->imagem}}">
							<h3>{{$l->nome_servico}}</h3>
							<h4>Preço:<span>R${{$l->preco}}</span></h4>
						</div>
							@endif<!-- TERMINA CONDIÇÃO -->
						</a>
						<a href="{{route('detalhes',$l->id_servico)}}" class="btn btn-info">Mais Detalhes</a>
					</div>
				@endforeach<!-- TERMINA A LISTAGEM -->
				</div>
				<div class="clear"></div>
			</div>
			<!-- end grids_of_3 -->
		</div>
	</div>
</div>
<div class="footer_bg">
	<div class="wrap">	
		<div class="footer">
			<!-- start grids_of_4 -->	
			<div class="grids_of_4">
				<center><h1   style=" display: inline; color:white; font-size:35px;">Anna monteiro</h1>
				<h1 style="display: inline; color:white; font-size:35px;">Beleza Estética e Moda Telefone:(42)9837-4046</h1></center>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>	
<!-- start footer -->
<div class="footer_bg1">
	<div class="wrap">
		<div class="footer">
		 	<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
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