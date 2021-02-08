@extends('layouts.app')

@section('content')
    <style>
        .uper{
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Edit Employee Info
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br>
            @endif
                <form action="{{ route('employees.updateEmployees',$employee->id) }}">
                @csrf
            @method('PUT')

            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" name="firstname" id="employee_firstname" value={{ $employee->FirstName }} />
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" name="lastname" id="employee_lastname" value={{ $employee->LastName }} />
            </div>

            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" class="form-control" name="company" id="employee_company" value={{ $employee->Company }} />
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="employee_email" value={{ $employee->Email }} />
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" id="employee_phone" value={{ $employee->Phone }} />
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
