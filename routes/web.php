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


Route::get('/', 'tabuluController@show');
Route::get('/tabulas', 'tabuluController@show');

Route::get('/tabulas/darbinieki', 'tabuluController@darbinieki');
Route::post('/tabulas/darbinieki', 'tabuluController@darbiniekiINSERT');
Route::post('/tabulas/darbinieki/edit', 'tabuluController@darbiniekiEDIT2');
Route::get('/tabulas/darbinieki/edit/{numurs}', 'tabuluController@darbiniekiEDIT');
Route::post('/tabulas/darbinieki/delete', 'tabuluController@darbiniekiDELETE');


Route::get('/tabulas/filiales', 'tabuluController@filiales');
Route::post('/tabulas/filiales', 'tabuluController@filialesINSERT');
Route::post('/tabulas/filiales/edit', 'tabuluController@filialesEDIT2');
Route::get('/tabulas/filiales/edit/{numurs}', 'tabuluController@filialesEDIT');
Route::post('/tabulas/filiales/delete', 'tabuluController@filialesDELETE');




Route::get('/tabulas/kabineti', 'tabuluController@kabineti');
Route::post('/tabulas/kabineti', 'tabuluController@kabinetiINSERT');
Route::post('/tabulas/kabineti/edit', 'tabuluController@kabinetiEDIT2');
Route::get('/tabulas/kabineti/edit/{numurs}', 'tabuluController@kabinetiEDIT');
Route::post('/tabulas/kabineti/delete', 'tabuluController@kabinetiDELETE');



Route::get('/tabulas/mazvertigie_lidzekli', 'tabuluController@mazvertigie_lidzekli');
Route::get('/tabulas/mazvertigie', 'tabuluController@mazvertigie_lidzekli');
Route::post('/tabulas/mazvertigie', 'tabuluController@mazvertigie_lidzekliINSERT');
Route::post('/tabulas/mazvertigie/edit', 'tabuluController@mazvertigie_lidzekliEDIT2');
Route::get('/tabulas/mazvertigie/edit/{numurs}', 'tabuluController@mazvertigie_lidzekliEDIT');
Route::post('/tabulas/mazvertigie/delete', 'tabuluController@mazvertigie_lidzekliDELETE');


Route::get('/tabulas/pamatlidzekli', 'tabuluController@pamatlidzekli');
Route::get('/tabulas/pamatlidzekli', 'tabuluController@pamatlidzekli');
Route::post('/tabulas/pamatlidzekli', 'tabuluController@pamatlidzekliINSERT');
Route::post('/tabulas/pamatlidzekli/edit', 'tabuluController@pamatlidzekliEDIT2');
Route::get('/tabulas/pamatlidzekli/edit/{numurs}', 'tabuluController@pamatlidzekliEDIT');
Route::post('/tabulas/pamatlidzekli/delete', 'tabuluController@pamatlidzekliDELETE');


Route::get('/tabulas/pavadzime', 'tabuluController@pavadzime');


Route::get('/kabineti', 'kabinetiController@show');
Route::get('/kabineti/add', 'kabinetiController@add');

//Route::post('/kabineti','kabinetiController@fetchData');
Route::post('/kabineti/{numurs}','kabinetiController@fetchData');
