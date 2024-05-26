@extends('layouts.Admin-master')
@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-center text-gray-800">{{ __('Edit Profile') }}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-danger d-inline float-left"><b> {{ $user->name }}</b></h2>
            <h6 class="d-inline float-right text-danger"><b><a href="{{ route('admin.users') }}">{{ __('<-- Back') }}</a></b></h6>
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
                    <form action="{{ route('admin.update-user', $user->id) }}" method="post" class="row">
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

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control" placeholder="Email Address">
                            </div>

                            <!-- Role Select -->
                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" placeholder="Phone">
                            </div>

                            <!-- Position -->
                            <div class="form-group">
                                <label for="position">{{ __('Position') }}</label>
                                <input type="text" name="position" id="position" value="{{ $user->position }}" class="form-control" placeholder="Position">
                            </div>

                            <!-- Office -->
                            <div class="form-group">
                                <label for="office">{{ __('Office') }}</label>
                                <input type="text" name="office" id="office" value="{{ $user->office }}" class="form-control" placeholder="Office">
                            </div>

                            <!-- Age -->
                            <div class="form-group">
                                <label for="age">{{ __('Age') }}</label>
                                <input type="text" name="age" id="age" value="{{ $user->age }}" class="form-control" placeholder="Age">
                            </div>

                            <!-- Salary -->
                            <div class="form-group">
                                <label for="salary">{{ __('Salary') }}</label>
                                <input type="text" name="salary" id="salary" value="{{ $user->salary }}" class="form-control" placeholder="Salary">
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
