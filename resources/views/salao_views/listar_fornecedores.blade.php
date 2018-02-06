@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
#calendario{
	width:700px;
	height:500px;
	position:relative;
	left:320px;
	top:30px;
}
.detalhes{
	background-color:purple;
	border:3px solid silver;
	top:2px;
	position:relative;
	font-size:25px;
	color:silver;
	border-radius:10px;
}
.pagos{
	background-color:purple;
	border:3px solid silver;
	top:2px;
	position:relative;
	font-size:25px;
	color:silver;
	border-radius:10px;
	left:250px;
}
.naopagos{
	background-color:purple;
	border:3px solid silver;
	top:2px;
	position:relative;
	font-size:25px;
	color:silver;
	border-radius:10px;
	left:630px;
}
.atualizar{
	background-color:green;
	color:white;
	text-decoration:none;
	font-size:30px;
}
.excluir{
	background-color:red;
	color:white;
	text-decoration:none;
	font-size:30px;
}
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#FFB3B3;
    border:1px solid white;
    display:inline;
}
.mensagem{
    width:250px;
    height:310px;
    background-color:green;
    border:1px solid white;
    display:inline;
    color:silver;
    font-size:25px;
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
            <div class="col-md-12"><br/>
				<div class="mensagem">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))

				      <p class="alert alert-info">{{ Session::get('alert-'.$msg) }}</p>
				      @endif
				    @endforeach
  				</div>
  				<h2 class="text-center">Lista de fornecedores Cadastrados</h2><br/>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Nome fornecedor</td>
							<td>Marca</td>
							<td>Telefone</td>
							<td>Atualizar</td>
							<td>Excluir</td>
						</tr>
					</thead>
					@foreach($fornecedores as $f)
					@foreach($marca as $m)
					@if($f->id_marca_fornecedor == $m->id_marca_fornecedor)
					<tbody>
						<tr>
							<td>{{$f->nome_fornecedor}}</td>
							<td>{{$m->nome}}</td>
							<td>{{$f->telefone}}</td>
							<td><a class="btn btn-primary" href="{{url('atualizar_fornecedor/'.$f->id_fornecedor)}}">Atualizar</a></td>
							<td><a class="btn btn-info" href="{{url('fornecedor_id/'.$f->id_fornecedor)}}">Excluir</a></td>
						</tr>
					</tbody>
					@endif
					@endforeach
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
<div class="footer">
    <div class="row">
        <div class="col-lg-12 text-center">
            	&copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a><br/>
            <p>Editado por: Guilherme Araujo | Adriano Kapp</p>
        </div>
    </div>
</div>