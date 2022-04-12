<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public static function expected($Ra, $Rb)
    {
        return 1/(pow(10,($Ra-$Rb)/400)+1);
    }


    public static function win($rating, $expected)
    {
        return (int)($rating + 32*(1-$expected)); 
    }

    public static function loss($rating, $expected)
    {
        return (int)($rating + 32*(0-$expected)); 
    }

  
    public function rank($score, $losses, $wins)
    {
        if($score==0 || $wins==0){
            return 0;
        }
        return (int)($score / (1+(($losses+1)/$wins)));
    }
}
