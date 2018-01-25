@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')


<style>
#facebook{
	font-size:30px;
	border-radius:15px;
}
h3{
	font-size:25px;
	text-indent:20px;
	color:#009999;
}

h1{
color:silver;
}

.jumbotron{
	background-color:white;
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

.logo_embaixo{
	color:white;
	font-size:40px;
}
.logo_embaixo2{
	color:white;
	font-size:40px;
}
</style>
<div class="jumbotron">
<div class="text-center">
<h1>Endereço</h1>

		<h3>Rua:Washington Luiz</h3>
		<br/>
		<h3>Bairro: 31 de Março</h3>
		<br/>
		<h3>Complemento:Neves</h3>
		<br/>
		<h3>Numero:484</h3>
		<br/>
		<h3>CEP:84021540</h3>
		<br/>
<br/>
<h1>Telefone/Email/Facebook</h1>

		<h3>Telefone:(42)9837-4046</h3>
		<br/>
		<br/>
		<h3>Email:annamonteiro2607@hotmail.com</h3>
		<br/>
		<br/>
		<h3>Acesse nossa pagina do facebook:</h3>
		<br/>
		<br/>
		<a class="btn btn-primary" id="facebook" href="https://www.facebook.com/annamonteirobelezaemoda/?fref=ts">facebook</a>
		<br/>
	
</div>
</div>
	<div class="footer_bg">
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