<?php
/*
Route::get('testebanco',function()
{

$vinho = DB::table('servico')->get();
print_r($vinho);

});
*/
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function (){
 /*ROTAS DE IMAGEM,ADICIONAR ITEM NO CARRINHO,ESVAZIAR CARRINHO ORIGINAIS
  DO PROJETO SHOPPVEL*/
    Route::get('imagem/arquivo/{nome}', [
        'as' => 'imagem.file',
        'uses' => 'ImagemController@getImagemFile'
    ]);
    Route::any('carrinho/adicionar/{id}', [
        'as' => 'carrinho.adicionar',
        'uses' => 'CarrinhoController@anyAdicionar'
    ]);
    Route::get('carrinho/esvaziar', [
        'as' => 'carrinho.esvaziar',
        'uses' => 'CarrinhoController@getEsvaziar'
    ]);
});
    Route::post('cadastrar_usuario',[
        'as'=>'cadastrar.usuario',
        'uses'=>'ClienteController@cadastrar'
    ]);
    Route::post('LogIn',[
        'as'=>'login',
        'uses'=>'Auth\AuthController@postLoginAdmin'
    ]);
    Route::post('login_cliente',[
        'as'=>'login.cliente',
        'uses'=>'Auth\AuthController@postLogin'
    ]);
    Route::get('logout',[
        'as'=>'logout',
        'uses'=>'IndexController@Logout'
    ]);
    Route::get('servico_id/{id}',[
        'as'=>'servico',
        'uses'=>'ServicoController@servicoid'
    ]);
    Route::get('produto_id/{id}',[
        'as'=>'produto',
        'uses'=>'ProdutoController@produtoid'
    ]);
    Route::get('fornecedor_id/{id}',[
        'as'=>'fornecedor.id',
        'uses'=>'FornecedorController@fornecedorid'
    ]);
    Route::get('cliente_id/{id}',[
        'as'=>'cliente',
        'uses'=>'AdminController@clienteid'
    ]);
    Route::get('atualizarcliente_form/{id}',[
        'as'=>'atualizar.cliente.form',
        'uses'=>'ClienteController@AtualizarClienteForm'
    ]);
    Route::post('atualizandoclientedados',[
        'as'=>'atualizando.cliente.dados',
        'uses'=>'ClienteController@AtualizandoClienteInfos'
    ]);
    Route::get('index',[
        'as'=>'index',
        'uses'=>'IndexController@Index'
    ]);
    Route::get('servicos',[
        'as'=>'servicos',
        'uses'=>'ServicoController@ListarServicos'
    ]);
    Route::get('detalhes/{id}',[
        'as'=>'detalhes',
        'uses'=>'ServicoController@ServicoDetalhes'
    ]);
    Route::get('carrinho',[
        'as'=>'carrinho',
        'uses'=>'CarrinhoController@getListar'
    ]);
    Route::get('cadastro_login',[
        'as'=>'cadastro.login',
        'uses'=>'IndexController@CadastroLoginForms'
    ]);
    Route::get('contato',[
        'as'=>'contato',
        'uses'=>'IndexController@ContatoView'
    ]);
    Route::get('salao',[
        'as'=>'salao',
        'uses'=>'AdminController@AdminForm'
    ]);
    Route::post('autenticando_cliente',[
        'as'=>'autenticando.cliente',
        'uses'=>'ClienteController@AutenticandoCliente'
    ]);
    Route::get('sair_cliente',[
        'as'=>'sair.cliente',
        'uses'=>'ClienteController@logout_cliente'
    ]);
Route::group(['middleware'=>'App\Http\Middleware\Cliente'], function(){

    Route::get('cliente_painel',[
        'as'=>'cliente.painel',
        'uses'=>'ClienteController@ClientePainel'
    ]);
    Route::get('pedidos',[
        'as'=>'pedidos',
        'uses'=>'ClienteController@ClientePedidos'
    ]);
    Route::get('pedido_detalhes/{id}',[
        'as'=>'pedido.detalhes',
        'uses'=>'ClienteController@ClientePedidosDetalhes'
    ]);
    Route::get('cliente_dados',[
        'as'=>'cliente.dados',
        'uses'=>'ClienteController@ClienteDados'
    ]);
    Route::get('cliente_dados_alterar',[
        'as'=>'cliente.dados.alterar',
        'uses'=>'ClienteController@ClienteDadosEditar'
    ]);
    /* ROTA ONDE MONTA O ARRAY COM TODOS OS ITENS DO CARRINHO ANTES DE FINALIZAR O PEDIDO
    ,ORIGINAL DO PROJETO SHOPPVEL*/
    Route::any('carrinho/finalizar-compra', [
     'as' => 'carrinho.finalizar-compra',
    'uses' => 'CarrinhoController@getFinalizarCompra'
    ]);
    /*ROTA DE GERAR O AGENDAMENTO EDITADA POR GUILHERME ARAUJO E ADRIANO KAPP*/
    Route::post('gerar_pedido', [
        'as' => 'gerar.pedido',
        'uses' => 'PedidoController@GerarPedido'
    ]);
    Route::post('gerar_pedido_espera', [
        'as' => 'gerar.pedido.espera',
        'uses' => 'PedidoController@GerarPedidoEspera'
    ]);

});
    Route::post('autenticando',[
        'as'=>'autenticando',
        'uses'=>'AdminController@Autenticando'
    ]);
    Route::get('sair',[
        'as'=>'sair',
        'uses'=>'AdminController@logout_admin'
    ]);
Route::group(['middleware'=>'App\Http\Middleware\Admin'], function(){

    Route::get('pesquisar_data',[
        'as'=>'pesquisar.data',
        'uses'=>'RelatorioController@CalcularLucro'
    ]);
    Route::get('faturamento_diario',[
        'as'=>'faturamento',
        'uses'=>'RelatorioController@CalculoLucroDoDia'
    ]);
    Route::get('pesquisar',[
        'as'=>'pesquisar',
        'uses'=>'PedidoController@PesquisarDataAgendamento'
    ]);
    Route::get('cadastro_marca_fornecedor',[
        'as'=>'cadastro.marca.fornecedor.form',
        'uses'=>'FornecedorController@FormMarcaFornecedor'
    ]);
    Route::get('listar_marca_fornecedor',[
        'as'=>'listar.marca.fornecedor',
        'uses'=>'FornecedorController@ListarMarcasFornecedor'
    
    ]);
    Route::post('cadastrando_marca_fornecedor',[
        'as'=>'cadastro.marca.fornecedor',
        'uses'=>'FornecedorController@CadastrarMarcaFornecedor'
    ]);
    Route::get('excluir_marca_fornecedor/{id}',[
        'as'=>'excluir.marca.fornecedor',
        'uses'=>'FornecedorController@deleteMarcaFornecedor'
    ]);
    Route::get('deletar_marca_fornecedor/{id}',[
        'as'=>'deletar.marca.fornecedor',
        'uses'=>'FornecedorController@deletarMarcaFornecedor'
    ]);
    Route::any('atualizar_marca_fornecedor/{id}',[
        'as'=>'atualizar.marca.fornecedor',
        'uses'=>'FornecedorController@atualizarMarcaFornecedor'
    ]);
    Route::post('atualizando_marca_fornecedor',[
        'as'=>'atualizando.marca.fornecedor',
        'uses'=>'FornecedorController@AtualizandoMarcaFornecedor'
    ]);
    Route::get('admin_painel',[
        'as'=>'admin.painel',
        'uses'=>'AdminController@AdminPainel'
    ]);
    Route::get('listar_agendamentos',[
        'as'=>'listar.agendamentos',
        'uses'=>'PedidoController@ListarAgendamentos'
    ]);
    Route::get('listar_produto',[
        'as'=>'listar.produto',
        'uses'=>'ProdutoController@ListarProduto'
    ]);
    Route::get('financeiro_form',[
        'as'=>'financeiro.form',
        'uses'=>'RelatorioController@FinanceiroForm'
    ]);
    Route::get('cadastro_fornecedor',[
        'as'=>'cadastro.fornecedor',
        'uses'=>'FornecedorController@CadastroFornecedorForm'
    ]);
    Route::any('cadastro_servico',[
        'as'=>'cadastro.servico',
        'uses'=>'ServicoController@CadastroServico'
    ]);
    Route::get('listar_clientes',[
        'as'=>'listar.cliente',
        'uses'=>'AdminController@ListarClientes'
    ]);
    Route::get('pedidos_pagos',[
        'as'=>'pedidos.pagos',
        'uses'=>'PedidoController@PedidosPagos'
    ]);
    Route::get('pedidos_pagos_naopagos',[
        'as'=>'pedidos.pagos.naopagos',
        'uses'=>'PedidoController@PedidosNaoPagos'
    ]);
	Route::any('cadastro_produto',[
		'as'=>'cadastro.produto',
		'uses'=>'ProdutoController@CadastroProduto'
	]);
	Route::any('atualizar_produto/{id}',[
		'as'=>'atualizar.produto',
		'uses'=>'ProdutoController@AtualizarProduto'
	]);
	Route::get('listar_fornecedor',[
		'as'=>'listar.fornecedor',
		'uses'=>'FornecedorController@ListarFornecedor'
	]);
	Route::any('atualizar_fornecedor/{id}',[
		'as'=>'atualizar.fornecedor',
		'uses'=>'FornecedorController@AtualizarFornecedor'
	]);
	Route::get('listar_servicos_admin',[
		'as'=>'listar.servicos.admin',
		'uses'=>'ServicoController@ListarServicoAdmin'
	]);
	Route::any('atualizar_servico/{id}',[
		'as'=>'atualizar.servico',
		'uses'=>'ServicoController@AtualizarServico'
	]);
	Route::get('deletar_servico/{id}',[
		'as'=>'deletar.servico',
		'uses'=>'ServicoController@DeletarServico'
	]);
    Route::get('deletar_imagem/{id}',[
        'as'=>'deletar.imagem',
        'uses'=>'ServicoController@DeletarImagem'
    ]);
	Route::get('atualizar_cliente_admin/{id}',[
		'as'=>'atualizar.cliente.admin',
		'uses'=>'AdminController@AtualizarClienteAdmin'
	]);
	Route::post('atualizando_cliente_admin',[
		'as'=>'atualizando.cliente.admin',
		'uses'=>'AdminController@atualizandoCliente'
	]);
	Route::get('detalhes/pedidos/admin/{id}',[
		'as'=>'detalhes.pedidos.admin',
		'uses'=>'PedidoController@ClientePedidosDetalhesAdmin'
	]);
	Route::post('cadastrar_fornecedor',[
		'as'=>'cadastrar.fornecedor',
		'uses'=>'FornecedorController@CadastrarFornecedor'
	]);
	Route::post('atualizar_fornecedor_dados',[
		'as'=>'atualizar.fornecedor.dados',
		'uses'=>'FornecedorController@AtualizarFornecedorDados'
	]);
	Route::get('excluir_fornecedor/{id}',[
		'as'=>'excluir.fornecedor',
		'uses'=>'FornecedorController@ExcluirFornecedor'
	]);
	Route::post('atualizar_produto',[
		'as'=>'atualizar.produto',
		'uses'=>'ProdutoController@AtualizarProdutoDados'
	]);
	Route::get('detalhes_fornecedor/{id}',[
		'as'=>'detalhes.fornecedor',
		'uses'=>'ProdutoController@FornecedorDetalhes'
	]);
	Route::get('excluir_produto/{id}',[
		'as'=>'excluir.produto',
		'uses'=>'ProdutoController@ExcluirProduto'
	]);
	Route::get('excluir_cliente/{id}',[
		'as'=>'excluir.cliente',
		'uses'=>'AdminController@ExcluirCliente'
	]);
	Route::get('cliente_agendamentos/{id}',[
		'as'=> 'cliente.agendamentos',
		'uses'=>'AdminController@ClienteAgendamentos'
	]);
	Route::put('baixar_pedido/{id}',[
		'as'=>'baixar.pedido',
		'uses'=>'PedidoController@baixarPedido'
	]);
	Route::post('cadastrar_servico',[
		'as'=>'cadastrar.servico',
		'uses'=>'ServicoController@CadastrarServico'
	]);
	Route::get('agendamentos_espera',[
		'as'=>'agendamentos.espera',
		'uses'=>'PedidoController@ListarAgendamentosEmEspera'
	]);
	Route::get('reagendar/{id}',[
		'as'=>'reagendar',
		'uses'=>'PedidoController@Reagendar'
	]);
	Route::post('confirmar_reagendamento',[
		'as'=>'confirmar.reagendamento',
		'uses'=>'PedidoController@ReagendarAgendamento'
	]);
	Route::put('confirmar_agendamento/{id}',[
		'as'=>'confirmar.agendamento',
		'uses'=>'PedidoController@ConfirmarAgendamento'
	]);
	Route::get('pesquisa_lista_espera_cliente',[
		'as'=>'pesquisa.lista.espera.cliente',
		'uses'=>'PedidoController@PesquisarDataAgendamentoEmEspera'
	]);
	Route::get('pesquisar_clientes_horario_confirmado',[
		'as'=>'pesquisar.cliente.horario.confirmado',
		'uses'=>'PedidoController@pesquisarAgendamentosConfirmados'
	]);
	Route::get('cancelar_agendamento/{id}',[
		'as'=>'cancelar.agendamento',
		'uses'=>'PedidoController@CancelarAgendamento'
	]);
	Route::get('cancelar/{id}',[
		'as'=>'cancelar',
		'uses'=>'PedidoController@getAgendamentoId'
	]);
	Route::get('agendamentos_cancelados',[
		'as'=>'agendamentos.cancelados',
		'uses'=>'PedidoController@ListarAgendamentosCancelados'
	]);
	Route::get('pesquisar_agendamentos_cancelados',[
		'as'=>'pesquisar.agendamentos.cancelados',
		'uses'=>'PedidoController@PesquisarAgendamentosCancelados'
	]);
});

