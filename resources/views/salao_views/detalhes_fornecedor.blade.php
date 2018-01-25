@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
@endsection
    <style>
        #page-inner{
            min-height:300px;
        }
    </style>
    <div id="page-wrapper" >
        <div id="page-inner">
             <div class="row">
                   <div class="col-md-12">
                        <br/>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Informações do fornecedor:</div>
                                <div class="panel-body">
                                    <div class="thumbnail center-block">
                                        <div class="caption">
                                            <h4>Nome:{{$fornecedor->nome_fornecedor}}</h4>
                                            <br/>
                                            <h4>Marca:{{$fornecedor->marcas->nome}}</h4>
                                            <br/>
                                            <h4>Telefone:{{preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3',$fornecedor->telefone)}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
            </div>
        </div>
    </div>