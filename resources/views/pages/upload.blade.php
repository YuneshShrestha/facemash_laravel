@extends('index')
@section('content')
    <div class="center">
       @if (session('slug'))
            <div class="alert alert-success">
               Your data is saved with unique title {{ session('slug') }}.
            </div>
       @endif           
        <div class="card">
            <div class="card-body justify-content-center align-items-center">
                <form action="/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{ method_field('PUT') }} --}}
                    <div class="form-group mb-2">
                        <label for="name">Image Name:</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Upload Image:</label>
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
    
                </form>
            </div>
        </div>
    </div>

   
@endsection