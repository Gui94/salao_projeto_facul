<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
  #calendario{
  	width:700px;
  	height:500px;
  	position:relative;
  	left:320px;
  	top:30px;
  }
  #detalhes{
  	top:2px;
  	position:relative;
  	font-size:25px;
  	border-radius:10px;
  }
  #pagos{
  	top:2px;
  	position:relative;
  	font-size:25px;
  	border-radius:10px;
  	left:195px;
  }
  #naopagos{
  	top:2px;
  	position:relative;
  	font-size:25px;
  	border-radius:10px;
  	left:540px;
  }
</style>
  <a id="pagos" class="btn btn-danger" href="pedidos_pagos_naopagos">Agendamentos ñ pagos</a>
  <a id="naopagos" class="btn btn-success" href="pedidos_pagos">Agendamentos pagos</a>
  <center><h1>Agendamentos de amanha</h1></center>
  <br/>
    <h1><center>{{Carbon\Carbon::parse($amanha)->format('d-m-Y')}}</h1></center>
  <br/>
  <a class="btn btn-primary" href="{{url('listar_agendamentos')}}">Voltar para dia de hoje</a>
  <div id="calendario">
    @forelse($agendamento as $p)
      <table class=" table table-bordered">
        <thead>
          <tr>
            <th>Data Agendamento</th>
            <th>Hora</th>
            <th>Total</th>
            <th>Pagamento</th>
            <th>Status</th>
            <th>Cliente</th>
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
            @foreach($cliente as $c)
             @if($p->id == $c->id)
            <td>{{$c->name}}</td>
            <td><a class="btn btn-primary" href="{{url('detalhes_pedidos_admin',$p->id_pedido)}}">Mais detalhes</a></td>
          </tr>
        </tbody>
      </table>
    @endif
    @endforeach
    @empty
      <div class="alert alert-danger" role="alert"><center>Nada agendado para amanha</center></div>
    @endforelse
    <br/>
    <center>{{ $agendamento->appends(['agendamento' => 'paginas'])->links() }}</center>
</div>