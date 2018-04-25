<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Servico;

class ServicoController extends Controller{

  private $servico = null;

    function __construct() {
        
        $this->servico = new Servico();
    }

	public function ListarServicos(){
        $listar = $this->servico->listar();
    	return view('cliente/listar_servicos',compact('listar'));
    }

    public function ServicoDetalhes($id){
        $servico =  $this->servico->getId($id);
        return view('cliente/detalhes_servico',compact('servico'));
    }
    public function ListarServicoAdmin(){
        $servico = $this->servico->listar();
        return view('admin/servico/listar_servicos',compact('servico'));
    }

    public function AtualizarServico($id){
        $servico = $this->servico->getId($id);
        return view('admin/servico/atualizar_servico',compact('servico'));
    }

    public function AtualizandoServico(request $request){
          $this->validate($request, [
          'nome_servico' => 'required|filled|max:80',
          'preco' => 'required|numeric|',
          'descricao' => 'required|filled|max:255',
          'imagem_nome' => 'required',
          'preco_desconto' => 'required|numeric',
          'promocao'=>'required',
          ]
        );
        $servico = Servico::find($_REQUEST['id_servico']);
        $servico->nome_servico = $_REQUEST['nome_servico'];
        $servico->preco = $_REQUEST['preco'];
        $servico->descricao = $_REQUEST['descricao'];
        $servico->imagem = $_REQUEST['imagem_nome'];
        $servico->preco_desconto = $_REQUEST['preco_desconto'];
        $servico->promocao = $_REQUEST['promocao'];
        $request->session()->flash('alert-success', 'atualizado com sucesso');
        $servico->save();
        return redirect('listar_servicos_admin');
    }

    public function CadastrarServico(request $request){
            $this->validate($request, [
          'nome_servico' => 'required|filled|max:80',
          'preco' => 'required|numeric|',
          'descricao' => 'required|filled|max:255',
          'imagem' => 'required',
          'preco_desconto' => 'required|numeric',
          'promocao'=>'required',
          ]
        );
        $servico = new Servico();
        $servico->nome_servico = $_REQUEST['nome_servico'];
        $servico->preco = $_REQUEST['preco'];
        $servico->descricao = $_REQUEST['descricao'];
        $servico->imagem = $_REQUEST['imagem'];
        $servico->preco_desconto = $_REQUEST['preco_desconto'];
        $servico->promocao = $_REQUEST['promocao'];
        $request->session()->flash('alert-success', 'cadastrado com sucesso');
        $servico->save();
        return redirect('cadastro_servico');
    }

    public function DeletarServico($id){
        $servico = Servico::find($id);
        $servico->delete();
        return redirect('listar_servicos_admin');
    }

    public function servicoid($id){
        $servico = $this->servico->getId($id);
        return view('admin/servico/excluir_servico',compact('servico'));
    }

    public function CadastroServico(){
        return view('admin/servico/cadastrar_servico');
    }



}