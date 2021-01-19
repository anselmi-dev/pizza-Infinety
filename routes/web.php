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

Route::get('/', [App\Http\Controllers\PizzaController::class, 'index'])->name('home');

Route::resource('/pizzas', App\Http\Controllers\PizzaController::class);

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/pizzas', [App\Http\Controllers\AdminController::class, 'pizzas'])->name('pizzas.index');
    Route::get('/ingredientes', [App\Http\Controllers\AdminController::class, 'ingredients'])->name('ingredients.index');
    Route::get('/ordenes', [App\Http\Controllers\AdminController::class, 'orders'])->name('orders.index');
});


