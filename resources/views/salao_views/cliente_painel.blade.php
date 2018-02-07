@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
.div-square{
	border:2px solid #4CCFC1;
}
a{
 color:#009999;
}
a:hover{
	color:#4CCFC1;
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
					@if(Session::has('mensagens-sucesso'))
          	<p class="alert alert-info text-center">{{Session::get('mensagens-sucesso')}}</p>
          @endif
            <p style="font-size:25px">Bem vindo(a):{{Session::get('nome_cliente')}} {{Session::get('sobrenome')}}</p>
        </div>
        <br/>
        <a href="{{url('pedidos')}}" > 
         <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-offset-3 col-sm-2 col-xs-6">
              <div class="div-square">
  		            <i class="fa fa-book fa-5x"></i>
                  <h4>Meus Agendamentos</h4>
              </div>
        </a>
    </div> 
    <a href="{{url('cliente_dados')}}" >
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square">    
          <i class="fa fa-info fa-5x"></i>
          <h4>Meus Dados</h4>
      </div>
    </a>
    </div>
    <a href="{{url('sair_cliente')}}" >
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <i class="fa fa-sign-out fa-5x"></i>
            <h4>Sair</h4>
        </div>
    </a>
    </div>
    </div>
    </div>
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    </div>
    </div>
    </div>
    </div>
    <br/>
    <br/>
<div class="footer_bg">
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