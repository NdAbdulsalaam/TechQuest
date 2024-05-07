<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::get('/', function() {
    return view('welcome');
});


Route::get('/pizzas', [PizzaController::class, 'index'])->middleware('auth');
Route::get('/pizzas/create', [PizzaController::class, 'create']);
Route::post('/pizzas', [PizzaController::class, 'store']);
Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
