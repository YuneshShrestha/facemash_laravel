<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Image::count();
        $num1 = rand(1, $count);
        $num2 = rand(1, $count);
        if($num1 == $num2){
            if($num2 == $count){
                $num2 = $num2 - 1;
           }
           else{
                $num2 = $num2 + 1;
           }
        }
        $image1 = Image::where('id', $num1)->first();
        $image2 = Image::where('id', $num2)->first();
        return view('pages.main', compact('image1', 'image2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.upload');
    }
    public function gameScore(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     return 'Hello';
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'Hello';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game = new Game();
       $losser_image = Image::find($request->looser_id);

       $winner_image = Image::find($request->winner_id);
      //  return $winner_image;
       $winner_image->wins = $winner_image->wins + 1;
       $losser_image->losses = $losser_image->losses + 1;
       $expected = $game->expected($winner_image->score, $losser_image->score);
       $winner_image->score = $game->win($winner_image->score, $expected);
       $losser_image->score = $game->loss($losser_image->score, $expected);
       $winner_rank = $game->rank($winner_image->score, $winner_image->losses, $winner_image->wins);
       $losser_rank = $game->rank($losser_image->score, $losser_image->losses, $losser_image->wins);
       $winner_image->rank = $winner_rank;
       $losser_image->rank = $losser_rank;
       $winner_image->save();
      $losser_image->save();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function checkStats(){
        $image = Image::orderBy('rank','desc')->get();
        return view('pages.check_stats',compact('image'));
    }
}
