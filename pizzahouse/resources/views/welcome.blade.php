@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <p class="mssg">{{ session('mssg') }}</p>
            <h1>Dashboard</h1>
        </div>
    </div>
@endsection