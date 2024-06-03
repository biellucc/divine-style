<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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

Route::get('/', [SiteController::class, 'dashboard'])->name('site.dashboard');

Route::get('/Formulário-de-Registro', [UserController::class, 'formulario_cadastro'])->name('usuario.formulario_registro');
Route::controller(LoginController::class)->group(function(){
    Route::post('/Login', 'login')->name('login.login');
    Route::get('/Logout', 'logout')->name('login.logout');
    Route::get('/Login', 'index')->name('login.index');
});
