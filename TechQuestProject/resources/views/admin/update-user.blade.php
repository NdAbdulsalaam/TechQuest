@extends('layouts.seller-master')
@section('title', 'Edit User Information')


@section('content')
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-center text-gray-800">{{ __('Edit User') }}</h1>
    <p class="mb-4 text-center"><b><i>{{ __('User Personal') }}</i></b></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-danger d-inline float-left"><b> {{ $user->name }}</h3>
            <h6 class="d-inline float-right text-danger"><b><a href="{{ route('seller.users') }}">{{ __('<-- Back') }}</a></b></h6>
        </div>
        <div class="card-body">
            <div class="mx-auto" style="max-width: 400px;"> <!-- Centering content within a max-width container -->
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

                <form action="{{ route('seller.update-user', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <!-- Full Name -->
                    <div class="form-group">
                        <label for="name">{{ __('Full Name') }}</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="Full Name">
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">{{ __('Username') }}</label>
                        <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
                    </div>

                    <!-- Role Select -->
                    <div class="form-group">
                        <label for="role">{{ __('Role') }}</label>
                        <select name="role" id="role" class="form-control">
                            <option value="" disabled selected>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="seller">Seller</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="startdate">{{ __('Start Date') }}</label>
                        <input type="date" name="startdate" value="{{ $user->created_at }}" disabled id="startdate" class="form-control" placeholder="Start Date">
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input type="email" name="email" value="{{ $user->email }}" disabled id="email" class="form-control" placeholder="Email Address">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" name="password" value="{{ $user->password }}" id="password" disabled class="form-control" placeholder="Password">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-danger">{{ __('Update User Information') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
