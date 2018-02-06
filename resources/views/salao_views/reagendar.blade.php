@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
  <script type='text/javascript' src="{{ asset('js/jquery-ui.js') }}"></script>
  <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> 
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
          <h2>Informações Atuais deste agendamento:</h2>
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
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Selecione nova data</th>
                <th>Selecione novo horario</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <form action="{{url('confirmar_reagendamento')}}" method="POST">
                  <input type="hidden" value="{{$agendamento->id_pedido}}" name="id">
                  <th><input type="text" id="datepicker" name="data_agendamento" ></th>
                  <td>
                    <select name="hora">
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="13:00">13:00</option>
                      <option value="14:00">14:00</option>
                      <option value="15:00">15:00</option>
                      <option value="16:00">16:00</option>
                      <option value="17:00">17:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                    </select>
                  </td>
                </form>
              </tr>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary btn-block" value="Reagendar">
          <!--</form>-->
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
<script>
  $(function() {
    var date = $('#datepicker').datepicker({ dateFormat: 'yy/mm/dd' }).val();
  });
</script>