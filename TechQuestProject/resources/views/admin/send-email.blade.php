@extends('layouts.admin-master')
@section('title', 'Send Email')


@section('content')
<div id="content">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ Auth::user()->fname ." " .Auth::user()->lname }}</h1>
    <p class="mb-4"><i>Send Email</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">{{ Auth::user()->fname ." " .Auth::user()->lname }}</h6>
            <h6 class="float-right d-inline"><b><a href="{{ route('admin.dashboard') }}" class="text-danger">{{ __('<-- Back') }}</a></b></h6>
        </div>
        <div class="card-body">
            <div class="container">
                @if ($message = Session::get('success'))
                <div class="alert alert-success  alert-dismissible">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger  alert-dismissible">
                <strong>{{ $message }}</strong>
            </div>
        @endif
                <form action="{{ route('admin.post-email') }}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="email">{{ __('Recipient Email:') }}</label>
                            <input type="email" name="email" placeholder="Insert email address" class="form-control" id="email" value="">
                        </div>
                        <div class="col-12 form-group">
                            <label for="lname">{{ __('Subject') }}</label>
                            <input type="text" name="subject" placeholder="Insert mail subjet" class="form-control" id="subject" value="">
                        </div>

                        <div class="col-12 form-group">
                            <label for="office">{{ __('Message') }}</label>
                            <textarea class="form-control" placeholder="Type your message here..." rows="6" name="body" id="body"></textarea>
                        </div>


                        <div class="">
                            <button type="submit" class="btn btn-danger float-right">Send Email</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
@endsection