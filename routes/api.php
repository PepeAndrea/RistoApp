<?php

use App\Restourant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ristoranti', function () {
    $risto = Restourant::all()->toJson();
    return $risto;
});

Route::post('/aggiungi', function (Request $req) {
    $risto = new Restourant;
    $risto->name = $req->nome;
    $risto->address = $req->indirizzo;
    $risto->email = $req->email;
    $risto->save();
    return response([$risto,"Ristorante aggiunto"],200);
});