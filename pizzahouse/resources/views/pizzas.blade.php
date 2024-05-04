<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body>
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

            @for ($i = 0; $i < count($pizzas); $i++)
                <p>{{ $pizzas[$i]['name'] }}
            @endfor

            @foreach ($pizzas as $pizza)
                <div> {{ $pizza['name'] }} </div>
            @endforeach
        </div>
    </body>
</html>