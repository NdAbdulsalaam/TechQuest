<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
        return view('home');
    })->name('home');


require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';
