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
</style>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <br/>
                <a class="btn btn-primary" href="{{url('listar_marca_fornecedor')}}">Voltar</a>
                <br/>
                <form action="{{url('atualizando_marca_fornecedor')}}" method="POST">
                @if($errors->has())
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="id_marca_fornecedor" value="{{$marca->id_marca_fornecedor}}">
                    <p class="mensagem_error">{{$errors->first('id_marca_produto',':message')}}</p>
                    <p>Nome da marca:</p><input name="nome" class="form-control" type="text" value="{{$marca->nome}}">
                    <p class="mensagem_error">{{$errors->first('nome',':message')}}</p>
                    <br/>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="atualizar">
                </form>
                @endif
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