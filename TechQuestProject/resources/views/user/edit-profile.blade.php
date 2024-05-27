@extends('layouts.user-master')
@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-center text-gray-800">{{ __('Edit Profile') }}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-danger d-inline float-left"><b> {{ $user->name }}</b></h2>
            <h6 class="d-inline float-right text-danger"><b><a href="{{ route('user.dashboard') }}">{{ __('<-- Back') }}</a></b></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('success'))
                        <p class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </p>
                    @endif

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('user.update-profile', auth()->user()->id) }}" method="post" class="row">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-6">
                            <!-- First Name -->
                            <div class="form-group">
                                <label for="fname">{{ __('First Name') }}</label>
                                <input type="text" name="fname" id="fname" value="{{ $user->fname }}" class="form-control" placeholder="First Name">
                            </div>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="lname">{{ __('Last Name') }}</label>
                                <input type="text" name="lname" id="lname" value="{{ $user->lname }}" class="form-control" placeholder="Last Name">
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
                                <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control" placeholder="Email Address">
                            </div>
                            <!-- Age -->
                            <div class="form-group">
                                <label for="age">{{ __('Age') }}</label>
                                <input type="text" name="age" id="age" value="{{ $user->age }}" class="form-control" placeholder="Age">
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="text" name="password" id="password" disabled value="{{ $user->password }}" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-danger">{{ __('Update Staff Information') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
