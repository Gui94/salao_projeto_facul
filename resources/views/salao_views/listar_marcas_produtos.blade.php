<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"><br/>
<a class="btn btn-danger" href="cadastro_marca_produto">voltar</a><br/><br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="coluna">Id</th>
			<th class="coluna">Marca</th>
			<th class="coluna">Atualizar</th>
			<th class="coluna">Excluir</th>
		</tr>
	</thead>
	@foreach($marca as $m)
	<tbody>
		<tr>
			<th class="coluna">{{$m->id_marca_produto}}</th>
			<th class="coluna">{{$m->nome}}</th>
			<th class="coluna"><a class="btn btn-success" href="{{route('atualizar.marca.produto',$m->id_marca_produto)}}">Atualizar</a></th>
			<th class="coluna"><a class="btn btn-danger"  href="{{route('excluir.marca.produto',$m->id_marca_produto)}}">Excluir</a></th>
		</tr>
	</tbody>
	@endforeach
</table>