@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
#servico{
	width:680px;
	height:450px;
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
	font-size: 20px;
	position: relative;
	right:40px;
	top:20px;
	border-radius: 10px;
}
#descricao{
	position:relative;
	left:295px;
	width:500px;
	height:300px;
}
#nome_servico{
	position:relative;
	bottom:50px;
}
.pessoa{
	position:relative;
	bottom:22px;
}
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#FFB3B3;
    border:1px solid white;
    display:inline;
    position:relative;
    left:480px;
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

.tempo{
   position:relative;
   top:50px;
   right:350px;
   font-size:25px;
} 
.tab-label-1{
   text-indent: -25px;
}

font{
   font-size:21px;
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
@if($errors->has())
<p class="mensagem_error">{{$errors->first('quant_pessoa',':message')}}</p>
@endif
<html>
<head>
	<title>The Aditii Website Template | Details :: w3layouts</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
<!-- start main -->
<div class="main_bg">
	<div class="wrap">	
		<div class="main">
		<!-- start content -->
			<div class="single">
					<!-- start span1_of_1 -->
					<div class="left_content">
						<div class="span1_of_1">
							<!-- start product_slider -->
							<div class="product-view">
							    <div class="product-essential">
							        <div class="product-img-box">
									    <div class="more-views" style="float:left;">
									        <div class="more-views-container">
										        <ul>
										            <li>
										            	<a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
										            	<img src="" src_main=""  title="" alt="" /></a>            
										            </li>
										            <li>
										            	<a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
										            	<img src="" src_main=""  title="" alt="" /></a>
										            </li>
										            <li>
										            	<a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
										            	<img src="" src_main=""  title="" alt="" /></a> 
										            </li>
										            <li>
										            	<a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
										            	<img src="" src_main="" title="" alt="" /></a>  
										            </li>
										            <li>
										            	<a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt="">
										            	<img src="" src_main="" title="" alt="" /></a>
										            </li>
										          </ul>
									        </div>
									    </div>
									    <div class="product-image"> 
									        <a class="cs-fancybox-thumbs cloud-zoom" rel="adjustX:30,adjustY:0,position:'right',tint:'#202020',tintOpacity:0.5,smoothMove:2,showTitle:true,titleOpacity:0.5" data-fancybox-group="thumb" href="images/0001-2.jpg" title="Women Shorts" alt="Women Shorts">
									           	<img height="250px" width="250px" src="{{asset('imagens_servicos/'.$servico->imagem)}}" alt="{{$servico->imagem}}">
									        </a>
									   </div>
									</div>
								</div>
							</div>
							<!-- end product_slider -->
						</div>
						<!-- start span1_of_1 -->
						<div class="span1_of_1_des">
							  <div class="desc1">
								<h3>{{$servico->nome_servico}}</h3>
								<br/>
								@if($servico->promocao == false)
								<h3>Preço:R$:{{$servico->preco}}</h3>
								<br/>
								@else
								<h5>PROMOÇÃO!!</h5>
								<br/>
								<font color="red"><h4>De:R$:{{$servico->preco}}</h4></font>
								<br/>
								<h5>Por:R$:{{$servico->preco_desconto}}</h5>
								@endif
								<div class="btn_form">
									{{ Form::open (['route' => ['carrinho.adicionar', $servico->id_servico]]) }}
										<h4 class="pessoa">Quantidade de pessoas:</h4><input value="1" class="pessoa" type="text" name="quant_pessoa">
										<br/>
										<input type="submit" value="Adicionar ao Carrinho" title="" />
									{{ Form::close() }}
								</div>
						   	 </div>
						</div>
						<div class="clear"></div>
						<!-- start tabs -->
					   	<section class="tabs">
				            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
					        <label for="tab-1" class="tab-label-1">Descrição</label>

						    <div class="clear-shadow"></div>
							
					        <div class="content">
						        <div class="content-1">
						        	<p class="para top">{{$servico->descricao}}</p>
									<div class="clear"></div>
								</div>
					        </div>
				        </section>
					    <!-- end tabs -->
			    	</div>
					<!-- start sidebar -->
					<!-- end sidebar -->
		        <div class="clear"></div>
			</div>	
			<!-- end content -->
		</div>
	</div>
</div>		
@include('layouts.rodape')>
</body>
</html>
@stop