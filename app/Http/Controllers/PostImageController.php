<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Image;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Session\Session;

class PostImageController extends Controller
{
    public function upload(Request $request){
       $images = new Image();
       $request->validate([
            'image' => 'required|max:2048|mimes:jpeg,png,jpg',
            'name' => 'required',
        ]);
       if($request->hasFile('image')){
            $temp = $request->image;
            $name =  time() . $temp->getClientOriginalName();
            $temp->move('images/',$name);
            $images->filename = 'images/'.$name;
       }
    //    create slug params (class, field(DB column name), value(field value))
       $slug = SlugService::createSlug(Image::class, 'title', $request->name);
       $images->title = $slug;
       $images->save();
       return redirect('/images/create')->with('slug', $slug);
    }
   //  public function gameUpdate(Request $request){
   //     $game = new Game();
   //     $losser_image = Image::find($request->looser_id);

   //     $winner_image = Image::find($request->winner_id);
   //    //  return $winner_image;
   //     $winner_image->wins = $winner_image->wins + 1;
   //     $losser_image->losses = $losser_image->losses + 1;
   //     $winner_expected = $game->expected($losser_image->score, $winner_image->score);
   //     $looser_expected = $game->expected($winner_image->score, $losser_image->score);

   //     $winner_new_score = $game->win($winner_image->score, $winner_expected);
   //     $winner_image->score = $winner_new_score;

   //     $looser_new_score = $game->loss($losser_image->score, $looser_expected);
   //     $losser_image->score = $looser_new_score;
   //     dd($winner_new_score, $looser_new_score,$game->win($losser_image->score, $looser_expected));
   //     $winner_rank = $game->rank($winner_image->score, $winner_image->losses + 1, $winner_image->wins);
   //     $losser_rank = $game->rank($losser_image->score, $losser_image->losses + 1, $losser_image->wins);
   //     $winner_image->rank = $winner_rank;
   //     $losser_image->rank = $losser_rank;
   //     $winner_image->save();
   //    $losser_image->save();
   //     return redirect()->back();
   //  }
}
