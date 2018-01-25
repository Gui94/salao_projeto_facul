<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pedido;

use App\User;

use DB;

use App\Fornecedor;

use App\FornecedorMarca;

class FornecedorController extends Controller{

	public function ListarMarcasFornecedor(){
        $marca = FornecedorMarca::OrderBy('id_marca_fornecedor')->get();
        return view('salao_views/listar_marcas_fornecedor',compact('marca'));
    }

    public function FormMarcaFornecedor(){
        return view('salao_views/cadastro_marca_fornecedor');
    }

    public function CadastrarMarcaFornecedor(request $request){
        $this->validate($request,[
            'marca_fornecedor'=>'required|max:80',
            ]
        );
        $marca = new FornecedorMarca();
        $marca->nome = $_REQUEST['marca_fornecedor'];
        $marca->save();
        return redirect('listar_marca_fornecedor');
    }

    public function deleteMarcaFornecedor($id){
        $marca = FornecedorMarca::find($id);
        return view('salao_views/excluir_marca_fornecedor',compact('marca'));
    }

     public function deletarMarcaFornecedor($id){
        $marca = FornecedorMarca::find($id);
        $marca->delete();
        return redirect('listar_marca_fornecedor');
    }

    public function atualizarMarcaFornecedor($id){
        $marca = FornecedorMarca::find($id);
        return view('salao_views/atualizar_marca_fornecedor',compact('marca'));
    }

    public function AtualizandoMarcaFornecedor(request $request){
        $this->validate($request,[
            'nome'=>'required|max:80',
            'id_marca_fornecedor'=>'required',
            ]
        );
        $marca = FornecedorMarca::find($_REQUEST['id_marca_fornecedor']);
        $marca->nome = $_REQUEST['nome'];
        $marca->save();
        return redirect('listar_marca_fornecedor');
    }

    public function fornecedorid($id){
        $fornecedor = Fornecedor::find($id);
        return view('salao_views/excluir_fornecedor',compact('fornecedor'));
    }

    public function CadastroFornecedorForm(){
        $fornecedor = FornecedorMarca::orderBy('id_marca_fornecedor')->get();
        return view('salao_views/cadastro_fornecedor',compact('fornecedor'));
    }

    public function ListarFornecedor(){
        $marca = FornecedorMarca::orderBy('id_marca_fornecedor')->get();
        $fornecedores = Fornecedor::orderBy('id_fornecedor')->get();
        return view('salao_views/listar_fornecedores',compact('fornecedores','marca'));
    }

    public function AtualizarFornecedor($id){
        $marca = FornecedorMarca::orderBy('id_marca_fornecedor')->get();
        $fornecedor = Fornecedor::find($id);
        return view('salao_views/atualizar_fornecedor',compact('fornecedor','marca'));
    }

    public function ExcluirFornecedor($id){
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();
        return redirect('listar_fornecedor');
    }

    public function CadastrarFornecedor(request $request){
            $this->validate($request, [
          'nome_fornecedor' => 'required|filled|max:80',
          'marca' => 'required|filled|max:80',
          'telefone' => 'required|filled|numeric|digits_between:10,11',
          ]
        );
        $fornecedor = new Fornecedor();
        $fornecedor->nome_fornecedor = $_REQUEST['nome_fornecedor'];
        $fornecedor->id_marca_fornecedor = $_REQUEST['marca'];
        $fornecedor->telefone = $_REQUEST['telefone'];
        $fornecedor->save();
        $request->session()->flash('alert-success', 'cadastrado com sucesso');
        return redirect('cadastro_fornecedor');
    }

    public function AtualizarFornecedorDados(request $request){
            $this->validate($request, [
          'nome_fornecedor' => 'required|filled|max:80',
          'marca' => 'required|filled|max:80',
          'telefone' => 'required|filled|numeric|digits_between:10,11',
          'id_fornecedor'=>'required',
          ]
        );
        $fornecedor = Fornecedor::find($_REQUEST['id_fornecedor']);
        $fornecedor->nome_fornecedor = $_REQUEST['nome_fornecedor'];
        $fornecedor->id_marca_fornecedor = $_REQUEST['marca'];
        $fornecedor->telefone = $_REQUEST['telefone'];
        $fornecedor->save();
        $request->session()->flash('alert-success', 'atualizado com sucesso');
        return redirect('listar_fornecedor');
    }
}