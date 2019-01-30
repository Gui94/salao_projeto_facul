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
	width:1210px;
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
	text-indent:130px;
	position:relative;
	right:105px;
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
			<h2>Meus Agendamentos</h2>
			<br/>
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th>Data Agendamento</th>
			      <th>Hora</th>
			      <th>Total</th>
			      <th>Detalhes</th>
			    </tr>
			  </thead>
			  @foreach($pedido as $p)
			  <tbody>
			    <tr>
			      <th>{{$p->data_agendamento}}</th>
			      <td>{{$p->horario}}</td>
			      <td>R$:{{$p->total}}</td>
			      <td><a class="btn btn-info" href="{{route('pedido.detalhes',$p->id_pedido)}}">Mais detalhes</a></td>
			    </tr>
			  </tbody>
			  @endforeach
			</table>
			@if(Session::has('erro'))
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
			        <font color="red"><h2>Agendamento não encontrado :(</h2></font>
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
			<center>{{ $pedido->appends(['pedido' => 'paginas'])->links() }}</center>
		</div>
	</div>
</div>
@include('layouts.rodape')
@stop