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

Route::get('/', function () {
    return view('auth/login');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('salas', 'SalasController');

Route::resource('home', 'HomeController');

Route::resource('professores', 'ProfessoresController');

Route::resource('cursos', 'CursosController');

Route::resource('agendamentos', 'AgendamentosController');
Route::get('agendamentos/{predio}/{dia}/{hora_inicio}-{hora_fim}/get-salas', 'AgendamentosController@getSalas');

Route::get('/desenvolvedores', function () {
    return view('desenvolvedores/index');
});
