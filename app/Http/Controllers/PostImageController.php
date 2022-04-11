<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Session\Session;

class PostImageController extends Controller
{
    public function upload(Request $request){
       $images = new Image();
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
    public function gameUpdate(Request $request){
       
       return redirect()->back();
    }
}
