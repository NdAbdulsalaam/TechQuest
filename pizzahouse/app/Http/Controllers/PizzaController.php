<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index() {
        $pizzas = [
            ['name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 70],
            ['name' => 'Roodiyah', 'gender' => 'female', 'age' => 70]
        ];
        return view('pizzas', [
            'pizzas' => $pizzas,
            'gender' => $pizzas[1]['gender']
        ]);
    }
}
