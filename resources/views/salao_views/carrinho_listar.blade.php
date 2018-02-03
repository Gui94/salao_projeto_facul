@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> 
<style>
select{
	font-size:20px;
}
strong{
	font-style:italic;
	font-size:25px;
}
.btn-primary{
	color: #fff;
    background-color: #009999;
    border-color: #009999;
}
.btn-primary:hover{
	color: white;
    background-color: #4CCFC1;
    border-color: #4CCFC1;
}
.btn-info{
	color: #fff;
    background-color: #009999;
    border-color: #009999;
}
.btn-info:hover{
	color: white;
    background-color: #4CCFC1;
    border-color: #4CCFC1;
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
<br/><br/><br/>
<div class="container">
	@if(Session::has('mensagens-sucesso'))
		<p class="alert alert-info text-center">{{Session::get('mensagens-sucesso')}}</p>
	@endif
	<table id="cart" class="table table-hover table-condensed">
		<a class="btn btn-info" id="remover_carrinho" href="{{route('carrinho.esvaziar')}}">Esvaziar Carrinho</a>
    	<thead>
			<tr>
				<th style="width:950%">Thumbnail</th>
				<th style="width:8%">Valor Unitário</th>
				<th style="width:10%">Quantidade</th>
				<th style="width:5%">Subtotal</th>
			</tr>
		</thead>
		@foreach($itens as $item)
		<tbody>
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img class="thumbnail" src="{{route('imagem.file',$item->servico->imagem)}}" alt="{{$item->servico->imagem}}" style="width:100px;"></div>
						<div class="col-sm-10">
							<h4 class="nomargin">Servico:</h4>
							<p>{{$item->servico->nome_servico}}</p>
						</div>
					</div>
				</td>
				@if($item->servico->promocao == true)
					<td data-th="Price">{{$item->servico->preco_desconto}}</td>
				@else
					<td data-th="Price">{{$item->servico->preco}}</td>
				@endif
					<td>
						{{$item->qtde}}	
					</td>
				@if($item->servico->promocao == true)
					<td  class="text-left">{{$item->qtde*$item->servico->preco_desconto}}</td>
				@else
					<td  class="text-left">{{$item->qtde*$item->servico->preco}}</td>
				@endif
				<td></td>
				<td></td>
			</tr>
		</tbody>
		@endforeach
		<tfoot>
			<tr>
				{{ Form::open (['route' => ['carrinho.finalizar-compra']]) }}
				<td>Calendario:<input type="text" id="datepickers" name="data_agendamento" ><i class="fa fa-angle-left"></i></td>
				<td>Horarios:
				<select name="hora_inicio">
					<option  value="10:00">10:00</option>
					<option  value="11:00">11:00</option>
					<option  value="13:00">13:00</option>
					<option  value="14:00">14:00</option>
					<option  value="15:00">15:00</option>
					<option  value="16:00">16:00</option>
					<option  value="17:00">17:00</option>
					<option  value="18:00">18:00</option>
					<option  value="19:00">19:00</option>
				</select><i class="fa fa-angle-center"></i></td>
				<td colspan="2" class="hidden-xs"></td>
				@if(session('cliente') == '')
					<td><a href="{{url('cadastro_login')}}" class="btn btn-primary">Precisa estar logado para finalizar<i class="fa fa-angle-right"></i></a></td>
				@else
					<td><input type="submit" value="finalizar" class="btn btn-primary"><i class="fa fa-angle-right"></i></td>
				@endif
					<td class="hidden-xs text-center"><strong>Total:R${{$total}}</strong></td>
				{{ Form::close() }}
			</tr>
		</tfoot>
	</table>			
</div>
<br/>
@if(Session::has('agendamento'))
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Erro</h4>
      </div>
      <div class="modal-body">
        <font color="red"><h2>Não é possivel agendar com uma data inferior a de hoje,por favor selecione outra data</h2></font>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$("#myModal").modal('show');
</script>
@endif
@if(Session::has('espera'))
<div class="modal fade" id="myModalEspera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	        	<h4 class="modal-title" id="myModalLabel">Aviso!</h4>
	      	</div>
	      	<div class="modal-body">
	        	<font color="red"><h2>Ja foi agendado neste dia e neste horario,caso queira confirmar mesmo assim,voce entrara na lista de espera para confirmação do horario ou agendar em outro dia e horario,tem certeza de que quer continuar?</h2></font>
	      	</div>
	      	<div class="modal-footer">
	      	{!!Form::open(array('url' => 'gerar_pedido_espera','method'=>'post'))!!}
	        	<input type="submit"  class="btn btn-primary" value="Sim">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
	        {{ Form::close() }}
	      	</div>
	    </div>
	</div>
</div>
<script type="text/javascript">
	$("#myModalEspera").modal('show');
</script>
@endif
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
<script type='text/javascript' src="{{ asset('js/jquery-ui.js') }}"></script>
<script>
  $( function() {
    var dates = $('#datepickers').datepicker({ dateFormat: 'yy/mm/dd' }).val();
  });
</script>
@stop