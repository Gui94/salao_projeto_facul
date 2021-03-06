@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
<style>
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
                <h2 class="text-center">Cadastro de nova marca de fornecedor</h2><br/>
                <a class="btn btn-info" href="listar_marca_fornecedor">Listar Marcas de fornecedores cadastradas</a><br/><br/>
                @if($errors->has())
                <div>
                	<p class="mensagem_error">{{$errors->first('marca_fornecedor',':message')}}</p>
                </div>
                @endif
                <form action="{{route('cadastro.marca.fornecedor')}}" method="post">
                	Marca do produto:<input  value="{{old('marca_fornecedor')}}" class="form-control" type="text" name="nome"><br/><br/>
                	<input type="submit" class="btn btn-primary btn-lg btn-block" value="cadastrar">
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.rodape_admin')