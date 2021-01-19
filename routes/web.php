<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;
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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/pizzas', App\Http\Controllers\PizzaController::class);

// Route::get('/pizzas', [App\Http\Controllers\HomeController::class, 'index'])->name('pizzas');
