@include('layouts.cabecalho_admin')
@section('cabecalho_admin')

<div id="page-wrapper" >
    <div id="page-inner">
         <div class="row">
               <div class="col-md-12">
<br/>  
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
<body>
<br/>
<center>
<table class="table">
	<tr>
		<td class="text-right">ID</td>
		<td >Nome do fornecedor</td>
	</tr>
	<tr>
	<td class="text-right">{{$fornecedor->id_fornecedor}}</td>
	<td>{{$fornecedor->nome_fornecedor}}</td>
	</tr>
</table>
		<h4>Tem certeza que quer excluir:<strong color="red">{{$fornecedor->nome_fornecedor}}?</strong></h4>
		<a class="btn btn-primary" href="{{url('excluir_fornecedor/'.$fornecedor->id_fornecedor)}}">Sim</a>
		<a class="btn btn-info" href="{{url('listar_fornecedor')}}">Não</a>
</center>


</div>
</div>
</div>
</body>
</html>