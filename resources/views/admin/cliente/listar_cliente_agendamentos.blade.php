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
        <br/>
         @forelse ($agendamento as $p)	
        <table class=" table table-bordered">
          <thead>
            <tr>
              <th>Data Agendamento</th>
              <th>Hora</th>
              <th>Total</th>
              <th>Pagamento</th>
              <th>Status</th>
              <th>Detalhes</th>
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
              <td><a class="btn btn-primary" href="{{url('detalhes_pedidos_admin',$p->id_pedido)}}">Mais detalhes</a></td>
            </tr>
          </tbody>
        </table>
        @empty
        <div class="alert alert-info" role="alert"><center>este cliente não fez nenhum agendamento</center></div>
        @endforelse
      </div>
      <center>{{ $agendamento->appends(['agendamento' => 'paginas'])->links() }}</center>
    </div>
  </div>
</div>
@include('layouts.rodape_admin')