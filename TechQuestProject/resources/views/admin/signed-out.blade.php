@extends('layouts.admin-master')
@section('title', 'Signed In and Out Staff')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-center text-gray-800">{{ __('Signed In and Out Staff') }}</h1>

        <!-- Signed Out Staff -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">{{ __('Signed Out Staff') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('First Name') }}</th>
                                    <th>{{ __('Last Name') }}</th>
                                    <th>{{ __('Username') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Location') }}</th>
                                    <th>{{ __('In') }}</th>
                                    <th>{{ __('Out') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($signedOutStaff as $user)
                                    <tr>
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->location }}</td>
                                        <td>
                                            @foreach($user->attendances as $attendance)
                                                {{ $attendance->check_in_time }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($user->attendances as $attendance)
                                                {{ $attendance->check_out_time }}<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
