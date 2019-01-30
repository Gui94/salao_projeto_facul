<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Anna Monteiro Beleza estética e moda</title>
 <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.cycle.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/script.js') }}"></script>
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
        
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- start slider -->		
	<script type="text/javascript" src="{{ asset('js/modernizr.custom.28468.js')}}"></script>
<div class="header_bg">
<div class="wrap">
	<style>.header{
	display: block;
	
	font-size: 1.2em;
	position:relative;
	text-transform: uppercase;
	
		}


.logo{
	background-color:white;
}

.logo_embaixo2{
	color:black;
	font-size:40px;
}
.h_icon{
	width:300px;
	padding-left:10px;
}

hr {
    display: block;
    border: 0;
    border-top: 10px solid #4CCFC1;
    margin: 1em 0;
    padding: 0;
    width:100%; 
}
</style>
<hr></hr>
	<div class="header">
		<div class="logo">
			<img width="350px" height="290px" src="{{asset('imagens/logo_novo_atualizado.jpg')}}" alt=""/>
		</div>
				<div class="h_icon">
		<ul class="icon1">
			<img width="350px" height="250px" src="{{asset('imagens/logo_novo_telefone.jpg')}}" alt=""/>
		</ul>
		</div>
		<div class="clear"></div>
	</div>
<hr></hr>
</div>
</div>
<div class="header_btm">
<div class="wrap">
	<div class="header_sub">
		<div class="h_menu">
			<ul>

				<li><a href="{{url('index')}}">Pagina inicial</a></li>
				<li><a href="{{url('servicos')}}">Lista de Serviços</a></li>
				<li><a href="{{url('carrinho')}}">Carrinho</a></li>
				@if(session('cliente') == '')
				<li><a href="{{url('cadastro_login')}}">Cadastrar/Logar</a></li>
				@else
				<li><a href="{{url('cliente_painel')}}">{{\Session::get('nome_cliente')}}</a></li>
				<li><a href="{{url('sair_cliente')}}">Sair</a></li>
				@endif
				<li><a href="{{url('contato')}}">Contato</a></li>
			</ul>
		</div>
		<div class="top-nav">
	          <nav class="nav ">	        	
	    	    <a href="#" id="w3-menu-trigger"> </a>
	                  <ul class="nav-list" style="">

							<li class="nav-item" ><a href="{{url('index')}}">Pagina inicial</a></li>
							<li class="nav-item" ><a href="{{url('servicos')}}">Lista de Serviços</a></li>
							<li class="nav-item" ><a href="{{url('carrinho')}}">Carrinho</a></li>
							@if(session('cliente') == '')
							<li class="nav-item" ><a href="{{url('cadastro_login')}}">Cadastrar/Logar</a></li>
							@else
							<li class="nav-item" ><a href="{{url('cliente_painel')}}">{{\Session::get('nome_cliente')}}</a></li>
							<li class="nav-item" ><a href="{{url('sair_cliente')}}">Sair</a></li>
							@endif
							<li class="nav-item"><a href="{{url('contato')}}">Contato</a></li>
	                 </ul>
	           </nav>
	          <div class="clear"> </div>
	          <script src="{{ asset('js/responsive.menu.js')}}"></script>
         </div>		  
	<div class="clear"></div>
</div>
</div>
</div>
</head>
@yield('cabecalho_novo')