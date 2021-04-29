@extends('layouts.master')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Create</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Create User</h5><br>

                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="name" name="name" placeholder="Enter User Name"
                                            value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" id="email" name="email" placeholder="Enter User Email"
                                            value="{{ old('email') }}" type="email">

                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input class="form-control" id="password" name="password" placeholder="Enter User Password" value="{{ old('password') }}" type="password">

                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                        <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password" value="{{ old('password_confirmation') }}" type="password">


                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
