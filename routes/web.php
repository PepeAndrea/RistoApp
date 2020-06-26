<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::view('/offline', 'vendor.laravelpwa.offline');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/','RistoController@index');
    Route::get('/list','RistoController@list');
    Route::get('/add','RistoController@add');
    Route::post('/add','RistoController@storeRisto');
    Route::get('/delete/{id}','RistoController@delete');
    Route::get('/edit/{id}','RistoController@editPage');
    Route::post('/edit','RistoController@editRisto');
    Route::view('/search','search');
    Route::post('/search','RistoController@search');
});


