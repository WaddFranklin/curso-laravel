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

// Roteamento
Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function() {
    echo "Login";
})->name('site.login');

// Agrupamento
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function() {return 'Clientes';})->name('app.clientes');

    Route::get('/fornecedores', function() {return 'Fornecedores';})->name('app.fornecedores');

    Route::get('/produtos', function() {return 'Produtos';})->name('app.produtos');
});

// Redirect
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

/*
Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');
*/

Route::fallback(function() {
    echo "A rota acessada não existe. <a href='" . route('site.index') . "'>Clique aqui</a> para voltar à tela inicial.";
});
