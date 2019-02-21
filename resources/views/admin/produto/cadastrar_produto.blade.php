@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
select{
    width:200px;
}
.detalhes{
    background-color:purple;
    border:3px solid silver;
    top:2px;
    position:relative;
    font-size:25px;
    color:silver;
    border-radius:10px;
}
.servicos_cadastrados{
    position:relative;
    left:550px;
    bottom:45px;
    background-color:purple;
    border:3px solid silver;
    font-size:25px;
    color:silver;
    border-radius:10px;
}
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#d9edf7;
    border:1px solid white;
    display:inline;
    color: #31708f;
}
.mensagem{
    width:250px;
    height:310px;
    background-color:green;
    border:1px solid white;
    display:inline;
}
</style>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <br/>
                    @if(\Request::is('cadastro_produto'))
                        <h2 class="text-center">Cadastro de produto</h2>
                    @else
                        <h2 class="text-center">Atualizar Produto</h2>
                    @endif
                    <div class="mensagem">
                       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-info">{{ Session::get('alert-'.$msg) }}</p>
                        @endif
                       @endforeach
                    </div>
                    <div id="forms">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="nome_produto">Nome do produto:</label>
                                <input class="form-control" value="@if(isset($produto)){{$produto->nome_produto}}@endif" type="text" name="nome_produto" id="nome_produto">
                                <p class="mensagem_error">{{$errors->first('nome_produto',':message')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço:</label>
                                <input id="preco" class="form-control" type="text" name="preco" value="@if(isset($produto)){{$produto->preco}}@endif">
                                <p class="mensagem_error">{{$errors->first('preco',':message')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="fornecedor">Fornecedores:</label>
                                <select id="fornecedor" class="form-control" name="id_fornecedor">
                                    <option></option>
                                    @foreach($fornecedor as $f)
                                        <option @if(isset($produto)) @if($produto->id_fornecedor == $f->id_fornecedor) selected @endif @endif value="{{$f->id_fornecedor}}">{{$f->nome_fornecedor}}</option>
                                    
                                    @endforeach
                                </select>
                                <p class="mensagem_error">{{$errors->first('id_fornecedor',':message')}}</p>
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg btn-block"
                             @if(\Request::is('cadastro_produto')) value="Cadastrar" @else value="Atualizar" @endif>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.rodape_admin')