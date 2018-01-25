<?php

namespace App;

use App\Servico;
use App\Pedido;
use DB;
use App\CarrinhoItem;
use \Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/*
 INICIO MODELO DO CARRINHO DESENVOLVIDO PELO PROFESSOR ADEMIR MAZER JR,UTILIZADO NO PROJETO SHOPPVEL
EDITADO POR GUILHERME ARAUJO E ADRIANO KAPP
 */
class Carrinho extends Model {
    const NOME_CARRINHO = 'carrinho';

    private $itens = null;
    private $session = null;
    
    public function __construct() {
        $this->itens = session(self::NOME_CARRINHO, new Collection());   
    }

    public function getItens() {
        return $this->itens;
    }
    
    private function addItem($item) {
        $this->itens->push($item);
        session([self::NOME_CARRINHO => $this->itens]);
        session()->save();
    }
    
    public function add($id, $qtde = 1) {
        $p = Servico::find($id);
        
        if ($p == null) {
            return false;
        }
        if($p->promocao == false){
        $item = new CarrinhoItem();
        $item->servico = $p;
        $item->qtde = $qtde;
        $item->valor = 1 * $p->preco;
        $item->id = $id;
        }else{
        $item = new CarrinhoItem();
        $item->servico = $p;
        $item->qtde = $qtde;
        $item->valor = 1 * $p->preco_desconto;
        $item->id = $id; 
        }
        // dd($item);
        $this->addItem($item);
        return true;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->itens as $item) {
            if($item->servico->promocao == false){
            $total += $item->qtde * $item->servico->preco;
            }else{
             $total += $item->qtde * $item->servico->preco_desconto;   
            }   
        }
        return $total;
    }

    public function esvaziar() {
        session()->forget('carrinho');    
    }

}
/*FIM MODELO CARRINHO*/