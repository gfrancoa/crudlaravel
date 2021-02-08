@extends('admin.layouts.app')

@section('content')

<style>
    .uper {
        margin-top: 40px;
    }
</style>

    <div class="card uper">
        <div class="card-header">
            View Post
            <a href="{{ route('companies.indexCompanies') }}" class="btn btn-primary">Back</a>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $company->Name }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>E-mail:</strong>
                        {{ $company->Email }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Logo:</strong>
                        {{ $company->Logo }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Website:</strong>
                        {{ $company->Website }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
