<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/players/create', 'PlayerController@create');
Route::post('/players/update/{id}', 'PlayerController@update');

Route::get('/teams/{id}', 'TeamController@show');
Route::post('/teams/create', 'TeamController@create');
