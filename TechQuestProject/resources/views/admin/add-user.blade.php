@extends('layouts.admin-master')
@section('title', 'Add Staff Information')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-center text-gray-800">{{ __('Add Staff') }}</h1>
<p class="mb-4 text-center"><b><i>{{ __('Staff Personal') }}</i></b></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-danger d-inline float-left"><b>{{ _('Tech Quest Academy') }}</b></h2>
        <h6 class="d-inline float-right text-danger"><b><a href="{{ route('admin.users') }}">{{ __('<-- Back') }}</a></b></h6>
    </div>
@if (session()->has('success'))
<div class="alert alert-success text-center">
    {{ session()->get('success') }}
</div>
@endif

<div class="card-body">
    <div class="row">
        <div class="col-lg-6">

            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <form action="{{ route('admin.add-user') }}" method="post">
                @csrf
                @method('POST')

                <!-- First Name -->
                <div class="form-group">
                    <label for="fname">{{ __('First Name') }}</label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label for="lname">{{ __('Last Name') }}</label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
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
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
            </div>

            <!-- Position -->
            <div class="form-group">
                <label for="position">{{ __('Position') }}</label>
                <input type="text" name="position" id="position" class="form-control" placeholder="Position">
            </div>

            <!-- Office -->
            <div class="form-group">
                <label for="office">{{ __('Office') }}</label>
                <input type="text" name="office" id="office" class="form-control" placeholder="Office">
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">{{ __('Age') }}</label>
                <input type="text" name="age" id="age" class="form-control" placeholder="Age">
            </div>

            <!-- Salary -->
            <div class="form-group">
                <label for="salary">{{ __('Salary') }}</label>
                <input type="text" name="salary" id="salary" class="form-control" placeholder="Salary">
            </div>
        </div>
    </div>
    <div class="text-center">
        <h3>Default password is the last name.</h3>
        <button type="submit" class="btn btn-danger">{{ __('Add New Staff') }}</button>
    </div>
    </form>
</div>
</div>


@endsection
