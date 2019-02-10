@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
@endsection
<style>
#page-inner{
	min-width:1030px;
}
.footer{
	min-width:1050px;
}
</style>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
      <br/>
      <div class="mensagem">
          @if(Session::has('mensagem_sucesso'))
             <p class="alert alert-info text-center alert_sumir">{{ Session::get('mensagem_sucesso') }}</p>
          @endif
      </div>
      <a id="pagos" class="btn btn-primary" href="cadastro_produto">Cadastrar Produtos</a>
      <h1 class="text-center">Produtos Cadastrados</h1><br/>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nome do produto</th>
              <th>Fornecedor</th>
              <th>Preço</th>
              <th>Atualizar informações</th>
              <th>Excluir</th>
              <th>Fornecedor Informações</th>
            </tr>
          </thead>
          @foreach($produto as $p)
          <tbody>
            <tr>
              <td>{{$p->nome_produto}}</td>
              <td>{{$p->nome_fornecedor}}</td>
              <td>R$:{{$p->preco}}</td>
              <td><a class="btn btn-primary" href="{{url('atualizar_produto',$p->id_produto)}}">Atualizar informações</a></td>
              <td><a class="btn btn-primary" href="{{route('produto',$p->id_produto)}}">Excluir Produto</a></td>
              <td>
                <button type="button" class="btn btn-primary infos_fornecedor" data-toggle="modal" value="{{$p->id_fornecedor}}" data-target="#info">Vizualizar informações</button>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <div id="info" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detalhes do Fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <!---->
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
<script type="text/javascript">
$(function() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token':$('input[name="_token"]').val()
        }
    });
      $('.infos_fornecedor').on("click",function(evt){
          evt.preventDefatult;
          var id = $(this).attr('value');
          $.ajax({
              type: "GET",
              url: '{{route("detalhes.fornecedor")}}'+'/'+id,
              data: {id: id},
              success: function(fornecedor) {
                if($(".modal-body").text('')){
                  $('.modal-body').append("<p class='nome'>" + 'Nome: ' + fornecedor.nome +"</p>");
                  $('.modal-body').append("<p class='marca'>" + 'Marca: ' + fornecedor.nome_fornecedor +"</p>");
                  $('.modal-body').append("<p class='fone'>" + 'Telefone: ' + fornecedor.telefone +"</p>");
                }else{
                  alert('remove isso garaio');
                  $('.nome').html('');
                  $('.marca').text('');
                  $('.fone').text('');
                }
              },
          });
          
      });
});
</script>
