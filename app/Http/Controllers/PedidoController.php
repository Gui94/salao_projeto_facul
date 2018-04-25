<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Carrinho;
use App\Servico;
use App\Venda;
use App\Pedido;
use App\VendaItem;
use App\ItemPedido;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\EventModel;
use MaddHatter\LaravelFullcalendar\Event;
use Session;

class PedidoController extends Controller {
    /*
    CONTROLLER DE PEDIDO DESENVOLVIDO PELO PROFESSOR ADEMIR MAZER JR,UTILIZADO NO PROJETO SHOPPVEL,
    EDITADO POR GUILHERME ARAUJO E ADRIANO KAPP
    ESTE CONTROLLER É RESPONSAVEL POR GERAR O AGENDAMENTO.
    */

    private $carrinho = null;

    function __construct() {
        $this->carrinho = new Carrinho();
    }
    
    public function GerarPedido(Request $request) {
        $data = \Carbon\Carbon::yesterday();
        //$ontem = $data->toDateString();
        $formato = \Carbon\Carbon::parse($data)->format('Y/m/d');
        $pedido = new Pedido();
        $pedido->id = Session::get('id');
        $pedido->data_agendamento =  $_REQUEST['data_agendamento'];
        $pedido->horario = $_REQUEST['horario_inicio'];
        $pedido->total = $this->carrinho->getTotal();
        $pedido->pago = false;
        $pedido->formas_pagamento = 'tratar no local';
        $consulta = Pedido::where('data_agendamento',$pedido->data_agendamento )->where('horario',$pedido->horario)->where('confirmacao',TRUE)->count();
        if($pedido->data_agendamento <= $formato){
            \Session::flash('agendamento','error');
            return redirect('carrinho');
        }elseif($consulta >= 1){
            \Session::flash('espera','error_espera');
            Session::put('data',$pedido->data_agendamento);
            Session::put('horario',$pedido->horario);
            return redirect('carrinho');
        }else{
            $pedido->confirmacao = TRUE;
            $pedido->lista_espera = FALSE;
            $pedido->cancelado = FALSE;
            $pedido->save();
        foreach ($this->carrinho->getItens() as $idx => $itemCarrinho) {
            $itemVenda = new ItemPedido();
            $itemVenda->quant_pessoa = $itemCarrinho->qtde;
            $itemVenda->valor_unitario = $itemCarrinho->servico->preco;
            $itemVenda->id_servico= $itemCarrinho->servico->id_servico;
            $pedido->itens()->save($itemVenda);
        }
        $this->carrinho->esvaziar();
        return redirect('cliente_painel')->with('mensagens-sucesso', 'Agendamento realizado com sucesso,seu horario ja esta confirmado :)');   
        }
    }

    public function GerarPedidoEspera(Request $request) {
        $data = \Carbon\Carbon::yesterday();
        //$ontem = $data->toDateString();
        $formato = \Carbon\Carbon::parse($data)->format('Y/m/d');
        $pedido = new Pedido();
        $pedido->id = Session::get('id');
        $pedido->data_agendamento =  Session::get('data');
        $pedido->horario = Session::get('horario');
        $pedido->total = $this->carrinho->getTotal();
        $pedido->pago = false;
        $pedido->formas_pagamento = 'tratar no local';
        if($pedido->data_agendamento <= $formato){
            \Session::flash('agendamento','error');
            return redirect('carrinho');
        }else{
        $pedido->lista_espera = TRUE;
        $pedido->confirmacao = FALSE;
        $pedido->cancelado = FALSE;
        $pedido->save();
        foreach ($this->carrinho->getItens() as $idx => $itemCarrinho) {
            $itemVenda = new ItemPedido();
            $itemVenda->quant_pessoa = $itemCarrinho->qtde;
            $itemVenda->valor_unitario = $itemCarrinho->servico->preco;
            $itemVenda->id_servico= $itemCarrinho->servico->id_servico;
            $pedido->itens()->save($itemVenda);
        }
        $this->carrinho->esvaziar();
        return redirect('cliente_painel')->with('mensagens-sucesso', 'Seu Agendamento foi gerado,porem,voce esta na lista de espera para confirmação do horario,qualquer duvida entre em contato no numero:(42)9837-4046  :)');   
        }
    }

    public function baixarPedido(request $request,$id){
        $pedido = Pedido::find($id);
        $pedido->pago = TRUE;
        $pedido->save();
     return redirect('pedidos_pagos_naopagos')->with('mensagens_sucesso', 'Agendamento Baixado');   
    }

    public function PesquisarAgendamentosCancelados(request $request){
        $pesquisa = $_REQUEST['clientes'];
        $agendamento = Pedido::where('cancelado',TRUE)->where('id',$pesquisa)->orderBy('data_agendamento')->get();
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/lista_espera_cliente',compact('cliente','agendamento'));
    }

    public function ListarAgendamentosCancelados(){
        $pedido = Pedido::where('cancelado',TRUE)->orderBy('data_agendamento')->paginate(6);
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/listar_agendamentos_cancelados',compact('pedido','cliente'));
    }

    public function CancelarAgendamento($id){
        $agendamento = Pedido::find($id);
        $agendamento->lista_espera = FALSE;
        $agendamento->confirmacao = FALSE;
        $agendamento->cancelado = TRUE;
        $agendamento->save();
        return redirect('listar_agendamentos')->with('mensagens-sucesso','agendamento cancelado com sucesso');
    }

    public function getAgendamentoId($id){
        $agendamento = Pedido::find($id);
        return view('admin/agendamento/cancelar_agendamento',compact('agendamento'));
    }

    public function pesquisarAgendamentosConfirmados(request $request){
        $this->validate($request,[
            'pesquisa_data'=>'required|date_format:d/m/Y',
        ]
        );
        $pesquisa = $_REQUEST['pesquisa_data'];
        $agendamento = Pedido::where('data_agendamento',$pesquisa)->where('confirmacao',TRUE)->get();
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/lista_espera_cliente',compact('cliente','agendamento'));
    }

    public function PesquisarDataAgendamentoEmEspera(request $request){
        $pesquisa = $_REQUEST['clientes'];
        $agendamento = Pedido::where('lista_espera',TRUE)->where('id',$pesquisa)->orderBy('data_agendamento')->get();
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/lista_espera_cliente',compact('cliente','agendamento'));
    }

    public function ConfirmarAgendamento(request $request,$id){
        $agendamento = Pedido::find($id);
        $agendamento->confirmacao = TRUE;
        $agendamento->contato = TRUE;
        $agendamento->lista_espera = FALSE;
        $consulta = Pedido::where('data_agendamento',$agendamento->data_agendamento)->where('horario',$agendamento->horario)->where('id_pedido',$agendamento->id_pedido)->count();
        if($consulta >= 1){
            return redirect('agendamentos_espera')->with('mensagens-sucesso','Ja foi confirmado nesta hora e data,por favor faça o Reagendamento');
        }else{
        $agendamento->save();
        return redirect('agendamentos_espera')->with('mensagens-sucesso','Agendamento Confirmado');
        }
    }

    public function ReagendarAgendamento(request $request){
        $this->validate($request,[
            'data_agendamento'=>'required|date_format:Y/m/d',
            'hora'=>'required',
            ]
        );
        $data = \Carbon\Carbon::yesterday();
        $formato_data = \Carbon\Carbon::parse($data)->format('Y/m/d');
        $agendamento = Pedido::find($_REQUEST['id']);
        $id = $agendamento->id_pedido;
        $agendamento->data_agendamento = $_REQUEST['data_agendamento'];
        $agendamento->horario = $_REQUEST['hora'];
        $agendamento->confirmacao = TRUE;
        $agendamento->lista_espera = FALSE;
        $consulta = Pedido::where('data_agendamento',$agendamento->data_agendamento)->where('horario',$agendamento->horario)->where('id_pedido',$id)->count();
        if($agendamento->data_agendamento <= $formato_data){
            return redirect('reagendar/'.$id)->with('mensagens-sucesso','Não é possivel agendar com uma data inferior a de hoje,por favor selecione outra data');
        }elseif($consulta >= 1){
        return redirect('reagendar/'.$id)->with('mensagens-sucesso','Ja foi confirmado nesta hora e data,por favor selecione outro horario ou data');
        }else{
        $agendamento->save();
        return redirect('agendamentos_espera')->with('mensagens-sucesso','Reagendamento Confirmado');
        }
    }

    public function Reagendar($id){
        $agendamento = Pedido::find($id);
        return view('admin/agendamento/reagendar',compact('agendamento'));
    }

    public function ListarAgendamentosEmEspera(){
        $data = \Carbon\Carbon::today();
        $formato_data = \Carbon\Carbon::parse($data)->format('d/m/Y');
        $agendamento = Pedido::orderBy('data_agendamento')->where('data_agendamento','=',$formato_data)->where('lista_espera',TRUE)->get();
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/listar_agendamentos_espera',compact('agendamento','cliente','consulta'));
    }

    public function PesquisarDataAgendamento(request $request){
        $this->validate($request,[
            'pesquisa_agendamento'=>'required|date_format:d/m/Y',
            ]
        );

        $pesquisa = $_REQUEST['pesquisa_agendamento'];

        $agendamento = Pedido::where('data_agendamento',$pesquisa)->paginate(6);
        return view('admin/agendamento/resultado_pesquisa_agendamento',['agendamento'=>$agendamento]);
    }

    public function ClientePedidosDetalhesAdmin($id){
        $servico = Servico::orderBy('id_servico')->get();
        $pedido = Pedido::find($id);
        return view('admin/agendamento/detalhes_agendamento_admin',compact('servico','pedido'));
    }

    public function PedidosPagos(){
        $pedido = Pedido::where('pago',true)->orderBy('data_agendamento')->paginate(6);
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/listar_pedidos_pagos_nao_pagos',compact('pedido','cliente'));
    }

    public function PedidosNaoPagos(){
        $pedido =  Pedido::where('pago',false)->orderBy('data_agendamento')->paginate(6);
        $cliente = User::orderBy('name')->get();
        return view('admin/agendamento/listar_pedidos_pagos_nao_pagos',compact('pedido','cliente'));
    }

    public function ListarAgendamentos(){
        $data_hoje = \Carbon\Carbon::today();
        $hoje = $data_hoje->toDateString();
        $consulta = Pedido::where('lista_espera',TRUE)->where('data_agendamento',$hoje)->count();
        $agendamento = Pedido::where('data_agendamento',$hoje)->paginate(2);
        $cliente = User::orderBy('name')->get();
        $data_de_hoje['hoje'] = $hoje;
        return view('admin/agendamento/listar_agendamentos',['agendamento'=>$agendamento,'cliente'=>$cliente,'consulta'=>$consulta],$data_de_hoje);
    }
}
