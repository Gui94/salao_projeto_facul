<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Produto;

use App\Fornecedor;

use App\FornecedorMarca;

use DB;


class ProdutoController extends Controller{
    
    private $produto    = '';
    private $fornecedor = '';
    function __construct(){

      $this->produto    = new Produto();
      $this->fornecedor = new Fornecedor();

    }

	  public function ListarProduto(){
      $produto  = $this->produto->listar();
    return view('admin/produto/listar_produtos',compact('produto'));
    }

    public function ExcluirProduto($id){
      $this->produto->deleteProduto($id);
    return redirect('listar_produto')->with("mensagem_sucesso","Excluido com sucesso");
    }

    public function produtoid($id){
      $produto = $this->produto->getid($id);
    return view('admin/produto/excluir_produto',compact('produto'));
    }

    public function AtualizarProduto($id,request $request){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $this->validate($request, [
          'nome_produto'  =>  'required|filled|max:80',
          'preco'       =>  'required|numeric',
          'id_fornecedor' =>  'required|filled|numeric',
          ]
        );
        $produto = $this->produto->updateProduto($request->id,
          [
            'nome_produto' =>$request->input('nome_produto'),
            'preco'        =>$request->input('preco'),
            'id_fornecedor'=>$request->input('id_fornecedor')
          ]
        );
        return redirect('listar_produto')->with('mensagem_sucesso','Atualizado com sucesso');
      }
        $fornecedor = $this->fornecedor->listarFornecedor();
        $produto = $this->produto->getid($id);
      return view('admin/produto/cadastrar_produto',compact('fornecedor','produto','marca'));
    }

    public function CadastroProduto(request $request){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->validate($request, [
                    'nome_produto' => 'required|filled|max:80',
                    'preco' => 'required|numeric',
                    'id_fornecedor' => 'required|filled|numeric',
                ]
            );
            $dados = $request->all();
            $produto = $this->produto->cadastrarProduto($dados);
            return redirect('listar_produto')->with('mensagem_sucesso','Cadastrado com sucesso');
        }
      $fornecedor = $this->fornecedor->listarFornecedor();
      return view('admin/produto/cadastrar_produto',compact('fornecedor'));
    }

    public function FornecedorDetalhes($id){
      $fornecedor = $this->fornecedor->FornecedorDetalhes($id);
      return view('admin/produto/fornecedor_detalhes',compact('fornecedor'));
    }
}