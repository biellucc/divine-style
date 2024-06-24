<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RoupaController;
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
    Route::get('/ajuda', 'ajuda')->name('site.ajuda');
    Route::get('/perguntas-frequentes', 'perquntas_frequentes')->name('site.perguntas_frequentes');
    Route::get('/sobre-nós', 'sobre_site')->name('site.sobre');
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
    Route::get('/Carrinho-adicionar-produto', 'adicionar')->name('carrinho.add');
    Route::get('/Carrinho-remover-produto', 'remover')->name('carrinho.remover');
});

Route::controller(PedidoController::class)->group(function(){
    Route::get('/Lista-Pedidos', 'index')->name('pedido.index');
    Route::get('/Pedido-formulario', 'formulario_pedido')->name('pedido.formulario_pedido');
    Route::post('/Pedido-criar', 'store')->name('pedido.adicionar');
});

Route::controller(RoupaController::class)->group(function(){
    Route::get('/Roupa-index', 'index')->name('roupa.index');
    Route::get('/Roupa-[$id]', 'produto')->name('roupa.produto');
    Route::post('/Roupa-store', 'store')->name('roupa.store');
    Route::post('/Roupa-alterar', 'alterar')->name('roupa.alterar');
    Route::post('/Roupa-deletar', 'deletar')->name('roupa.deletar');
});
