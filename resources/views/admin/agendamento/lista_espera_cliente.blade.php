@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
#page-inner{
  min-width:1030px;
}
.footer{
  min-width:1050px;
}
.mensagem_error{
  width:250px;
  height:310px;
  background-color:#d9edf7;
  border:1px solid white;
  display:inline;
  color: #31708f;
}
</style>
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <br/>
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
                  @if($p->cancelado == true)
                  @else
                  <th>Reagendar</th>
                  <th>Cancelar</th>
                  @endif
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
                <td>Residencial: {{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',$c->telefone_residencial)}}<br/><br/>Celular: {{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',$c->telefone_celular)}} </td>
                <td><a class="btn btn-primary" href="{{url('detalhes_pedidos_admin',$p->id_pedido)}}">Mais detalhes</a></td>
                @if($p->cancelado == true)
                @else
                @if($p->confirmacao == TRUE )
                <td>Horário confirmado</td>
                @else
                <td><a class="btn btn-primary" href="{{url('reagendar',$p->id_pedido)}}">Reagendar</a></td>
                @endif
                @if($p->confirmacao == TRUE )
                <td>Horário confirmado</td>
                @else
                <td><a class="btn btn-primary" href="{{url('cancelar',$p->id_pedido)}}">Cancelar</a></td>
                @endif
                @endif
              </tr>
              </tbody>
          </table>
          @endif
          @endforeach
          @empty
          <div class="alert alert-info" role="alert"><center>Nada encontrado</center></div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@include('layouts.rodape_admin')
