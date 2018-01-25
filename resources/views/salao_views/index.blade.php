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
        <img src="http://localhost/laravel_5.2_base/laravel-base-aulas-master/public/imagens/cabelo2.jpg"/>
        <img src="http://localhost/laravel_5.2_base/laravel-base-aulas-master/public/imagens/salao.jpg"/>
        <img src="http://localhost/laravel_5.2_base/laravel-base-aulas-master/public/imagens/banner-1.jpg"/>
        <img src="http://localhost/laravel_5.2_base/laravel-base-aulas-master/public/imagens/salao2.jpg"/>
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
                <div style="display:table; margin:0 auto;">
                    @foreach($servico as $s)
                        <div class="grid1_of_3">
                            <a href="{{url('detalhes',$s->id_servico)}}">
                                <img class="img_servico_promocao" src="{{route('imagem.file',$s->imagem)}}" alt="{{$s->imagem}}">
                                <h3>{{$s->nome_servico}}</h3>
                                <div class="price">
                                    <h4>De: R${{$s->preco}}<span>Por: R${{$s->preco_desconto}}</span></h4>
                                </div>
                            </a>
                            <a href="{{url('detalhes',$s->id_servico)}}" class="btn btn-info">Mais Detalhes</a>
                        </div>
                    @endforeach
                </div>
                <div class="clear"></div>
            </div>
            <!-- end grids_of_3 -->
        </div>
    </div>
</div>
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
        <!-- start grids_of_4 -->
            <div class="grids_of_4">
                <h1 class="text-center" style=" color:white; font-size:35px;">Anna monteiro
                Beleza Estética e Moda Telefone:(42)9837-4046</h1>
            </div>
        </div>
    </div>
</div>
<!-- start footer -->
<div class="footer_bg1">
    <div class="wrap">
        <div class="footer">
             <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
             <!--end scroll_top_btn -->
                <div class="copy">
                    <p class="link">&copy;  All rights reserved | Template by&nbsp;&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
                    <p>Editado por Guilherme Araujo e Adriano Kapp</p>
                </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@stop