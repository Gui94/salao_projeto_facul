<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Carrinho;
use App\Servico;
use App\CarrinhoItem;
use App\DadosAgendamento;
use Illuminate\Support\Facades\Auth;
use Session;
class CarrinhoController extends Controller {
    /*
    CONTROLLER DE CARRINHO DESENVOLVIDO PELO PROFESSOR ADEMIR MAZER JR,UTILIZADO NO PROJETO SHOPPVEL,
    EDITADO POR GUILHERME ARAUJO E ADRIANO KAPP
    ESTE CONTROLLER É RESPONSAVEL POR GERENCIAR OS SERVIÇOS ADICIONADOS NO CARRINHO.
    */


    private $carrinho = null;

    function __construct() {
        
        $this->carrinho = new Carrinho();
    }

    function anyAdicionar(Request $request, $id) {
        $this->validate($request,[
            'quant_pessoa'=>'required|numeric|min:1',
            ]
        );
        if ($id == null) {
            return \Redirect::back()
                            ->withErrors('Nenhum código de produto informado para adicionar ao carrinho.');
        }
        if ($this->carrinho->add($id, $request->get('quant_pessoa'))>0) {
            return redirect('carrinho')->with('mensagens-sucesso', 'Serviço adicionado ao carrinho');
        }
        
        return \Redirect::back()->withErrors('Erro ao adicionar produto no carrinho');
    }

    function getListar() {
        $models = $this->getCarrinhoModels();
        return view('cliente/carrinho', $models);
    }

    function getEsvaziar() {
        $this->carrinho->esvaziar();
        return redirect('carrinho')->with('mensagens-sucesso', 'Carrinho esvaziado');
    }
/*
    function removerItemId($id){  
        \Session::push($id);
        dd($id);
        \Session::forget($id);
     return redirect('carrinho');   
    }
*/
    public function getCarrinhoModels() {
        $models['itens'] = $this->carrinho->getItens();
        $models['total'] = $this->carrinho->getTotal();
        $models['horario'] = '';
        $models['data_agendamento'] = '';

        //dd($models['itens']);
        return $models;
    }

    public function getFinalizarCompra(request $request) {
        /*
        $this->validate($request, [
            'data_agendamento' => 'required|filled|date_format:d/m/Y|after:today',
          ]
        );*/

                if(Session('cliente') == ''){
                 return redirect('carrinho'); 
                }else{
        if ($this->carrinho->getItens()->count() == 0) {
            return redirect('carrinho')->with('mensagens-sucesso','Nada adicionado no carrinho.');
        }
        $models = $this->getCarrinhoModels();
        //$models['horario'] =  $_REQUEST['horario'];
        $models['data_agendamento'] = $_REQUEST['data_agendamento'];
        $models['hora_inicio'] = $_REQUEST['hora_inicio'];
        if($models['data_agendamento'] == '' ){
            return redirect('carrinho')->with('mensagens-sucesso','selecione uma data');
        }else{
          
        return view('cliente/finalizar_pedido', $models);
      }
    }
  }
    //$dados_formulario = $request->all();
    //$produto = new Produto($dados_formularaio)
    //$produto->save();
}
