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
        <h2 class="text-center">Resultados da Busca</h2>       
          @forelse($agendamento as $p)
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Data Agendamento</th>
                <th>Horario</th>
                <th>Total</th>
                <th>Pagamento</th>
                <th>Status</th>
                <th>Cliente</th>
                <th>Detalhes</th>
                <th>Reagendar</th>
                <th>Cancelar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>{{$p->data_agendamento}}</th>
                <td>{{$p->horario}}</td>
                <td>{{$p->total}}</td>
                <td>{{$p->formas_pagamento}}</td>
                @if($p->pago == true)
                <td>Pago</td>
                @else
                <td>Não Pago</td>
                @endif
                <td>{{$p->users->name}}</td>
                <td><a class="btn btn-primary" href="{{route('detalhes.pedidos.admin',$p->id_pedido)}}">Mais detalhes</a></td>
                @if($p->lista_espera == true)
                <td><a class="btn btn-primary" href="{{route('reagendar',$p->id_pedido)}}">Reagendar</a></td>
                @else
                <td>horario confirmado</td>
                @endif
                @if($p->lista_espera == true)
                <td><a class="btn btn-primary" href="{{route('cancelar',$p->id_pedido)}}">Cancelar</a></td>
                @else
                <td>horario confirmado</td>
                @endif
              </tr>
            </tbody>
          </table>
        @empty
        <div class="alert alert-info" role="alert"><center>Não foi agendado nada neste dia</center></div>
        @endforelse
        <center>{{ $agendamento->appends(["pesquisa_agendamento" => $_REQUEST['pesquisa_agendamento']])->links() }}</center>
      </div>
    </div>
  </div>
</div>
@include('layouts.rodape_admin')