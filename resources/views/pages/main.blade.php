@extends('index')
@section('content')
    
   <div>
    @if(empty($image1 && $image2) )
        <div>
            <div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
                <div>
                    <h1>No Images Found</h1><br>
                    <p>Please upload some images to the database</p>
                </div>
            </div>
        </div>
    @else        
        <form action="images/1" method="POST">
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
   </div>
   <div class="mt-2">
       <p>Top Images:</p>
       {{-- <p>{{ $topimages }}</p> --}}
       @if($topimages->isEmpty())
        <div class="text-center">
            <p>Sorry Images Cannot Be Ranked.</p>
        </div>
            
       @else
            <div class="top_items_flex">
                @foreach ($topimages as $count=>$item)
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-4">
                                <img src="{{  asset($item->filename) }}" class="img-fluid rounded-start" alt="img" style="height: 140px; object-fit: cover; width: 100%;">
                            </div>
                            <div class="col-8">
                                <div class="card-body" >    
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    
                                    <p class="card-text text-secondary" style="font-size: 14px;">
                                        @if($count==0)
                                            <?php 
                                                $score = 0;
                                                $wins = 0;
                                                $losses = 0;
                                                $count = $count+1;
                                            ?>
                                        @elseif ($item->score!=$score || $item->wins!=$wins || $item->losses!=$losses)
                                            <?php
                                                $count = $count+1;
                                            ?>
                                        @endif
                                            Position: {{$count }}<br>
                                            Score: {{ $item->score }} <br>
                                            Wins: {{ $item->wins }} <br>
                                            Losses: {{ $item->losses }} 
                                       
                                    </p>
                                    <?php 
                                        $score = $item->score;
                                        $wins = $item->wins;
                                        $losses = $item->losses;
                                    ?>
                                
                                </div>
                            </div>
                            </div>
                        </div>
                        <div style="width: 10px;"></div>
                @endforeach
            </div>
       @endif
   </div>
@endsection