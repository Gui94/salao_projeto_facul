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
<br/>     
<div class="mensagem">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-info">{{ Session::get('alert-'.$msg) }}</p>
      @endif
    @endforeach
  </div>
  <h2 class="text-center">Cadastro de novos serviços</h2>
  <br/>
<a class="btn btn-primary" href="listar_servicos_admin">Listar Serviços cadastrados</a>
<br/>
<br/>
<div id="forms">
	@if($errors->has())
{!! Form::open(array('url' =>'cadastrar_servico'))!!}
<p class="mensagem_error">{{$errors->first('nome_servico',':message')}}</p>
<p>Nome do serviço:</p><input class="form-control" value="{{old('nome_servico')}}"  type="text" name="nome_servico">
<p class="mensagem_error">{{$errors->first('preco',':message')}}</p>
<p>Preço:</p><input class="form-control"  type="text" value="{{old('preco')}}" name="preco">
<p class="mensagem_error">{{$errors->first('descricao',':message')}}</p>
<p>Descrição:</p><input class="form-control" type="text" value="{{old('descricao')}}" name="descricao">
<br/>
<p class="mensagem_error">{{$errors->first('imagem',':message')}}</p>
<label class="btn btn-primary btn-file">
<p>Imagem:</p><input type="file"  style="display: none;" name="imagem">
</label>
<br/>
<p class="mensagem_error">{{$errors->first('preco_desconto',':message')}}</p>
<p>Preço Desconto:</p><input class="form-control" type="text"  value="0" name="preco_desconto">
<br/>
<p class="mensagem_error">{{$errors->first('promocao',':message')}}</p>
Servico em promoção?
<br/>
<p>Sim<input type="radio" name="promocao" value="true" /></p>
<p>Não<input type="radio" name="promocao" value="false" /></p>
<br/>
<input type="submit" class="btn btn-primary btn-lg btn-block" value="cadastrar">
</form>
@endif
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
