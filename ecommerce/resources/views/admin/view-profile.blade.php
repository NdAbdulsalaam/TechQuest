@extends('/admin.layouts.master')
@section('title', 'Staff Profile')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('Staffs information') }}</h1>
<p class="mb-4"><b><i>{{ __('Profile') }}</i></b></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-danger d-inline float-left"><b>{{ $users->name }}</b> -> Role: {{ $users->role }}</h2>
        <h6 class="d-inline float-right text-danger"><b><a href="{{ url('/admin/staffs') }}">{{ __('<-- Back') }}</a></b></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>Name</th>
                        <td>{{ $users->name }}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>{{ $users->position }}</td>
                    </tr>
                    <tr>
                        <th>Office</th>
                        <td>{{ $users->office }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>{{ $users->age }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $users->email }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $users->startdate }}</td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td>{{ $users->salary }}</td>
                    </tr>
                    <tr>
                        <th>Account Date</th>
                        <td>{{ $users->created_at }}</td>
                    </tr>
            </table>
        </div>
    </div>
</div>

</div>
@endsection