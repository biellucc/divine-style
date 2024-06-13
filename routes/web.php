<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendaController;
use App\Models\Cartao;
use Illuminate\Support\Facades\Route;

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

Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'dashboard')->name('site.dashboard');
    Route::get('/produto-[$id]', 'produto')->name('site.produto');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/Formulário-de-Registro','formulario_cadastro')->name('usuario.formulario_registro');
    Route::post('/Formulário-de-Registro', 'store_cadastro')->name('user.cadastro');
});

Route::controller(LoginController::class)->group(function(){
    Route::post('/Login', 'login')->name('login.login');
    Route::get('/Logout', 'logout')->name('login.logout');
    Route::get('/Login', 'index')->name('login.index');
});

Route::controller(EstoqueController::class)->group(function(){
    Route::get('/Estoque', 'index')->name('estoque.index');
});

Route::controller(VendaController::class)->group(function(){
    Route::get('/Vendas', 'index')->name('venda.index');
});

Route::controller(CartaoController::class)->group(function(){
    Route::get('/Cartao', 'index')->name('cartao.index');
    Route::get('/Cartao-cadastrar-cartão', 'formulario')->name('cartao.formulario');
    Route::post('/Cartão-cadastrar-cartão', 'soter')->name('cartao.store');
    Route::get('Cartao-gerenciamento-[$id]', 'controle')->name('cartao.controle');
    Route::get('/Cartao-deletar-cartão', 'delete')->name('cartao.delete');
    Route::get('/Cartao-atualizar-cartão', 'update')->name('cartao.update');
});

Route::controller(CarrinhoController::class)->group(function(){
    Route::get('/Carrinho', 'index')->name('carrinho.index');
    Route::get('/Carrinho', 'adicionar')->name('carrinho.add');
    Route::get('/Carrinho')->name('carrinho.delete');
});

Route::controller(PedidoController::class)->group(function(){
    Route::get('/Lista-Pedidos', 'index')->name('pedido.index');

});
