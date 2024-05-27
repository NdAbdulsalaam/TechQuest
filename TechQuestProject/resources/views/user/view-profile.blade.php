@extends('/layouts.user-master')
@section('title', 'User Profile')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('Users Information') }}</h1>

<div>
    <p class="mb-4 float-left"><b><i>{{ __('Personal Profile') }}</i></b></p>
    <a href="{{ route('user.update-profile', $user->id) }}" class="float-right"><b>Edit</b></a>
</div><br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-danger d-inline float-left"><b>{{ $user->fname }} {{ $user->lname }}</b> -> Role: {{ $user->role }}</h2>
        <h6 class="d-inline float-right text-danger"><b><a href="{{ route('user.dashboard') }}">{{ __('<-- Back') }}</a></b></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Staff ID</th>
                    <td>{{ $user->fname }}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{ $user->fname }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $user->lname }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Position</th>
                    <td>{{ $user->position }}</td>
                </tr>
                <tr>
                    <th>Office</th>
                    <td>{{ $user->office }}</td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td>{{ $user->age }}</td>
                </tr>
                <tr>
                    <th>Salary</th>
                    <td>{{ $user->salary }}</td>
                </tr>
                <tr>
                    <th>Joined On</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Last Update</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </table>
            <a href="{{ route('user.edit-profile', $user->id) }}" class="btn btn-danger my-3 float-right"><b>Edit</b></a>
        </div>
    </div>
</div>

</div>
@endsection
