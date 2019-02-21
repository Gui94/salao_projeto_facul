@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
.detalhes{
    background-color:purple;
    border:3px solid silver;
    top:2px;
    position:relative;
    font-size:25px;
    color:silver;
    border-radius:10px;
}
#forms{
    position:relative;
    left:250px;
}
#forms,input{
    width:300px;
}
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#d9edf7;
    border:1px solid white;
    display:inline;
    color: #31708f;
}
#page-inner{
    min-height:300px;
}
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                @if($errors->has())
                    <p class="mensagem_error">{{$errors->first('nome_fornecedor',':message')}}</p>
                    <p class="mensagem_error">{{$errors->first('id_marca_fornecedor',':message')}}</p>
                    <p class="mensagem_error">{{$errors->first('telefone',':message')}}</p>
                @endif
                <h2 class="text-center">Cadastro de novo fornecedor</h2><br/>
                <a class="btn btn-primary" href="{{route('cadastro.marca.fornecedor.form')}}">Cadastrar Marcas dos fornecedores</a><br/><br/>
                <a class="btn btn-primary" href="{{route('listar.fornecedor')}}">Listar Fornecedores Cadastrados</a><br/><br/>
                <form action="cadastrar_fornecedor" method="POST">
                    <p>Nome do fornecedor:</p><input value="{{old('nome_fornecedor')}}" class="form-control" type="text" name="nome_fornecedor"><br/>
                    Marcas:
                    <select name="id_marca_fornecedor">
                    @foreach($marca as $m)
                        <option  value="{{$m->id_marca_fornecedor}}">{{$m->nome}}</option>
                    @endforeach
                    </select><br/>
                    <p>Telefone:</p><input value="{{old('telefone')}}" class="form-control" type="text" name="telefone"><br/><br/>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="cadastrar">
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.rodape_admin')