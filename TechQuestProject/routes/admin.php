<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

    Route::get('staffs', [DashboardController::class, 'staffs'])
    ->name('admin.staffs');

});