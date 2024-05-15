@extends('/admin.layouts.master')
@section('title', 'Staffs Information')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('Staffs information') }}</h1>
<p class="mb-4"><b><i>{{ __('Profile') }}</i></b></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger d-inline float-left"><b>{{ __('TechQuest Stem Academy') }}</b></h6>
        <a href="{{ url('/admin/add-staff') }}"><button class="btn btn-danger float-right"><i class="fa fa-plus mr-2"></i>{{ __('Add Staff') }}</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->position }}</td>
                        <td>{{ $user->office }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->startdate }}</td>
                        <td>{{ $user->salary }}</td>
                        <td><a href="{{ url('/admin/view-profile/'.$user->id) }}" class="fa fa-eye text-danger mr-3"></a> <a href="#" class="fa fa-trash text-danger"></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection