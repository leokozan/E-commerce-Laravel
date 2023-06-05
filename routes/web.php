<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cadastro;
use App\Http\Controllers\Editar;
use App\Http\Controllers\Excluir;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\imagens_produtos_Controller;
use App\Http\Controllers\views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
//Permissão

// Route::get('/tabelas-compra',[Cadastro::class,'view_lista_compra']);

// Route::get('/tabelas-produto',[Cadastro::class,'view_lista_produto']);

//Somente pessoas autenticadas
Route::middleware(['auth'])->group(function () {
    Route::get('/carrinho',[CarrinhoController::class,'carrinhoLista'])->name('site.carrinho');

    Route::post('/carrinho',[CarrinhoController::class,'adicionarCarrinho'])->name('site.addcarrinho');
    
    Route::post('/remover',[CarrinhoController::class,'removerCarrinho'])->name('site.removercarrinho');
    
    Route::post('/atualizar',[CarrinhoController::class,'atualizarCarrinho'])->name('site.atualizacarrinho');
    
    Route::get('/limpar',[CarrinhoController::class,'limparCarrinho'])->name('site.limparcarrinho');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/tabelas', function () {
        return view('viewTabelas.tabelas');
    });
    Route::get('/tabelas-compra', function () {
        return view('viewTabelas.tabela_compra');
    });
    Route::get('/tabelas-produto', function () {
        return view('viewTabelas.tabelas_produto');
    });
    Route::get('/tabelas-imagens', function () {
        return view('viewTabelas.tabelasImagens');
    });

    //Cadastro
    Route::get('/cadastro',[Cadastro::class,'view_cadastro']);

    Route::get('/cadastrar-compra',[Cadastro::class,'view_cadastro_compra']);


    Route::get('/cadastrar-produto',[Cadastro::class,'view_cadastro_produto']);

    Route::post('/cadastrar-produto',[Cadastro::class,'cadastro_produto']);


    Route::get('/cadastrar-comprador',[Cadastro::class,'view_cadastro_comprador']);

    Route::post('/cadastrar-comprador',[Cadastro::class,'cadastro_comprador']);

    Route::post('/cadastrar-compra',[Cadastro::class,'cadastro_compra']);
    //Editar
    Route::get('/editar-compra/{id_da_compra}',[Editar::class,'find_compra']);

    Route::put('/editar-compra/{id_da_compra}',[Editar::class,'editar_compra']);



    Route::get('/editar-user/{id_do_user}',[Editar::class,'find_user']);

    Route::put('/editar-user/{id_do_user}',[Editar::class,'editar_user']);



    Route::get('/editar-produto/{id_do_produto}',[Editar::class,'find_produto']);

    Route::put('/editar-produto/{id_do_produto}',[Editar::class,'editar_produto']);

    Route::get('/cadastrar-imagem/{id}',[imagens_produtos_Controller::class,'find_produto']);

    Route::post('/cadastrar-imagem',[imagens_produtos_Controller::class,'cadastro_imagem']);

    //Excluir
    Route::get('/excluir-produto/{id_do_produto}',[Excluir::class,'excluir_produto']);

    Route::get('/excluir-user/{id_do_user}',[Excluir::class,'excluir_user']);

    Route::get('/excluir-carrinho/{id_do_carrinho}',[Excluir::class,'excluir_carrinho']);

    
    Route::get('/excluir-imagem/{id}',[Excluir::class,'excluir_img']);
});

//Login

Route::get('/login',[loginController::class,'view_login'])->name('viewLogin');

Route::post('/auth',[loginController::class,'auth'])->name('auth.user');

//Registro Usuario

Route::get('/cadastro_usuario',[loginController::class,'view_register']);

Route::post('/cadastrar-usuario',[loginController::class,'cadastro_usuario'])->name('register.user');

Route::get('cadastro_admin',[loginController::class,'view_registarAdmin'])->name('view.registarAdmin');

Route::post('/cadastrar-admin',[loginController::class,'cadastro_admin'])->name('register.admin');

Route::get('/logout',[loginController::class,'logout'])->name('user.logout');

Route::get('/authTabelas',[loginController::class,'authTabelas'])->name('authTabelas');

//Págida do Produto

Route::get('/produtos_page',[views::class,'produtos_page'])->name('viewProdutos');

//Pagamento
Route::post('/pagamento',[CarrinhoController::class,'pagamento'])->name('efetuar.pagamento');

Route::get('/pagamentoView',[CarrinhoController::class,'pagamentoView'])->name('pagamentoView');


Route::get('/sobre-produto/{id_do_produto}', [SiteController::class,'verificar_produto']);

//Página de Vendas

Route::get('/vendas',[VendasController::class,'viewVendas'])->name('viewVendas');

Route::get('/details_venda/{id}',[VendasController::class,'findCompra'])->name('detalheVendas');

Route::put('/editar-status/{id}',[VendasController::class,'editar_status']);

// Route::get('/editar-compra/{id_da_compra}',[Editar::class,'find_compra']);
