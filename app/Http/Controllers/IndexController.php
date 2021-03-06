<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\models\EventModel;
use App\Servico;
use App\Pedido;
use App\Carrinho;
use App\ItemPedido;
use App\Fornecedor;
use MaddHatter\LaravelFullcalendar\Event;
use DB;
use App\Relatorio;
use Session;
use Auth;
use App\User;
use App\FornecedorMarca;

class IndexController extends Controller{
    //$dados_formulario = $request->all();
    //$produto = new Produto($dados_formulario)
    public function Index(){
        $servico = Servico::where('promocao',true)->paginate(7);
        return view('cliente/index',compact('servico'));
    }

    public function ContatoView(){
        return view('cliente/contatos'); 
    }

    public function CadastroLoginForms(){
        if(Session('cliente') == ''){
         return view('cliente/cadastro_login');   
        }else{
          return redirect('cliente_painel');  
        }  
    }

    public function Logout(){
        Session::forget();
        return redirect('index');
    }

}