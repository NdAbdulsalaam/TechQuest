<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', function() {
    return view('pizzas', ['name' => 'Abdulsalaam', 'gender' => 'male']);
});