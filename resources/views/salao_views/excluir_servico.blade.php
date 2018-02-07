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
					<td >Nome do servico</td>
					</tr>
					<tr>
					<td class="text-right">{{$servico->id_servico}}</td>
					<td>{{$servico->nome_servico}}</td>
					</tr>
					</table>
					<h4>Tem certeza que quer excluir:<strong color="red">{{$servico->nome_servico}}?</strong></h4>
					<a class="btn btn-primary" href="{{url('deletar_servico/'.$servico->id_servico)}}">Sim</a>
					<a class="btn btn-info" href="{{url('listar_servicos_admin')}}">Não</a>
				</center>
			</div>
		</div>
	</div>
</div>
</body>
</html>