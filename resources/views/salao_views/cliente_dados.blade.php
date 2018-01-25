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
@endif
</div>
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
	<a class="btn btn-primary btn-lg" href="{{url('atualizarcliente_form',Session::get('id'))}}">Atualizar</a>
</div>
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