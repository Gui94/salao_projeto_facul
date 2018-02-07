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
<h2>Pedido Numero:{{$pedido->id_pedido}}</h2>
<br/>
<div id="page-wrapper" >
    <div id="page-inner">
         <div class="row">
            <div class="col-lg-12">
                <div class="row">
                      	<table class=" table table-bordered">
                      	<thead>
                      		<td class="text-center">Data do agendamento<td>
                      		<td class="text-center">Hora do agendamento<td>
                      		<td class="text-center">Total a pagar<td>
                      		<td class="text-center">Status<td>
                      		<td class="text-center">Nome do cliente<td>
                      	</thead>
                      	<tbody>
                      		<td class="text-center">{{$pedido->data_agendamento}}<td>
                      		<td class="text-center">{{$pedido->horario}}<td>
                      		<td class="text-center">{{$pedido->total}}<td>
                      		@if($pedido->pago == true)
                      		<td class="text-right">Pago<td>
                      		@else
                      		<td class="text-right">Não pago<td>
                      		@endif
                      		<td class="text-right">{{$pedido->users->name}}<td>
                      	</tbody>
                      </table>
                      <br/>
                      <br/>
                      <center><h2>Serviços deste agendamento</h2></center>
                      @foreach($pedido->itens as $item)
                      @foreach($servico as $s)
                      @if($item->id_servico == $s->id_servico)
                      <br/>
                      <table class="table table-striped table-inverse">
                        <thead>
                          <tr>
                            <th>Imagem</th>
                            <th>Servico</th>
                            <th class="text-right">Preço unitario</th>
                            <th class="text-right">Quantidade de pessoas</th>
                            <th class="text-right">Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-left"><img height="130px" width="130px" src="{{route('imagem.file',$s->imagem)}}" alt="{{$s->imagem}}"></td>
                            <td class="text-left">{{$s->nome_servico}}</td>
                            <td class="text-center">{{$item->valor_unitario}}</td>
                            <td class="text-center">{{$item->quant_pessoa}}</td>
                            <td class="text-right">{{$item->quant_pessoa*$item->valor_unitario}}</td>
                          </tr>
                        </tbody>
                      </table>
                      @endif
                      @endforeach
                      @endforeach
                      <br/>
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