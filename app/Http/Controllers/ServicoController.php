<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Servico;

class ServicoController extends Controller{
  private $servico     = null;
  private $img_arquivo = null;

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

    public function AtualizarServico($id,request $request){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          $this->validate($request, [
          'nome_servico' => 'required|filled|max:80',
          'preco' => 'required|numeric|',
          'descricao' => 'required|filled|max:255',
          'imagem' => 'required',
          'preco_desconto' => 'required|numeric',
          'promocao'=>'required',
          ]
        );
        $servico     = $this->servico->getId($id);
        $imagem_nome = $this->servico->getimagem($id);
        
        if($servico->imagem != ''){
           $this->servico->servicoatualizar($id,[
          'nome_servico'   => $request->input('nome_servico'),
          'preco'          => $request->input('preco'),
          'descricao'      => $request->input('descricao'),
          'imagem'         => $imagem_nome->imagem,
          'preco_desconto' => $request->input('preco_desconto') ,
          'promocao'       => $request->input('promocao')
        ]);
        }else{
          $this->imageupload($request);
          $this->servico->servicoatualizar($id,[
          'nome_servico'   => $request->input('nome_servico'),
          'preco'          => $request->input('preco'),
          'descricao'      => $request->input('descricao'),
          'imagem'         => $this->img_arquivo,
          'preco_desconto' => $request->input('preco_desconto') ,
          'promocao'       => $request->input('promocao')
        ]);
        }

        return redirect('listar_servicos_admin')->with('mensagem_sucesso','Atualizado com sucesso');
        }
        $servico = $this->servico->getId($id);
        return view('admin/servico/atualizar_servico',compact('servico'));
    }

    public function DeletarServico($id){
        $this->servico->servicodelete($id);
        return redirect('listar_servicos_admin')->with('mensagem_sucesso','Excluido com sucesso');
    }

    public function servicoid($id){
        $servico = $this->servico->getId($id);
        return view('admin/servico/excluir_servico',compact('servico'));
    }

    public function CadastroServico(request $request){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $this->validate($request, [
          'nome_servico' => 'required|filled|max:80',
          'preco' => 'required|numeric|',
          'descricao' => 'required|filled|max:255',
          'imagem' => 'required',
          'preco_desconto' => 'required|numeric',
          'promocao'=>'required',
          ]
        );
        $this->imageupload($request);
        $this->servico->servicoinsert([
          'nome_servico'   => $request->input('nome_servico'),
          'preco'          => $request->input('preco'),
          'descricao'      => $request->input('descricao'),
          'imagem'         => $this->img_arquivo,
          'preco_desconto' => $request->input('preco_desconto') ,
          'promocao'       => $request->input('promocao')
        ]);
        return redirect('listar_servicos_admin')->with('mensagem_sucesso','Cadastrado com sucesso');
      }
      return view('admin/servico/cadastrar_servico');
      
    }

    public function DeletarImagem($id){
      $this->servico->deleteimagem($id);
      return redirect('atualizar_servico/'.$id)->with('mensagem_sucesso','Imagem Excluida com sucesso');
    }

    public function imageupload(request $request){
        $caminho = 'imagens_servicos';
        $imagem  = $request->file('imagem');
        $formato = $imagem->getClientOriginalExtension();
        $this->img_arquivo = rand(23232,23649).'.'.$formato;
        $request->file('imagem')->move($caminho,$this->img_arquivo);
    }



}