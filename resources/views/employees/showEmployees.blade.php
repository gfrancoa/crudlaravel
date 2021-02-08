@extends('layouts.app')

@section('content')

<style>
    .uper {
        margin-top: 40px;
    }
</style>

    <div class="card uper">
        <div class="card-header">
            View Post
            <a href="{{ route('employees.indexEmployees') }}" class="btn btn-primary">Back</a>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First name:</strong>
                        {{ $employee->FirstName }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        {{ $employee->LastName }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company:</strong>
                        {{ $employee->Company }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>E-mail:</strong>
                        {{ $employee->Email }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        {{ $employee->Phone }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
