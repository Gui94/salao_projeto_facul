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

.mensagem{
    width:250px;
    height:310px;
    background-color:green;
    border:1px solid white;
    display:inline;
    color:silver;
    font-size:25px;
}
.mensagem_error{
    width:250px;
    height:310px;
    background-color:#d9edf7;
    border:1px solid white;
    display:inline;
}
</style>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Relátorios de Faturamento</h1>
                <div class="mensagem">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="mensagem">{{ Session::get('alert-'.$msg) }}</p>
                    @endif
                    @endforeach
                </div>
                <br/>
                <br/>
                <a class="btn btn-primary" href="{{route('faturamento')}}">Faturamento do dia</a>
                <br/>
                <br/>
                <form action="{{route('pesquisar.data')}}" method="get">
                    Digite a data de inicio:<input type="text" name="data" class="form-control">
                    <p class="mensagem_error">{{$errors->first('data',':message')}}</p>
                    <br/>
                    Digite a data de fim:<input type="text" name="data2" class="form-control">
                    <p class="mensagem_error">{{$errors->first('data2',':message')}}</p>
                    <br/>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="calcular">
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
