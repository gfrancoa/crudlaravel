@extends('layouts.app')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>

    <div class="card uper">
        <div class="card-header">
            <a href="{{ route('employees.createEmployees') }}" class="btn btn-primary">Add new employee</a>
        </div>
        <div class="card-body">
            @if(session())->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Company</td>
                        <td>E-mail</td>
                        <td>Phone</td>
                        <td colspan="3">Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->FirstName }}</td>
                            <td>{{ $employee->LastName }}</td>
                            <td>{{ $employee->Company }}</td>
                            <td>{{ $employee->E-mail }}</td>
                            <td>{{ $employee->Phone }}</td>
                            <td><a href="{{ route('employee.editEmployees',$employee->id) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('employees.showEmployees', $employee->id) }}" class="btn btn-primary">Show</a></td>
                            <td>
                                <form action="{{ route('employees.destroyEmployees',$employee->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
