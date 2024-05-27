<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified', RoleMiddleware::class . ':user'])->prefix('user')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('user.dashboard');

    Route::get('{id}', [ProfileController::class, 'show'])
    ->name('user.view-profile');

    Route::get('profile/{id}', [ProfileController::class, 'edit'])
               ->name('user.edit-profile');

    Route::put('profile/{id}', [ProfileController::class, 'update'])
                 ->name('user.update-profile');

    Route::delete('profile/{id}', [ProfileController::class, 'destroy'])
                  ->name('user.delete-profile');
});