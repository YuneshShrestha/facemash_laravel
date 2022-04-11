@extends('index')
@section('content')
    @if(!($image1->isNotEmpty()) && !($image2->isNotEmpty()))
        <div class="center">
            <div class="vertical-center">
                <h1>No Images Found</h1>
                <p>Please upload some images to the database</p>
            </div>
        </div>
    @else
        
    <form action="/gameUpdate/" method="POST">
       
        @csrf
         @method('put')
        <input type="text" class="winner_id" name="winner_id" hidden>
        <input type="text" class="looser_id" name="looser_id" hidden>
        <div class="row vertical-center">
            <div class="col-md-6">
                <div class="card player1 display_none">
                    <div style="width: 100%; min-height: 55vh; background-image: url('{{ asset($image1->filename) }}'); background-size:cover;"></div>
                    
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="player1_id d-none">{{ $image1->id }}</p>
                            <p style="font-size: 18px;">{{ $image1->title }}</p>
                            <p class="text-secondary">Score: {{ $image1->score }}</p>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" style="background-color: transparent; float:right; border:none;" class="like1">
                                <i class="fa-regular fa-heart" style="font-size: 30px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="card player2 display_none">
                    <div style="width: 100%; min-height: 55vh; background-image: url('{{ asset($image2->filename) }}'); background-size:cover;"></div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <p class="player2_id d-none">{{ $image2->id }}</p>
                            <p style="font-size: 18px;">{{ $image2->title }}</p>
                            <p class="text-secondary">Score: {{ $image2->score }}</p>
                            
                        </div>
                        <div class="col-md-6">
                            <button type="submit" style="background-color: transparent; float:right; border:none;" class="like2">
                                <i class="fa-regular fa-heart" style="font-size: 30px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
    </form>
    @endif
@endsection