<?php

use Illuminate\Http\Request;

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

Route::middleware('cors:api')->get('/resultados/{word?}', 'resultados_deportivos_controller@resultados');
Route::middleware('cors:api')->get('/temporadas', 'resultados_deportivos_controller@getTemporadas');
Route::middleware('cors:api')->get('/equipos/{word?}', 'resultados_deportivos_controller@equipos');
Route::middleware('cors:api')->get('/detail/{equipo?}', 'resultados_deportivos_controller@detail');