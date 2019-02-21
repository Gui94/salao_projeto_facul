@include('layouts.cabecalho_admin')
@section('cabecalho_admin')
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
        {!! csrf_field() !!}
        <div class="mensagem">
            @if(Session::has('mensagem_sucesso'))
              <p class="alert alert-info text-center alert_sumir">{{ Session::get('mensagem_sucesso') }}</p>
            @endif
        </div>
        <h2 class="text-center">Lista dos serviços cadastrados</h2><br/>
        <table class=" table table-bordered">
        	<thead>
        		<td class="coluna">Imagem<td>
        		<td class="coluna">Nome Serviço<td>
        		<td class="coluna">Preço<td>
        		<td class="coluna">Atualizar<td>
        		<td class="coluna">Excluir<td>
        	</thead>
        	@foreach($servico as $s)
        	<tbody>
        		<td class="coluna"><img height="45px" src="{{asset('imagens_servicos/'.$s->imagem)}}" alt="{{$s->imagem}}"><td>
        		<td class="coluna">{{$s->nome_servico}}<td>
        		<td class="coluna">{{$s->preco}}<td>
        		<td class="coluna"><a class="btn btn-primary" href="{{route('atualizar.servico',$s->id_servico)}}">Atualizar</a><td>
        		<td class="coluna"><a class="btn btn-info" href="{{route('servico',$s->id_servico)}}">Excluir</a><td>
        	</body>
        	@endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@include('layouts.rodape_admin')