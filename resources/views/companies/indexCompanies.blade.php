@extends('admin.layouts.app')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>

    <div class="card uper">
        <div class="card-header">
            <a href="{{ route('companies.createCompanies') }}" class="btn btn-primary">Add new company</a>
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
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Logo</td>
                        <td>Website</td>
                        <td colspan="3">Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->Name }}</td>
                            <td>{{ $company->Email }}</td>
                            <td>{{ $company->Logo }}</td>
                            <td>{{ $company->Website }}</td>
                            <td><a href="{{ route('companies.editCompanies',$company->Name) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{ route('companies.showCompanies', $company->Name) }}" class="btn btn-primary">Show</a></td>
                            <td>
                                <form action="{{ route('companies.destroyCompanies',$company->Name) }}" method="post">
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
