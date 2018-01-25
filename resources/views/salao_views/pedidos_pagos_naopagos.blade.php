@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
#sucesso{
        display:inline;
}

#page-inner{
          min-width:1030px;
        }
.alert-success{
      width:290px;
        height:45px;
        text-indent:65px;
        position:relative;
        left:550px;
        text-align:justify;
}
.mensagem_sucess{
        width:290px;
        height:45px;
}
.footer{
  min-width:1050px;
}
select{
  width:900px;
  font-size:20px;
}
</style>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 ">
                      @if(Session::has('mensagens_sucesso'))
                        <div class="alert alert-info text-center">
                             <strong>{{Session::get('mensagens_sucesso')}}</strong>.
                        </div>
                       @endif
                    </div>
                    </div>
                    <br/>
 @forelse ($pedido as $p)
 @if($p->cancelado == true)
 <strong>Pesquisar agendamentos cancelados de cada cliente</strong>
<form action="{{url('pesquisar_agendamentos_cancelados')}}" method="POST">
Lista de Clientes:<select  name="clientes">
@foreach($cliente as $f)
    <option  value="{{$f->id}}">{{$f->name}}</option>
@endforeach
</select>
<br/>
<input type="submit" value="pesquisar" class="btn btn-primary btn-block">
</form>
@else
@endif
<br/>
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
      <th>{{$p->horario}}</th>
      <th>{{$p->total}}</td>
      <th>{{$p->formas_pagamento}}</th>
      @if($p->pago == true)
      <th>Pago</th>
      @else
      <th>Não Pago</th>
      @endif
      <th>{{$p->users->name}}</th>
      <th><a class="btn btn-primary" href="{{url('detalhes_pedidos_admin',$p->id_pedido)}}">Mais detalhes</a></th>
      @if($p->pago == false)
      @if($p->cancelado == true)
      @else
      {{ Form::open (['url' => ['baixar_pedido', $p->id_pedido], 'method' => 'PUT']) }}
      <th>{{ Form::submit('Dar Baixa', ['class'=>'btn btn-info']) }}</th>
      {{ Form::close() }}
      @endif
      @else
      @endif
    </tr>
  </tbody>
</table>
@empty
<div class="alert alert-info" role="alert"><center>Nada encontrado</center></div>
@endforelse
<p>{{ $pedido->appends(['pedido' => 'paginas'])->links() }}</p>
</div>
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