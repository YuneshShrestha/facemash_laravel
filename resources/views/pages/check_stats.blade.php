@extends('index')
@section('content')
    {{-- <p>Arra</p> --}}
    @if($image->isEmpty())
        <div>
            <div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
                <div>
                    <h1>No Images Found</h1><br>
                    <p>Please upload some images to the database</p>
                </div>
            </div>
        </div>
    @else
        <div>
            <div class="row gy-2">
            @foreach ($image as $count=>$item)
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 540px; height: 140px;">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{  asset($item->filename) }}" class="img-fluid rounded-start" alt="img" style="height: 140px; object-fit: cover; width: 100%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body" >
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    
                                    <p class="card-text text-secondary" style="font-size: 14px;">
                                        Rank: {{ ++$count }}<br>
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
        </div>
    @endif
@endsection