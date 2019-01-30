@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
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
            	@if(Session::has('mensagem_sucesso'))
             		<p class="alert alert-info text-center alert_sumir">{{ Session::get('mensagem_sucesso') }}</p>
         		@endif
				<br/>
				<a class="btn btn-info" href="cadastro_marca_fornecedor">voltar</a>
				<br/>
				<br/>
				<table class="table table-bordered">
					<thead>
						<tr>
						<th>Id</th>
						<th>Marca</th>
						<th>Atualizar</th>
						<th>Excluir</th>
						</tr>
					</thead>
					@foreach($marca as $m)
					<tbody>
						<tr>
						<td>{{$m->id_marca_fornecedor}}</td>
						<td>{{$m->nome}}</td>
						<td><a class="btn btn-primary" href="{{route('atualizar.marca.fornecedor',$m->id_marca_fornecedor)}}">Atualizar</a></td>
						<td><a class="btn btn-info" href="{{route('excluir.marca.fornecedor',$m->id_marca_fornecedor)}}">Excluir</a></td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
<div class="footer">  
    <div class="row">
        <div class="col-lg-12 text-center" >
            &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a><br/>
                <p>Editado por: Guilherme Araujo | Adriano Kapp</p>
        </div>
    </div>
</div>