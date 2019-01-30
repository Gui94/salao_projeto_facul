@yield('cabecalho_admin')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
<script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/bootstrap.js') }}"></script>
<script type='text/javascript' src="{{asset('js/admin.js')}}"></script>
<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <span class="logout-spn" >
              <a href="{{url('sair')}}" style="color:#fff;">Sair</a>
            </span>
        </div>
    </div>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="{{url('admin_painel')}}" ><i class="fa fa-desktop "></i>Pagina Inicial</a>
                </li>
                <li>
                    <a href="{{url('listar_agendamentos')}}"><i class="fa fa-book "></i>Agendamentos</a>
                </li>
                <li>
                    <a href="{{url('listar_produto')}}"><i class="fa fa-flask  "></i>Produtos</a>
                </li>

                <li>
                    <a href="{{url('financeiro_form')}}"><i class="glyphicon glyphicon-list-alt"></i>Relátorios</a>
                </li>
                <li>
                    <a href="{{url('cadastro_fornecedor')}}"><i class="fa fa-suitcase"></i>Fornecedores</a>
                </li>
                <li>
                    <a href="{{url('cadastro_servico')}}"><i class="fa fa-scissors"></i>Serviços</a>
                </li>
                <li>
                    <a href="{{url('listar_clientes')}}"><i class="fa fa-users"></i>Clientes </a>
                </li>
            </ul>
        </div>
    </nav>
</div>