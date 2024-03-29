<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesquisaAdmController;

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
*/
Route::get('/', function () {
    return view('index');
});
Route::get('/surv/{url}', [PesquisaAdmController::class, 'surv'])->name('surv');
Route::get('/conclusao_pesquisa', [PesquisaAdmController::class, 'conclusao_pesquisa'])->name('conclusao_pesquisa');
Route::post('/store-resultado', [PesquisaAdmController::class, 'storeResultado'])->name('store-resultado');

/*
|--------------------------------------------------------------------------
| Rotas para as telas de administração
|--------------------------------------------------------------------------
    /admin - Tela de Login para entrar no painel de administração
    /dashboard - (somente logado) Dashboard com acesso à construção/edição de pesquisas e relatórios
    /new-pesquisa - (somente logado) Construção de uma pesquisa
*/
Route::get('/admin', function () {
    return view('auth.login');
})->name('admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [PesquisaAdmController::class, 'dashboard'])->name('dashboard');
    Route::get('/new-pesquisa', [PesquisaAdmController::class, 'newPesquisa'])->name('new-pesquisa');
    Route::post('/store-pesquisa', [PesquisaAdmController::class, 'storePesquisa'])->name('store-pesquisa');
    Route::get('/resultados/{id}/{metadados?}', [PesquisaAdmController::class, 'resultados'])->name('resultados');
    Route::get('/editar/{id}', [PesquisaAdmController::class, 'editar'])->name('editar');
    Route::get('/duplicar/{id}', [PesquisaAdmController::class, 'duplicar'])->name('duplicar');
    Route::get('/excluir/{id}', [PesquisaAdmController::class, 'excluir'])->name('excluir');
});
