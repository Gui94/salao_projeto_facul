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
    return view('welcome');
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
Route::group(['middleware' => ['web']], function () {

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


Route::post('cadastrar_usuario','ClienteController@cadastrar');

Route::post('LogIn','Auth\AuthController@postLoginAdmin');

Route::post('login_cliente','Auth\AuthController@postLogin');

Route::get('logout','IndexController@Logout');

Route::get('servico_id/{id}','ServicoController@servicoid');
Route::get('produto_id/{id}','ProdutoController@produtoid');
Route::get('fornecedor_id/{id}','FornecedorController@fornecedorid');
Route::get('cliente_id/{id}','AdminController@clienteid');
Route::get('atualizarcliente_form/{id}','ClienteController@AtualizarClienteForm');
Route::post('atualizandoclientedados','ClienteController@AtualizandoClienteInfos');

 Route::get('index','IndexController@Index');
 Route::get('servicos','ServicoController@ListarServicos');
 Route::get('detalhes/{id}','ServicoController@ServicoDetalhes');
 Route::post('pedido/{id}','IndexController@AddCarrinho');
 Route::get('carrinho','CarrinhoController@getListar');
 Route::get('realizar_pedido','IndexController@GerarPedido');
 Route::get('cadastro_login','IndexController@CadastroLoginForms');
 Route::get('contato','IndexController@ContatoView');
 Route::get('salao','AdminController@AdminForm');


Route::post('autenticando_cliente','ClienteController@AutenticandoCliente');
Route::get('sair_cliente','ClienteController@logout_cliente');

Route::group(['middleware'=>'App\Http\Middleware\Cliente'], function(){
Route::get('cliente_painel','ClienteController@ClientePainel');
Route::get('pedidos','ClienteController@ClientePedidos');
Route::get('pedido_detalhes/{id}','ClienteController@ClientePedidosDetalhes');
Route::get('cliente_dados','ClienteController@ClienteDados');
Route::get('cliente_dados_alterar','ClienteController@ClienteDadosEditar');
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

Route::post('autenticando','AdminController@Autenticando');
Route::get('sair','AdminController@logout_admin');

Route::group(['middleware'=>'App\Http\Middleware\Admin'], function(){

Route::get('pesquisar_data','RelatorioController@CalcularLucro');

Route::get('lucro_do_dia','RelatorioController@CalculoLucroDoDia');

Route::get('pesquisar','PedidoController@PesquisarDataAgendamento');
    
Route::get('cadastro_marca_produto','IndexController@FormMarcaProduto');
Route::get('listar_marca_produto','IndexController@ListarMarcasProduto');
Route::post('cadastrando_marca_produto','IndexController@CadastrarMarcaProduto');
Route::get('excluir_marca_produto/{id}','IndexController@deleteMarcaProduto');
Route::get('deletar_marca_produto/{id}','IndexController@deletarMarcaProduto');
Route::get('atualizar_marca_produto/{id}','IndexController@atualizarMarcaProduto');
Route::post('atualizando_marca_produto','IndexController@AtualizandoMarcaProduto');

Route::get('cadastro_marca_fornecedor','FornecedorController@FormMarcaFornecedor');
Route::get('listar_marca_fornecedor','FornecedorController@ListarMarcasFornecedor');
Route::post('cadastrando_marca_fornecedor','FornecedorController@CadastrarMarcaFornecedor');
Route::get('excluir_marca_fornecedor/{id}','FornecedorController@deleteMarcaFornecedor');
Route::get('deletar_marca_fornecedor/{id}','FornecedorController@deletarMarcaFornecedor');
Route::get('atualizar_marca_fornecedor/{id}','FornecedorController@atualizarMarcaFornecedor');
Route::post('atualizando_marca_fornecedor','FornecedorController@AtualizandoMarcaFornecedor');
Route::get('admin_painel','AdminController@AdminPainel');
Route::get('listar_agendamentos','PedidoController@ListarAgendamentos');
Route::get('listar_produto','ProdutoController@ListarProduto');
Route::get('financeiro_form','RelatorioController@FinanceiroForm');
Route::get('cadastro_fornecedor','FornecedorController@CadastroFornecedorForm');
Route::get('cadastro_servico','ServicoController@CadastroServico');
Route::get('listar_clientes','AdminController@ListarClientes');
Route::get('pedidos_pagos','PedidoController@PedidosPagos');
Route::get('pedidos_pagos_naopagos','PedidoController@PedidosNaoPagos');
Route::any('cadastro_produto','ProdutoController@CadastroProduto');
Route::get('atualizar_produto/{id}','ProdutoController@AtualizarProduto');
Route::get('listar_fornecedor','FornecedorController@ListarFornecedor');
Route::get('atualizar_fornecedor/{id}','FornecedorController@AtualizarFornecedor');
Route::get('listar_servicos_admin','ServicoController@ListarServicoAdmin');
Route::get('atualizar_servico/{id}','ServicoController@AtualizarServico');
Route::post('atualizandoservico','ServicoController@AtualizandoServico');
Route::get('deletar_servico/{id}','ServicoController@DeletarServico');
Route::get('atualizar_cliente_admin/{id}','AdminController@AtualizarClienteAdmin');
Route::post('atualizando_cliente_admin','AdminController@atualizandoCliente');
Route::get('cliente_pedidos_admin','IndexController@ClientePedidosAdmin');
Route::get('detalhes_pedidos_admin/{id}','PedidoController@ClientePedidosDetalhesAdmin');
Route::post('cadastrar_fornecedor','FornecedorController@CadastrarFornecedor');
Route::post('atualizar_fornecedor','FornecedorController@AtualizarFornecedorDados');
Route::get('excluir_fornecedor/{id}','FornecedorController@ExcluirFornecedor');
Route::post('atualizar_produto','ProdutoController@AtualizarProdutoDados');
Route::get('detalhes_fornecedor/{id}','ProdutoController@FornecedorDetalhes');
Route::get('excluir_produto/{id}','ProdutoController@ExcluirProduto');
Route::get('excluir_cliente/{id}','AdminController@ExcluirCliente');
Route::get('cliente_agendamentos/{id}','AdminController@ClienteAgendamentos');
Route::put('baixar_pedido/{id}','PedidoController@baixarPedido');
Route::post('cadastrar_servico','ServicoController@CadastrarServico');
Route::get('agendamentos_espera','PedidoController@ListarAgendamentosEmEspera');
Route::get('reagendar/{id}','PedidoController@Reagendar');
Route::post('confirmar_reagendamento','PedidoController@ReagendarAgendamento');
Route::put('confirmar_agendamento/{id}','PedidoController@ConfirmarAgendamento');
Route::get('pesquisa_lista_espera_cliente','PedidoController@PesquisarDataAgendamentoEmEspera');
Route::get('pesquisar_clientes_horario_confirmado','PedidoController@pesquisarAgendamentosConfirmados');
Route::get('cancelar_agendamento/{id}','PedidoController@CancelarAgendamento');
Route::get('cancelar/{id}','PedidoController@getAgendamentoId');
Route::get('agendamentos_cancelados','PedidoController@ListarAgendamentosCancelados');
Route::get('pesquisar_agendamentos_cancelados','PedidoController@PesquisarAgendamentosCancelados');
});

