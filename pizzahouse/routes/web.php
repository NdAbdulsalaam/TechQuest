<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', function() {
    $pizzas = [
                [ 'name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 45 ],
                [ 'name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 45 ],
                [ 'name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 45 ],
                [ 'name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 45 ],
    ];
    return view('pizzas', ['pizzas' => $pizzas]);
});