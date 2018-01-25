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

class ClienteController extends Controller{

	public function ClientePainel(){
        return view('salao_views/cliente_painel');
    }

    public function ClientePedidos(){
        $id = \Session::get('id');//pego o id do cliente que esta logado na sessão
        $pedido = Pedido::where('id',$id)->orderBy('data_agendamento')->paginate(10);//consulta para poder listar somente os agendamentos do cliente logado
        return view('salao_views/cliente_pedidos',['pedido'=>$pedido]);//retorno a pagina com o array dos agendamentos,compact('pedido')
    }

    public function ClientePedidosDetalhes($id){
        $servico = Servico::orderBy('id_servico')->get();
        $pedido = Pedido::find($id);
        if($pedido->id != \Session::get('id')){
            \Session::flash('erro','teste');
            return redirect('pedidos');
        }else{
        return view('salao_views/detalhes_pedido',compact('pedido','servico'));
        }
    }

    public function ClienteDados(){
        return view('salao_views/cliente_dados');
    }

    public function ClienteDadosEditar(){
        return view('salao_views/cliente_dados_alterar');
    }

    public function AtualizarClienteForm($id){
        $cliente = User::find($id);
        return view('salao_views/cliente_dados_alterar',compact('cliente'));
    }

    public function AtualizandoClienteInfos(request $request){
                $this->validate($request, [
            'id'=> 'required',
            'name' => 'required|max:80',
            'sobrenome' => 'required|max:80',
            'telefone_residencial' => 'required|numeric|digits_between:10,11',
            'telefone_celular' => 'required|numeric|digits_between:10,11',
            'endereco' => 'required|max:255|min:10',]
            );
        $cliente = User::find($_REQUEST['id']);
        $cliente->name = $_REQUEST['name'];
        $cliente->sobrenome = $_REQUEST['sobrenome'];
        $cliente->telefone_residencial = $_REQUEST['telefone_residencial'];
        $cliente->telefone_celular = $_REQUEST['telefone_celular'];
        $cliente->endereco = $_REQUEST['endereco'];
        $nome_cliente = Session::get('nome_cliente'); 
        $sobrenome = Session::get('sobrenome'); 
        $telefone_residencial = Session::get('telefone_residencial'); 
        $telefone_celular = Session::get('telefone_celular'); 
        $endereco = Session::get('endereco');
        $nome_cliente =  $_REQUEST['name'];
        $sobrenome = $_REQUEST['sobrenome'];
        $telefone_residencial = $_REQUEST['telefone_residencial'];
        $telefone_celular = $_REQUEST['telefone_celular'];
        $endereco = $_REQUEST['endereco'];
        $cliente->save();
        Session::put('nome_cliente', $nome_cliente);
        Session::put('sobrenome', $sobrenome);
        Session::put('telefone_residencial', $telefone_residencial);
        Session::put('telefone_celular', $telefone_celular);
        Session::put('endereco', $endereco);
       return redirect('cliente_dados')->with('mensagem_sucesso','atualizado com sucesso');
    }


    public function AutenticandoCliente(request $request){
    $this->validate($request, [
        'email_login' => 'required|max:80|min:6',
        'password' => 'required|max:80|min:6',
        ]
    );

    $model = User::where('email', '=', $_REQUEST['email_login'])
    ->where('password', '=', md5($_REQUEST['password']))->count();
    \Session::put('cliente',$model);
          
    if($model == 1){
            
    $dados = User::where('email',$_REQUEST['email_login'])->first();

    \Session::put('nome_cliente',$dados->name);
    \Session::put('sobrenome',$dados->sobrenome);
    \Session::put('email',$dados->email);
    \Session::put('telefone_residencial',$dados->telefone_residencial);
    \Session::put('telefone_celular',$dados->telefone_celular);
    \Session::put('endereco',$dados->endereco);
    \Session::put('id',$dados->id);

    if(\Session::has('next-url')) {
        $url=\Session::get('next-url');
        \Session::forget('next-url');
    return redirect($url);
    }
    return redirect('cliente_painel')->with("mensagens-sucesso",'Seja Bem vindo(a) ao seu painel :)');
    }else{
    return redirect('cadastro_login')->with("mensagens-sucesso",'Login ou senha incorretos,tente novamente.');
    }
  }

  public function logout_cliente(){
        Session::forget('cliente');
    return redirect('index');
  }

  public function cadastrar(request $request){
        $this->validate($request, [
            'nome' => 'required|max:80',
            'sobrenome' => 'required|max:80',
            'email' => 'required|email|max:255|unique:users',
            'senha' => 'required|min:6',
            'telefone_residencial' => 'required|numeric|digits_between:10,11',
            'telefone_celular' => 'required|numeric|min:11',
            'endereco' => 'required|max:255|min:10',]
            );
        $user = new User();
        $user->name = $_REQUEST['nome'];
        $user->sobrenome = $_REQUEST['sobrenome'];
        $user->email = $_REQUEST['email'];
        $user->password = md5($_REQUEST['senha']);
        $user->telefone_residencial = $_REQUEST['telefone_residencial'];
        $user->telefone_celular = $_REQUEST['telefone_celular'];
        $user->endereco = $_REQUEST['endereco'];
        $user->save();      
        return redirect('cadastro_login')->with('mensagens-sucesso','Cadastrado com sucesso! faça o login :)');
    }

}