<?php

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

/*
|--------------------------------------------------------------------------
| Rotas para as telas de pesquisa
|--------------------------------------------------------------------------
    '/' - Carrega a tela principal, se existir pesquisa ativa mostra botão ENTRAR, caso contrário mostra  msg genérica

*/
Route::get('/', function () {
    return view('index');
});


/*
|--------------------------------------------------------------------------
| Rotas para as telas de administração
|--------------------------------------------------------------------------
    /admin - Tela de Login para entrar no painel de administração
    /dashboard - (somente logado) Dashboard com acesso à construção/edição de pesquisas e relatórios
    /list-surv - (somente logado) Lista de pesquisas cadastradas
    /build-surv - (somente logado) Construção de uma pesquisa
*/
Route::get('/admin', function () {
    return view('auth.login');
})->name('admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/list-surv', function () {
        return view('admin.list-surv');
    })->name('list-surv');
    Route::get('/build-surv', function () {
        return view('admin.build-surv');
    })->name('build-surv');
});
