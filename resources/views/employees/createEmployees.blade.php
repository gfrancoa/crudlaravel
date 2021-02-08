@extends('layouts.app')

@section('content')
    <style>
        .uper{
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Create Employee
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ error }}</li>
                        @endforeach
                    </ul>
                </div><br>
            @endif
                <form method="post" action="{{ route('employees.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="firstname">Name:</label>
                        <input type="text" class="form-control" name="firstname" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" class="form-control" name="company" id="company">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </form>
        </div>
    </div>
@endsection
