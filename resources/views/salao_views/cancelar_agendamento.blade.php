@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
#page-inner{
  min-width:1030px;
  min-height:300px;
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
        @if($errors->has())
          <p class="mensagem_error">{{$errors->first('data_agendamento',':message')}}</p>
        @endif
          <h2>Informações deste agendamento:</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Data Agendamento</th>
              <th>Horario</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>{{$agendamento->data_agendamento}}</th>
              <td>{{$agendamento->horario}}</td>
              <td>{{$agendamento->total}}</td>
              @if($agendamento->pago == true)
                <td>Pago</td>
              @else
                <td>Não Pago</td>
              @endif
            </tr>
          </tbody>
        </table>
        <br/>
        <h2>Tem certeza de que deseja cancelar este agendamento?</h2>
        <table class="table">
          <thead>
            <tr>
              <th><a href="{{url('cancelar_agendamento',$agendamento->id_pedido)}}" class="btn btn-primary btn-block">Sim</a></th>
              <th><a href="{{url('agendamentos_espera')}}"  class="btn btn-info btn-block">Não</a></th>
            </tr>
          </thead>
          <tbody>
            <tr>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="row">
    <div class="col-lg-12 text-center" >
      &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a><br/>
      <p>Editado por: Guilherme Araujo | Adriano Kapp</p>
    </div>
  </div>
</div>
<script>
$( function() {
  var date = $('#datepicker').datepicker({ dateFormat: 'yy/mm/dd' }).val();
});
</script>
