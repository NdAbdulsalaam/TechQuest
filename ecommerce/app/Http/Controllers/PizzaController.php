<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index() {
        // $pizzas = [
        //     ['name' => 'Abdulsalaam', 'gender' => 'male', 'age' => 70],
        //     ['name' => 'Roodiyah', 'gender' => 'female', 'age' => 70]
        // ];

        $pizzas = Pizza::where('base', 'flower')->get();

        return view('pizza.index', [
            'pizzas' => $pizzas,
            // 'gender' => $pizzas[1]['gender']
        ]);
    }

    public function show($id) {
        return view('pizza.show', ['id' => $id]);
    }

    public function create() {
        return view('pizza.create');
    }

    public function store() {

        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }

}
