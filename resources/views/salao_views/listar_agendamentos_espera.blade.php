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

select{
  width:900px;
  font-size:20px;
}
</style>
<div id="page-wrapper" >
   <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
          <br/>
          <h2 class="text-center">Lista de espera de hoje</h2>
            @if(Session::has('mensagens-sucesso'))
              <p class="alert alert-info text-center">{{Session::get('mensagens-sucesso')}}</p>
          @endif
          @if($errors->has())
          <p class="mensagem_error">{{$errors->first('pesquisa_data',':message')}}</p>
          @endif
          <br/>
          <strong>Pesquisar os agendamentos que estao na lista de espera de determinado cliente</strong>
          <form action="{{url('pesquisa_lista_espera_cliente')}}" method="GET">
              Lista de Clientes:<select  name="clientes">
              @foreach($cliente as $f)
                  <option  value="{{$f->id}}">{{$f->name}}</option>
              @endforeach
              </select>
              <br/>
              <input type="submit" value="pesquisar" class="btn btn-primary btn-block">
          </form>
          <form action="{{url('pesquisar_clientes_horario_confirmado')}}" method="get">
            <strong>Pesquisar agendamentos confirmados pela data</strong><input type="text" class="form-control" name="pesquisa_data">
            <input type="submit" class="btn btn-primary btn-block" value="pesquisar">
            <br/>
            <br/>
          </form>
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
                <th>Reagendar</th>
                <th>Cancelar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$p->data_agendamento}}</td>
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
                <td><a class="btn btn-primary" href="{{url('reagendar',$p->id_pedido)}}">Reagendar</a></td>
                <td><a class="btn btn-primary" href="{{url('cancelar',$p->id_pedido)}}">Cancelar</a></td>
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

