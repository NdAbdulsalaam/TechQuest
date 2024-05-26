<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserProfileContoller;
use App\Http\Controllers\Admin\PHPMailerController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
                ->name('admin.dashboard');

    Route::get('users', [DashboardController::class, 'users'])
                ->name('admin.users');

    Route::get('users/{id}', [UserProfileContoller::class, 'view'])
                ->name('admin.view-user');

    Route::get('user/register', [UserProfileContoller::class, 'create'])
                ->name('admin.add-user');

    Route::post('user/register', [UserProfileContoller::class, 'store'])
                ->name('admin.add-user');

    Route::get('user/update/{id}', [UserProfileContoller::class, 'edit'])
                ->name('admin.update-user');

    Route::put('user/update/{id}', [UserProfileContoller::class, 'update'])
                ->name('admin.update-user');

    Route::delete('userdelete/{id}', [UserProfileContoller::class, 'destroy'])
                ->name('admin.delete-user');

    Route::get('signed-in-out', [DashboardController::class, 'signedInOutStaff'])
                ->name('admin.signed_in_out');
    
    Route::get('signed-in', [DashboardController::class, 'signedInStaff'])
                ->name('admin.signed_in');
        
    Route::get('signed-out', [DashboardController::class, 'signedOutStaff'])
                ->name('admin.signed_out');

    Route::get('send-email',[PHPMailerController::class, 'create'])
                ->name('admin.send-email');
                
    Route::post('send-email',[PHPMailerController::class, 'store'])
                ->name('admin.post-email');
});