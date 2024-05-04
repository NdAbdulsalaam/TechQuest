<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', function() {
    $pizzas = [
                [ 'name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 45 ],
                [ 'name' => 'Nurudeen', 'gender' => 'male', 'age' => 45 ],
                [ 'name' => 'Faaizah', 'gender' => 'male', 'age' => 45 ],
                [ 'name' => 'Roodiyah', 'gender' => 'male', 'age' => 45 ],
    ];

    $type = request('type');

    return view('pizzas', [
        'pizzas' => $pizzas,
        'gender' => $type
    ]);
});

Route::get('/pizzas/{id}', function($id) {
    return view('details', ['id' => $id]);
});