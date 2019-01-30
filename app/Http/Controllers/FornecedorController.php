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

    private $fornecedor       = '';
    private $fornecedor_marca = '';
    function __construct(){
        $this->fornecedor       = new Fornecedor();
        $this->fornecedor_marca = new FornecedorMarca();
    }

	public function ListarMarcasFornecedor(){
        $marca = $this->fornecedor_marca->ListarMarca();
        return view('admin/fornecedor/listar_marcas_fornecedor',compact('marca'));
    }

    public function FormMarcaFornecedor(){
        return view('admin/fornecedor/cadastro_marca_fornecedor');
    }

    public function CadastrarMarcaFornecedor(request $request){
        $this->validate($request,[
            'nome'=>'required|max:80',
            ]
        );
        $this->fornecedor_marca->CadastrarMarca($request->all());
        return redirect('listar_marca_fornecedor')->with('mensagem_sucesso','Cadastrado com sucesso');
    }

    public function deleteMarcaFornecedor($id){
        $marca = $this->fornecedor_marca->MarcaId($id);
        return view('admin/fornecedor/excluir_marca_fornecedor',compact('marca'));
    }

     public function deletarMarcaFornecedor($id){
        $this->fornecedor_marca->ExcluirMarca($id);
        return redirect('listar_marca_fornecedor');
    }

    public function atualizarMarcaFornecedor($id,request $request){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->validate($request,[
            'nome'=>'required|max:80',
            ]
        );
        $this->fornecedor_marca->AtualizarMarca($id,['nome'=>$request->input('nome')]);
        return redirect('listar_marca_fornecedor')->with('mensagem_sucesso','Atualizado com sucesso');
        }
        $marca = $this->fornecedor_marca->MarcaId($id);
        return view('admin/fornecedor/atualizar_marca_fornecedor',compact('marca'));
    }

    public function fornecedorid($id){
        $fornecedor = $this->fornecedor->FornecedorId($id);
        return view('admin/fornecedor/excluir_fornecedor',compact('fornecedor'));
    }

    public function CadastroFornecedorForm(){
        $marca = $this->fornecedor_marca->ListarMarca();
        return view('admin/fornecedor/cadastro_fornecedor',compact('marca'));
    }

    public function ListarFornecedor(){
        $fornecedor = $this->fornecedor->ListarFornecedor();
        return view('admin/fornecedor/listar_fornecedores',compact('fornecedor'));
    }

    public function AtualizarFornecedor($id,request $request){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          $this->validate($request, [
          'nome_fornecedor' => 'required|filled|max:80',
          'id_marca_fornecedor' => 'required|filled|max:80',
          'telefone' => 'required|filled|numeric|digits_between:10,11',
          ]
        );
        $this->fornecedor->AtualizarFornecedor($request->id,[
            'nome_fornecedor'           =>$request->input('nome_fornecedor'),
            'id_marca_fornecedor'       =>$request->input('id_marca_fornecedor'),
            'telefone'                  =>$request->input('telefone')
        ]);
        return redirect('listar_fornecedor')->with('mensagem_sucesso','Atualizado com sucesso');
        }
        $marca      = $this->fornecedor_marca->ListarMarca();
        $fornecedor = $this->fornecedor->FornecedorId($id);
        return view('admin/fornecedor/atualizar_fornecedor',compact('fornecedor','marca'));
    }

    public function ExcluirFornecedor($id){
        $this->fornecedor->ExcluirFornecedor($id);
        return redirect('listar_fornecedor')->with('mensagem_sucesso','Excluido com sucesso');
    }

    public function CadastrarFornecedor(request $request){
           $this->validate($request, [
          'nome_fornecedor' => 'required|filled|max:80',
          'id_marca_fornecedor' => 'required|filled|max:80',
          'telefone' => 'required|filled|numeric|digits_between:10,11',
          ]
        );
        $this->fornecedor->CadastrarFornecedor($request->all());
        return redirect('listar_fornecedor')->with('mensagem_sucesso','Cadastrado com sucesso');
    }
}