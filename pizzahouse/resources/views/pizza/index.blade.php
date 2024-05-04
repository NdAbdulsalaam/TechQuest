@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        {{-- <div class="content">
            <div class='title m-b-md'>
                Pizza list
            </div>
        </div>
        <p>{{ $name }} is a {{ $gender }} and he's {{ $age }} years old </p>
        @if( $age > 18)
            <p> {{ $name }} is an adult </p>
        @endif --}}

        {{-- @for ($i = 0; $i < count($pizzas); $i++)
            <p>{{ $pizzas[$i]['name'] }}
        @endfor --}}


        @foreach ($pizzas as $pizza)
            <div> {{ $pizza->name }} - {{ $pizza->type }} - {{ $pizza->base }} </div>
        @endforeach
    </div>
@endsection