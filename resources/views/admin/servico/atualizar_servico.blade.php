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
	width:30px;
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
</style>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="mensagem">
                  @if(Session::has('mensagem_sucesso'))
                     <p class="alert alert-info text-center alert_sumir">{{ Session::get('mensagem_sucesso') }}</p>
                  @endif
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_servico" value="{{$servico->id_servico}}">
                        <p>Nome do serviço:</p>
                    <input class="form-control" name="nome_servico" value="{{$servico->nome_servico}}" type="text">
                        <p class="mensagem_error">{{$errors->first('nome_servico',':message')}}</p>
                        <p>Preço:</p>
                    <input name="preco" class="form-control" value="{{$servico->preco}}"  type="text">
                        <p class="mensagem_error">{{$errors->first('preco',':message')}}</p>
                        <p>Descrição:</p>
                    <input name="descricao" class="form-control" value="{{$servico->descricao}}"  type="text">
                        <p class="mensagem_error">{{$errors->first('descricao',':message')}}</p>
                    <br/>
                    @if($servico->imagem != '')
                        <img style="height:100px; width:100px;" src="{{asset('imagens_servicos/'.$servico->imagem)}}">
                        <br/>
                        <br/>
                        <input type="hidden" name="imagem" value="{{$servico->imagem}}">
                        <a class="btn btn-primary" href="{{route('deletar.imagem',$servico->id_servico)}}">Apagar Imagem</a>
                    @else
                        <label class="btn btn-primary btn-file">
                            <p>Imagem:</p>
                            <input type="file" style="display: none;" name="imagem">   
                        </label>
                        <p class="mensagem_error">{{$errors->first('imagem',':message')}}</p>
                    @endif
                        <br/>
                        <br/>
                        <p>Preço Desconto:</p>
                        <input class="form-control" name="preco_desconto" value="{{$servico->preco_desconto}}" type="text">
                        <p class="mensagem_error">{{$errors->first('preco_desconto',':message')}}</p><br/>
                        Servico em promoção?<br/>
                        <p>Sim<input type="radio" name="promocao" value="true" {{ $servico->promocao ==  true ? 'checked' : '' }} /></p>
                        <p>Não<input type="radio" name="promocao" value="false" {{ $servico->promocao == false ? 'checked' : '' }}/></p>
                        <p class="mensagem_error">{{$errors->first('promocao',':message')}}</p>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="atualizar">
                </form>
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