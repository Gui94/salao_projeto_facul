 <html>  
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    


    
<style>
.botao{
		display:inline-block;
		color:white;
		width:200px;
		text-indent:105px;
		padding-top:15px;
		padding-left:45px;
}

a{
	text-decoration:none;
	color:white;
	display:inline;
	font-style:none;


}
.mover{
	position:relative;
	left:60px;
}


</style>

<center>
</center>
<meta charset="UTF-8">
<nav class="navbar navbar-inverse">
  <div class="col-xs-12 container text-justify">
<ul class="list-inline">
	<li class="text-left">
	<img width="184px" height="110px" src="http://localhost/laravel_5.2_base/laravel-base-aulas-master/public/imagens/logo.jpg"></img>	
	</li>
	<a href="{{url('index')}}"><li class="botao">
	Pagina inicial
	</a></li>
	<a href="{{url('servicos')}}"><li class="botao">
	Serviços
	</a></li>
	<a class="text-justify" href="{{url('carrinho')}}"><li class="botao">
	Carrinho
	</a></li>
	@if(Auth::guest())
	<a href="{{url('cadastro_login')}}"><li class="botao" >
	Cadastrar/Logar
	</a></li>
	@else
	<a class="mover" href="{{url('cliente_painel')}}"><li class="small" >
	{{Auth::user()->name}}
	</a></li>
	<a class="mover" href="{{url('logout')}}"><li class="botao" >
	Sair
	</a></li>
	@endif
	<a class="text-justify" href="{{url('contato')}}"><li class="botao">
	Contato
	</a></li>
</ul> 	 	
</div>
</nav>
</html>
@yield('cabecalho')