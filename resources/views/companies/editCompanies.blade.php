@extends('admin.layouts.app')

@section('content')
    <style>
        .uper{
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Edit Company Info
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
                <form action="{{ route('companies.updateCompanies',$company->Name) }}">
                @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="company_name" value={{ $company->Name }} />
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="company_email" value={{ $company->Email }} />
            </div>

            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" class="form-control" name="logo" id="company_logo" onchange="loadPreview(this)" />
                <img id="preview" src="{{ $company->Logo }}" alt="">
            </div>

            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" name="website" id="company_website" value={{ $company->Website }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <script>
        function loadPreview(input,id){
            id = id || '#preview';
            if(input.files && input.files[0]){
                var reader = new FileReader();

                reader.onload = function (e){
                    $(id)
                        .attr('src',e.target.result)
                        .width(200)
                        .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
