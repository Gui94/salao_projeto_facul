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

use App\Admin;

class AdminController extends Controller{

	 public function AdminForm(){
        return view('admin/admin_form');
    }

    public function AdminPainel(){
        return view('admin/admin_painel');
    }

	public function ListarClientes(){
        $user = User::orderBy('name')->paginate(6);
        return view('admin/cliente/listar_clientes',compact('user'));
    }

    public function AtualizarClienteAdmin($id){
        $cliente = User::find($id);
        return view('admin/cliente/atualizar_cliente',compact('cliente'));
    }

    public function atualizandoCliente(request $request){
        $this->validate($request, [
            'id'=> 'required',
            'name' => 'required|max:80',
            'sobrenome' => 'required|max:80',
            'email' => 'required|email|max:255',
            'telefone_residencial' => 'required|numeric|digits_between:10,11',
            'telefone_celular' => 'required|numeric|min:11',
            'endereco' => 'required|max:255|min:10',]
            );
        $cliente = User::find($_REQUEST['id']);
        $cliente->name = $_REQUEST['name'];
        $cliente->sobrenome = $_REQUEST['sobrenome'];
        $cliente->email = $_REQUEST['email'];
        $cliente->telefone_residencial = $_REQUEST['telefone_residencial'];
        $cliente->telefone_celular = $_REQUEST['telefone_celular'];
        $cliente->endereco = $_REQUEST['endereco'];
        $cliente->save();
        return redirect('listar_clientes')->with('mensagem_sucesso','atualizado com sucesso');
    }

    public function clienteid($id){
        $cliente = User::find($id);
        return view('admin/cliente/excluir_cliente',compact('cliente'));

    }

    public function ExcluirCliente($id){
        $cliente = User::find($id);
        $cliente->delete();
        return redirect('listar_clientes');
    }

    public function ClienteAgendamentos($id){
        $cliente = User::find($id);
        $agendamento = Pedido::where('id',$id)->orderBy('data_agendamento')->paginate(6);
    return view('admin/cliente/listar_cliente_agendamentos',compact('agendamento'));
    }

    public function logout_admin(){
        Session::forget('admin');
        return redirect('salao');
    }

    public function Autenticando(request $request){
       $this->validate($request, [
            'email' => 'required|max:80|min:6',
            'password' => 'required|max:80|min:6',
        ]
    );

    $model = Admin::where('email', '=', $_REQUEST['email'])
        ->where('senha', '=', md5($_REQUEST['password']))->count();
      \Session::put('admin',$model);
      
    if($model == 1){   
    $dados = Admin::where('email',$_REQUEST['email'])->first();

    \Session::put('nome',$dados->nome);  
    }
    
    if (\Session::has('next-url')){
    	$url=\Session::get('next-url');
    	\Session::forget('next-url');
    	return redirect($url);
    }
    return redirect('admin_painel')->with('admin_login','bem vindo');
    }

}