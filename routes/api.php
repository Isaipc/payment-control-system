<?php

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


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/logout', 'AuthController@logout');
        Route::get('/user', 'AuthController@user');
    });
});

Route::apiResource('categorias', 'API\CategoriaController')->except([
    'store', 'update', 'destroy'
]);
Route::apiResource('tipos-cuenta', 'API\TipoCuentaController')->except([
    'store', 'update', 'destroy'
]);

Route::apiResource('categorias.personas', 'API\PersonaController')->shallow();
Route::apiResource('tipos-cuenta.cuentas', 'API\CuentaController')->shallow();
