@extends('layouts.cabecalho_novo')
@section('cabecalho_novo')
<style>
#slide1{
    background-color:silver;
    width:900px;
    height:300px;
}
#promocao{
    width:300px;
    height:365px;
    border:5px solid silver;
    display:inline-block;
}
.servico{
    text-indent:50px;
    font-size:25px;

}
.fotos img{
    width:1348px;
    height:555px;
}
.fotos img {
    top:  0;
    left: 0
}
.preco_normal{
    color:red;
    font-size:25px;
}

.preco_desconto{
    color:green;
    font-size:35px;
} 

.img_servico_promocao{
    max-height:160px;
    min-height:160px;

}
.grid1_of_3{
    margin-left:0;
}
.btn-info{
    color: #fff;
    background-color: #4CCFC1;
    border-color: #4CCFC1;
    font-size:20px;
}
.btn-info:hover{
    color: white;
    background-color: #009999;
    border-color: #009999;
}
.logo_embaixo{
    color:white;
    font-size:40px;
}
.logo_embaixo2{
    color:white;
    font-size:40px;
}
</style>
<div class="fotos">
    <img style="width:100%;" src="{{asset('/imagens/cabelo2.jpg')}}"/>
    <img style="width:100%;" src="{{asset('/imagens/salao.jpg')}}"/>
    <img style="width:100%;" src="{{asset('/imagens/banner-1.jpg')}}"/>
    <img style="width:100%;" src="{{asset('/imagens/salao2.jpg')}}"/>
</div>
<div class="main_bg1">
    <div class="wrap">
        <div class="main1">
            <h2 class="text-center">Promoções</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <div>
                    @foreach($servico as $s)
                        <div class="grid1_of_3">
                            <a href="{{route('detalhes',$s->id_servico)}}">
                                <img class="img_servico_promocao" src="{{route('imagem.file',$s->imagem)}}" alt="{{$s->imagem}}">
                                <h3>{{$s->nome_servico}}</h3>
                                <div class="price">
                                    <h4>De: R${{$s->preco}}<span>Por: R${{$s->preco_desconto}}</span></h4>
                                </div>
                            </a>
                            <a href="{{route('detalhes',$s->id_servico)}}" class="btn btn-info">Mais Detalhes</a>
                        </div>
                    @endforeach
                </div>
                <div class="clear"></div>
            </div>
            <!-- end grids_of_3 -->
        </div>
    </div>
</div>
@include('layouts.rodape')
@stop

