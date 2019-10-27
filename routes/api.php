<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estudantes', 'Painel\EstudanteController@index');
Route::get('/estudantes/{estudante}', 'Painel\EstudanteController@show');
Route::post('/estudantes', 'Painel\EstudanteController@store');
Route::put('/estudantes/{estudante}', 'Painel\EstudanteController@update');
Route::delete('/estudantes/{estudante}', 'Painel\EstudanteController@destroy');