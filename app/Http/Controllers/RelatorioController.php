<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pedido;

use App\User;

use DB;

class RelatorioController extends Controller{

	public function FinanceiroForm(){
        return view('salao_views/financeiro_form');
    }

    public function CalcularLucro(request $request){
        $this->validate($request,[
            'data'=>'required|date_format:d/m/Y',
            'data2'=>'required|date_format:d/m/Y',
            ]
        );
        $data = $_REQUEST['data'];
        $data2 = $_REQUEST['data2'];

        $consulta = DB::table('pedido')->where('data_agendamento','>=',$data)
        ->where('data_agendamento','<=',$data2)->where('pago','=',TRUE)->sum('total');

        $agendamento = DB::table('pedido')->where('data_agendamento','>=',$data)
        ->where('data_agendamento','<=',$data2)->where('pago','=',TRUE)->orderBy('data_agendamento')->paginate(6);

        $cliente = User::orderBy('name')->get();
            return view('salao_views/resultado_lucro',['consulta'=>$consulta,'cliente'=>$cliente,'agendamento'=>$agendamento]);

    }

    public function CalculoLucroDoDia(){
        $data = \Carbon\Carbon::today();
        $hoje = $data->toDateString();
        $formato_data = \Carbon\Carbon::parse($hoje)->format('d/m/Y');

        $consulta = DB::table('pedido')->where('data_agendamento',$formato_data)->where('pago',TRUE)->sum('total');
        $agendamento = Pedido::where('data_agendamento',$formato_data)->where('pago',TRUE)->get();
        $cliente = User::orderBy('name')->get();

        return view('salao_views/lucro_do_dia',compact('consulta','agendamento','cliente'));
    }

}