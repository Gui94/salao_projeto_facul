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
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
             <p class="alert alert-info text-center">{{ Session::get('alert-'.$msg) }}</p>
          @endif
          @endforeach
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
              <td>{{$p->fornecedor->nome_fornecedor}}</td>
              <td>R$:{{$p->preco}}</td>
              <td><a class="btn btn-primary" href="{{url('atualizar_produto',$p->id_produto)}}">Atualizar informações</a></td>
              <td><a class="btn btn-primary" href="{{route('produto',$p->id_produto)}}">Excluir Produto</a></td>
              <td><a class="btn btn-primary" data-target="#myModal-{{ $p->id_fornecedor }}" data-toggle="modal" href="{{route('detalhes.fornecedor',$p->id_fornecedor)}}">Vizualizar informações</a></td>
            </tr>
          </tbody>
        @endforeach
        </table>
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
