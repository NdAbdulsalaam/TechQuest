<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;

Route::get('/', function() {
    return view('welcome');
});


Auth::routes();
Route::get('/pizzas', [PizzaController::class, 'index'])->middleware('auth');
Route::get('/pizzas/create', [PizzaController::class, 'create']);
Route::post('/pizzas', [PizzaController::class, 'store']);
Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']);
Route::get('/seller-dashboard', [SellerDashboardController::class, 'index']);