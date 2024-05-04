@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Create a New Pizza </h1>
        <form method="Post" action="/pizzas" class="mt-auto me-auto ms-auto w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label" for="type">Choose pizza type</label>
                <select name="type" id="type">
                    <option value="flat">Flat</option>
                    <option value="round">Round</option>
                    <option value="cone">Cone</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="base">Choose base type</label>
                <select name="base" id="base">
                    <option value="flower">Flower</option>
                    <option value="yam">Yam</option>
                    <option value="beans">Beans</option>
                </select>
            </div>
            <button class="btn btn-primary" name="register">Order</button>
        </form>
    </div>
@endsection