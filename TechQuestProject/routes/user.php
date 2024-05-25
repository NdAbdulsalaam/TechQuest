<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified', RoleMiddleware::class . ':user'])->prefix('user')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('user.dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])
               ->name('profile.edit');

    Route::patch('profile', [ProfileController::class, 'update'])
                 ->name('profile.update');

    Route::delete('profile', [ProfileController::class, 'destroy'])
                  ->name('profile.destroy');
});