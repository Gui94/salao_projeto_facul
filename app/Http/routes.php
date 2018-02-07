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
        'as'=>'servico.id',
        'uses'=>'ServicoController@servicoid'
    ]);
    Route::get('produto_id/{id}',[
        'as'=>'produto.id',
        'uses'=>'ProdutoController@produtoid'
    ]);
    Route::get('fornecedor_id/{id}',[
        'as'=>'fornecedor.id',
        'uses'=>'FornecedorController@fornecedorid'
    ]);
    Route::get('cliente_id/{id}',[
        'as'=>'cliente.id',
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
        'as'=>'detalhes.id',
        'uses'=>'ServicoController@ServicoDetalhes'
    ]);
    Route::post('pedido/{id}',[
        'as'=>'pedido.id',
        'uses'=>'IndexController@AddCarrinho'
    ]);
    Route::get('carrinho',[
        'as'=>'carrinho',
        'uses'=>'CarrinhoController@getListar'
    ]);
    Route::get('realizar_pedido',[
        'as'=>'realizar.pedido',
        'uses'=>'IndexController@GerarPedido'
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
        'as'=>'pedido.detalhes.id',
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
    Route::get('lucro_do_dia',[
        'as'=>'lucro.do.dia',
        'uses'=>'RelatorioController@CalculoLucroDoDia'
    ]);
    Route::get('pesquisar',[
        'as'=>'pesquisar',
        'uses'=>'PedidoController@PesquisarDataAgendamento'
    ]);
    Route::get('cadastro_marca_produto',[
        'as'=>'cadastro.marca.produto',
        'uses'=>'IndexController@FormMarcaProduto'
    ]);
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

//Retirar os  '.id' nos apelidos, evitando a possivel inserção de anonemous

Route::get('pesquisar_clientes_horario_confirmado',[
        'as'=>'pesquisar.clientes.horario.confirmado',
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
        'as'=>'pesquisar.agendamento.cancelados',
        'uses'=>'PedidoController@PesquisarAgendamentosCancelados'
    ]);

});

