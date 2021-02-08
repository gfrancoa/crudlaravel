@extends('admin.layouts.app')

@section('content')
    <style>
        .uper{
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Create Company
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
                <form method="post" action="{{ route('companies.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" class="form-control" name="logo" id="logo" onchange="loadPreview(this);">
                        <img id="preview" src="https://images.squarespace-cdn.com/content/v1/54f4e4eae4b0d713c240e311/1453914132949-2I3Q0KCGB1CF3Z9JD4YZ/ke17ZwdGBToddI8pDm48kKmw982fUOZVIQXHUCR1F55Zw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpw5XnxLBmEFHJGf_0qFdDpmIncOw4kq9OpCHNTYqzGO-E1YJr-Thht9Tdog4YtCwrE/Imagehere.jpg" alt="" width="200" height="150">
                    </div>
                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control" name="website" id="website">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
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
