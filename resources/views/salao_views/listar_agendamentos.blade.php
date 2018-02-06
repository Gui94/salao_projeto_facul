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
      @if(Session::has('mensagens-sucesso'))
        <p class="alert alert-info text-center">{{Session::get('mensagens-sucesso')}}</p>
      @endif          
      <a id="pagos" class="btn btn-primary" href="{{url('pedidos_pagos_naopagos')}}">Agendamentos não pagos</a>
      <a id="naopagos" class="btn btn-primary" href="{{url('pedidos_pagos')}}">Agendamentos pagos</a>
      <a id="naopagos" class="btn btn-primary" href="{{url('agendamentos_cancelados')}}">Agendamentos Cancelados</a>
      <a id="naopagos" class="btn btn-primary" href="{{url('agendamentos_espera')}}">Lista De Espera de Hoje({{$consulta}})</a><br/><br/>
      @if($errors->has())
        <form action="{{url('pesquisar')}}" method="GET">
          Pesquisar agendamento pela data:
          <br/>
          <p class="mensagem_error">{{$errors->first('pesquisa_agendamento',':message')}}</p>
          <input type="text" value="{{old('pesquisa_agendamento')}}" name="pesquisa_agendamento" class="form-control">
          @endif
          <br/>
          <input type="submit" class="btn btn-primary btn-block" value="pesquisar">
        </form><br/>
        <div id="calendario">
          <center><h1>Agendamentos de hoje</h1></center>
          <center><h1>{{Carbon\Carbon::parse($hoje)->format('d-m-Y')}}</h1></center><br/>
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
      <th>Esta na lista de espera?</th>
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
      @if($p->lista_espera == TRUE)
      <td>SIM</td>
      @else
      <td>Não</td>
      @endif
    </tr>
  </tbody>
</table>
@endif
@endforeach
@empty
<div class="alert alert-info" role="alert"><center>Não foi agendado nada hoje</center></div>
@endforelse
<center>{{ $agendamento->appends(['agendamento' => 'paginas'])->links() }}</center>
</div>
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
