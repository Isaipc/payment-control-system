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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('empleados', 'API\EmpleadoController');
Route::resource('clientes', 'API\ClienteController');
Route::resource('tipo_ingresos', 'API\TipoIngresoController');
Route::resource('tipo_egresos', 'API\TipoEgresoController');

Route::resource('egresos', 'API\EgresoController');
// Route::get('egresos', 'API\EgresoController@index');
// Route::post('egresos', 'API\EgresoController@store');
// Route::get('egresos/{egreso}', 'API\EgresoController@show');
// Route::put('egresos/{egreso}', 'API\EgresoController@update');
// Route::delete('egresos/{egreso}', 'API\EgresoController@delete');

Route::resource('ingresos', 'API\IngresoController');
// Route::get('ingresos', 'API\IngresoController@index');
// Route::post('ingresos', 'API\IngresoController@store');
// Route::get('ingresos/{ingreso}', 'API\IngresoController@show');
// Route::put('ingresos/{ingreso}', 'API\IngresoController@update');
// Route::delete('ingresos/{ingreso}', 'API\IngresoController@delete');
