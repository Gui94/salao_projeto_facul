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
      <div class="col-md-12"><br/>
        <h1>Total de Faturamento R$:{{$consulta}}</h1><br/>
        <h1>Agendamentos Gerados hoje:</h1>
        @forelse($agendamento as $p)
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Data Agendamento</th>
                <th>Horario</th>
                <th>Total</th>
                <th>Status</th>
                <th>Cliente</th>
                <th>Telefones</th>
                <th>Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>{{$p->data_agendamento}}</th>
                <td>{{$p->horario}}</td>
                <td>{{$p->total}}</td>
                @if($p->pago == true)
                <td>Pago</td>
                @else
                <td>Não Pago</td>
                @endif
                @foreach($cliente as $c)
                 @if($p->id == $c->id)
                <td>{{$c->name}} {{$c->sobrenome}} </td>
                <td>Residencial:{{$c->telefone_residencial}}<br/>Celular:{{$c->telefone_celular}} </td>
                <td><a class="btn btn-primary" href="{{route('detalhes.pedidos.admin',$p->id_pedido)}}">Mais detalhes</a></td>
              </tr>
            </tbody>
          </table>
          @endif
          @endforeach
          @empty
          <div class="alert alert-info" role="alert"><center>Nada Encontrado</center></div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@include('layouts.rodape_admin')
