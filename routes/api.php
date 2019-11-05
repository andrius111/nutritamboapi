<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Cadastro e login
Route::post('login','LoginController@login')->name('api.login.login');
Route::post('user','UserController@store')->name('api.user.store');

Route::group(['middleware' => 'auth.jwt'], function () {
    // Logout
    Route::get('logout', 'LoginController@logout')->name('api.login.logout');

    // UF
    Route::get('uf', 'UfController@index')->name('api.uf.index');
    Route::get('uf/{uf}', 'UfController@show')->name('api.uf.show');
    Route::post('uf', 'UfController@store')->name('api.uf.store');
    Route::put('uf/{uf}', 'UfController@update')->name('api.uf.update');
    Route::delete('uf/{uf}', 'UfController@destroy')->name('api.uf.destroy');

    // Cidade
    Route::get('cidade', 'CidadeController@index')->name('api.cidade.index');
    Route::get('cidade/{cidade}', 'CidadeController@show')->name('api.cidade.show');
    Route::post('cidade', 'CidadeController@store')->name('api.cidade.store');
    Route::put('cidade/{cidade}', 'CidadeController@update')->name('api.cidade.update');
    Route::delete('cidade/{cidade}', 'CidadeController@destroy')->name('api.cidade.destroy');

    // Atividade
    Route::get('atividade', 'AtividadeController@index')->name('api.atividade.index');
    Route::get('atividade/{atividade}', 'AtividadeController@show')->name('api.atividade.show');
    Route::post('atividade', 'AtividadeController@store')->name('api.atividade.store');
    Route::put('atividade/{atividade}', 'AtividadeController@update')->name('api.atividade.update');
    Route::delete('atividade/{atividade}', 'AtividadeController@destroy')->name('api.atividade.destroy');

    // Pessoa
    Route::get('pessoa', 'PessoaController@index')->name('api.pessoa.index');
    Route::get('pessoa/{pessoa}', 'PessoaController@show')->name('api.pessoa.show');
    Route::post('pessoa', 'PessoaController@store')->name('api.pessoa.store');
    Route::put('pessoa/{pessoa}', 'PessoaController@update')->name('api.pessoa.update');
    Route::delete('pessoa/{pessoa}', 'PessoaController@destroy')->name('api.pessoa.destroy');

    // Pessoa Contato
    Route::get('pessoa/{pessoa}/contato', 'PessoaContatoController@index')->name('api.pessoaContato.index');
    Route::get('pessoa/{pessoa}/contato/{cdContato}', 'PessoaContatoController@show')->name('api.pessoaContato.show');
    Route::post('pessoa/{pessoa}/contato', 'PessoaContatoController@store')->name('api.pessoaContato.store');
    Route::put('pessoa/{pessoa}/contato/{cdContato}', 'PessoaContatoController@update')->name('api.pessoaContato.update');
    Route::delete('pessoa/{pessoa}/contato/{cdContato}', 'PessoaContatoController@destroy')->name('api.pessoaContato.destroy');
});

// Not found
Route::fallback(function(){
    return response()->json(['error' => 'Method Not Found'], 404);
})->name('api.fallback.404');
