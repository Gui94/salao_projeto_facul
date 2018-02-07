@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
table{
	text-indent: 100px;
}
.btn-primary{
	font-size:25px;
}
.btn-info{
	font-size:25px;
}
strong{
	color:blue;
}
#page-inner{
	min-width:1030px;
}
.footer{
	min-width:1050px;
}
</style>
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<br/>  
				<body>
				<br/>
				<center>
					<table class="table">
					<tr>
					<td class="text-right">ID</td>
					<td >Nome do produto</td>
					</tr>
					<tr>
					<td class="text-right">{{$produto->id_produto}}</td>
					<td>{{$produto->nome_produto}}</td>
					</tr>
					</table>
					<h4>Tem certeza que quer excluir:<strong>{{$produto->nome_produto}}?</strong></h4>
					<a class="btn btn-primary" href="{{url('excluir_produto/'.$produto->id_produto)}}">Sim</a>
					<a class="btn btn-info" href="{{url('listar_estoque')}}">Não</a>
				</center>
			</div>
		</div>
	</div>
</div>
</body>
</html>