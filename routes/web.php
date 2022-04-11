<?php

// use App\Models\Image;

use App\Http\Controllers\GameController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostImageController;
use App\Models\Game;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::model('images','App\Models\Image');
Route::get('/', [ImageController::class,'index']);
Route::post('/upload', [PostImageController::class, 'upload']);
Route::match(['put', 'patch'], '/gameUpdate',[PostImageController::class, 'gameUpdate']);
// Route::put('', );
Route::resource('/images', ImageController::class);
Route::resource('/game', GameController::class);
