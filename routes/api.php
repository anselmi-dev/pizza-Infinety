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

Route::resource('pizzas', App\Http\Controllers\Api\PizzaController::class);
Route::resource('ingredients', App\Http\Controllers\Api\IngredientsController::class);
Route::resource('orders', App\Http\Controllers\Api\OrdersController::class);
