<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
 
    Route::get('user', 'ApiController@getAuthUser');
 
    Route::get('/estudantes', 'Painel\EstudanteController@index');
    Route::get('/estudantes/{estudante}', 'Painel\EstudanteController@show')->name('estudantes.show');
    Route::post('/estudantes', 'Painel\EstudanteController@store')->name('estudantes.store');
    Route::put('/estudantes/{estudante}', 'Painel\EstudanteController@update')->name('estudantes.update');
    Route::delete('/estudantes/{estudante}', 'Painel\EstudanteController@destroy')->name('estudantes.destroy');
});

