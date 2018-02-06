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
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12"><br/>     
				@if(Session::has('mensagem_sucesso'))
					<p class="alert alert-info text-center" role="alert">{{Session::get('mensagem_sucesso')}}</p>
				@endif
				<br/>
				<h2 class="text-center">Lista de clientes cadastrados</h2><br/>
				<table class="table table-bordered">
					<thead>
						<td>Nome do cliente</td>
						<td>Telefone celular</td>
						<td>Telefone residencial</td>
						<td>Email</td>
						<td>Atualizar infos</td>
						<td>Excluir</td>
						<td>Agendamentos deste cliente</td>
					</thead>
					@foreach($user as $u)
					<tbody>
						<td>{{$u->name}}</td>
						<td>{{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',$u->telefone_celular)}}</td>
						<td>{{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',$u->telefone_residencial)}}</td>
						<td>{{$u->email}}</td>
						<td><a class="btn btn-primary" href="{{url('atualizar_cliente_admin',$u->id)}}">Atualizar</a></td>
						<td><a class="btn btn-info" href="{{url('cliente_id',$u->id)}}">Excluir</a><qtd>
						<td><a class="btn btn-primary" href="{{url('cliente_agendamentos',$u->id)}}">Agendamentos</a></td>
					</tbody>
					@endforeach
				</table>
				<center>{{ $user->appends(['user' => 'paginas'])->links() }}</center>
			</div>
		</div>
	</div>
</div>
<div class="footer">   
    <div class="row">
        <div class="col-lg-12 text-center" >
            &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
            <br/>
            <p>Editado por: Guilherme Araujo | Adriano Kapp</p>
        </div>
    </div>
</div>