@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
@endsection
<style>
    #page-inner{
        min-height:300px;
    }
    a:hover{
        text-decoration:none;
        color:#31708f;
    }
    a{
        color:#214761;
    }
    .div-square{
        border:white;
    }
</style>
 <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Painel Administratívo</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        @if(Session::has('admin_login'))
        <div class="row">
            <div class="col-lg-12 ">
                <div class="alert alert-info text-center alert_sumir">
                    <strong>{{\Session::get('admin_login')}}  {{\Session::get('nome')}}</strong>
                </div>
            </div>
        </div>
        @endif
        <!-- /. ROW  -->
        <a href="listar_agendamentos" >
            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                        <i class="fa fa-book fa-5x"></i>
                        <h4>Agenda</h4>
                      </div>
                    </a>
                </div>
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <a href="listar_produto" >
                      <div class="div-square">
                        <i class="fa fa-flask fa-5x"></i>
                        <h4>Produtos</h4>
                      </div>
                    </a>
                 </div>
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <a href="financeiro_form" >
                      <div class="div-square">
                        <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                        <h4>Relatórios</h4>
                      </div>
                    </a>
                 </div>
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <a href="cadastro_fornecedor" >
                      <div class="div-square">
                        <i class="fa fa-suitcase fa-5x"></i>
                        <h4 class="font-small">Fornecedores</h4>
                      </div>
                    </a>
                 </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <a href="cadastro_servico">
                      <div class="div-square">
                          <i class="fa fa-scissors fa-5x"></i>
                          <h4>Serviços</h4>
                      </div>
                    </a>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <a href="listar_clientes" >
                      <div class="div-square">
                        <i class="fa fa-users fa-5x"></i>
                        <h4>Clientes</h4>
                      </div>
                    </a>
                  </div>
              </div>
            </div>
        </div>
   </div>
</div>
@include('layouts.rodape_admin')
<script src="{{asset('/js/jquery-1.10.2.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
