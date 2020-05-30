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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('categorias', 'API\CategoriaController')->except([
    'store', 'update', 'destroy'
]);
Route::apiResource('tipos-cuenta', 'API\TipoCuentaController')->except([
    'store', 'update', 'destroy'
]);

Route::apiResource('categorias.personas', 'API\PersonaController')->shallow();
Route::apiResource('tipos-cuenta.cuentas', 'API\CuentaController')->shallow();
