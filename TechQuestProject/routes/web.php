<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
        return view('home');
    })->name('home');

Route::get('/dash', function() {
        return view('/admin.dash');
    })->name('dash');


require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/seller.php';
require __DIR__.'/admin.php';
