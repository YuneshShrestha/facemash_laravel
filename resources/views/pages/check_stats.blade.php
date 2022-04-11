@extends('index')
@section('content')
    {{-- <p>Arra</p> --}}
    <div class="row gy-2">
        @foreach ($image as $item)
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px; height: 120px;">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{  asset($item->filename) }}" class="img-fluid rounded-start" alt="img" style="height: 120px; object-fit: cover; width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" >
                                <h5 class="card-title">{{ $item->title }}</h5>
                                
                                <p class="card-text text-secondary" style="font-size: 14px;">
                                    Score: {{ $item->score }} <br>
                                    Wins: {{ $item->wins }} <br>
                                    Losses: {{ $item->losses }} 
                                </p>
                              
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

        @endforeach
    </div>
    
@endsection