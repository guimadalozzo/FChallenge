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

// Route::get('/', function () {
//     return view('pages.agendamento');
// });
Route::any('/', ['as' => 'agendamento.list', 'uses' => 'App\Http\Controllers\AgendamentoController@agendamento']);
Route::post('/create', ['as' => 'agendamento.create', 'uses' => 'App\Http\Controllers\AgendamentoController@create']);
Route::post('/store',  ['as' => 'agendamento.store', 'uses' => 'App\Http\Controllers\AgendamentoController@store']);