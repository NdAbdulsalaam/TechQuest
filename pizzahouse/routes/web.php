<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', function() {
    $pizza = [
        'name' => 'Abdulsalaam',
        'gender' => 'male',
        'age' => 45
    ];
    return view('pizzas', $pizza);
});