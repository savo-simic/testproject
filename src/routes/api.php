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
Route::middleware('api')->post(
    '/login',
    ['uses' => 'App\Http\Controllers\API\AuthController@login', 'as' => 'login']
);

Route::middleware('api')->post(
    '/register',
    ['uses' => 'App\Http\Controllers\API\AuthController@register', 'as' => 'register']
);

Route::middleware('api')->get(
    '/poles',
    ['uses' => 'App\Http\Controllers\API\PoleController@index', 'as' => 'poles']
);

Route::middleware('api')->get(
    '/routes',
    ['uses' => 'App\Http\Controllers\API\RouteController@index', 'as' => 'routes']
);

Route::middleware('api')->get(
    '/transmissions',
    ['uses' => 'App\Http\Controllers\API\TransmissionController@index', 'as' => 'transmissions']
);

Route::middleware('api')->put(
    '/transmissions/update/{id}',
    ['uses' => 'App\Http\Controllers\API\TransmissionController@update', 'as' => 'transmissions.update']
);

Route::middleware('api')->put(
    '/poles/update/{id}',
    ['uses' => 'App\Http\Controllers\API\PoleController@update', 'as' => 'poles.update']
);
