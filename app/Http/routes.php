<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as'   => 'chamados',
    'uses' => 'ChamadosController@getChamados',
]);

Route::group(['prefix' => '/cadastrar'], function () {
    Route::get('/', [
        'as'   => 'cadastrar',
        'uses' => 'ChamadosController@getCadastrarChamado',
    ]);

    Route::post('/', [
        'uses' => 'ChamadosController@postCadastrarChamado',
    ]);
});

Route::get('/chamado/{id}', [
    'as'   => 'chamado',
    'uses' => 'ChamadosController@getChamado',
]);
