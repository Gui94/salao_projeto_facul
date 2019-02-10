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
                  @if(Session::has('mensagem_sucesso'))
                    <p class="alert alert-info">{{ Session::get('mensagem_sucesso') }}</p>
                  @endif
                </div>
                <h2 class="text-center">Cadastro de novos serviços</h2><br/>   
                <a class="btn btn-primary" href="listar_servicos_admin">Listar Serviços cadastrados</a><br/><br/>
                <div id="forms">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <p class="mensagem_error">{{$errors->first('nome_servico',':message')}}</p>
                          <p>Nome do serviço:</p><input class="form-control" value="{{old('nome_servico')}}"  type="text" name="nome_servico">
                        <p class="mensagem_error">{{$errors->first('preco',':message')}}</p>
                          <p>Preço:</p><input class="form-control"  type="text" value="{{old('preco')}}" name="preco">
                        <p class="mensagem_error">{{$errors->first('descricao',':message')}}</p>
                          <p>Descrição:</p><input class="form-control" type="text" value="{{old('descricao')}}" name="descricao"><br/>
                        <p class="mensagem_error">{{$errors->first('imagem',':message')}}</p>
                          <label class="btn btn-primary btn-file">
                          <p>Imagem:</p><input type="file"  style="display: none;" name="imagem">
                          </label><br/>
                        <div class="preco_desconto">
                          <p class="mensagem_error desconto">{{$errors->first('preco_desconto',':message')}}</p>
                          <p>Preço Desconto:</p><input class="form-control preco_desconto" id="input" type="text" value="0" name="preco_desconto"><br/>
                        </div>
                          <p class="mensagem_error">{{$errors->first('promocao',':message')}}</p>Servico em promoção?<br/>
                          <p>Sim<input class="sim" type="radio" name="promocao" value="true" /></p>
                          <p>Não<input class="nao" type="radio" name="promocao" value="false" /></p>
                        <br/>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="cadastrar">
                    </form>
                </div>
              </div>
          </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  $('.preco_desconto').show();
  $('input[name="promocao"]').click(function () {
    if($('input[name="promocao"]:checked').val() == 'true') {
      $('.preco_desconto').show();
    }else{
      $('.preco_desconto').hide();
    }
  });
});
</script>
<div class="footer">
  <div class="row">
      <div class="col-lg-12 text-center" >
          &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
          <br/>
          <p>Editado por: Guilherme Araujo | Adriano Kapp</p>
      </div>
  </div>
</div>
