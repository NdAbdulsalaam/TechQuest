@extends('layouts.admin-master')
@section('title', 'Staffs Information')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('Staffs information') }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger d-inline float-left"><b>{{ __('TechQuest Academy') }}</b></h6>
        <a href="{{ route('admin.add-user') }}"><button class="btn btn-danger float-right"><i class="fa fa-plus mr-2"></i>{{ __('Add Staff') }}</button></a>
    </div>

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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined On</th>
                        <th>Last Update</th>
                        <!-- New columns -->
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <!-- End of new columns -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Staff ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined On</th>
                        <th>Last Update</th>
                        <!-- New columns -->
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <!-- End of new columns -->
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users->reverse() as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <!-- New columns -->
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->position }}</td>
                        <td>{{ $user->office }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->salary }}</td>
                        <!-- End of new columns -->
                        <td>
                            <a href="{{ route('admin.view-user', $user->id ) }}" class="fa fa-eye text-danger mr-3"></a>
                            <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none; color: inherit; cursor: pointer; padding: 0;">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </form>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection
