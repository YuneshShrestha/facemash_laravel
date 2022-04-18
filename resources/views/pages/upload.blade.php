@extends('index')
@section('content')
    <div class="center mt-3">
                
        <div class="card">
            <div class="card-body justify-content-center align-items-center">
                @if (session('slug'))
                        <div class="alert alert-success">
                        Your data is saved with unique title {{ session('slug') }}.
                        </div>
                @endif 
                <form action="/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{ method_field('PUT') }} --}}
                    <div class="form-group mb-2">
                        <label for="name">Image Name:</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger" style="font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Upload Image:</label>
                        <input id="image" class="form-control-file" type="file" name="image" accept=".jpeg,.png,.jpg">
                        @error('image')
                            <p class="text-danger" style="font-size: 12px;">{{ $message }}</p>
                        @enderror   
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
    
                </form>
            </div>
        </div>
    </div>

   
@endsection