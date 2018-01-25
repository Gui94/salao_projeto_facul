<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Produto;

use App\Fornecedor;

use App\FornecedorMarca;

use DB;


class ProdutoController extends Controller{

	  public function ListarProduto(){
      $produto = Produto::orderBy('id_produto')->get();
      $fornecedor = Fornecedor::OrderBy('id_fornecedor')->get();
    return view('salao_views/listar_estoque',compact('produto','fornecedor'));
    }

    public function ExcluirProduto($id){
      $produto = Produto::find($id);
      $produto->delete();
    return redirect('listar_produto')->with("alert-success","Excluido com sucesso");
    }

    public function produtoid($id){
      $produto = Produto::find($id);
    return view('salao_views/excluir_produto',compact('produto'));
    }

    public function AtualizarProduto($id){
      $fornecedor = DB::table('fornecedor')->get();
      $produto = Produto::find($id);
    return view('salao_views/atualizar_produto',compact('fornecedor','produto','marca'));
    }

    public function AtualizarProdutoDados(request $request){
          $this->validate($request, [
          'nome_produto'  =>  'required|filled|max:80',
          'preco' 		  =>  'required|numeric',
          'id_fornecedor' =>  'required|filled|numeric',
          ]
        );
        $produto = Produto::find($_REQUEST['id_produto']);
        $produto->nome_produto = $_REQUEST['nome_produto'];
        $produto->preco = $_REQUEST['preco'];
        $produto->id_fornecedor = $_REQUEST['id_fornecedor'];
        $produto->save();
        return redirect('listar_produto')->with('mensagem_sucesso','Atualizado com sucesso');
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
            $produto = new Produto($dados);
            $produto->save();
            $request->session()->flash('alert-success', 'cadastrado com sucesso');
            return redirect('listar_produto');
        }
      $fornecedor = Fornecedor::orderBy('id_fornecedor')->get();
      return view('salao_views/cadastro_produto',compact('fornecedor'));
    }

    public function FornecedorDetalhes($id){
      $fornecedor = Fornecedor::find($id);
      $marca = FornecedorMarca::orderBy('id_marca_fornecedor')->get();
      return view('salao_views/detalhes_fornecedor',compact('marca','fornecedor'));
    }
}