<style>
thead{
	text-indent:100px;
}
#item{
	border:solid 5px silver;
	width:1250px;
	height:70px;
	top:50px;
	position:relative;
}
.coluna4{
	text-indent:250px;
	position:relative;
	right:170px;
	top:15px;

}
.detalhes{
	background-color:purple;
	border:3px solid silver;
	top:2px;
	position:relative;
	font-size:25px;
	color:silver;
	border-radius:10px;
}

.coluna{
	text-indent:200px;
	position:relative;
	right:115px;
}
</style>
<a class="detalhes" href="{{route('financeiro.form')}}">Voltar</a>
<br/>
<br/>
<center>
	<table>
	<thead>
		<td class="coluna">data<td>
		<td class="coluna">fundo do caixa + total do dia<td>
		<td class="coluna">saida do dia<td>
		<td class="coluna">resultado<td>
	</thead>
</table>
@foreach($relatorio as $r)
<div id="item">
<table>
	<thead>
		<td class="coluna4">{{$r->data}}<td>
		<td class="coluna4">{{$r->fundocaixa_totaldia}}<td>
		<td class="coluna4">{{$r->saida_dia}}<td>
		<td class="coluna4">{{$r->resultado}}<td>
	</thead>
</table>
</div>
<br/>
@endforeach
<br/>