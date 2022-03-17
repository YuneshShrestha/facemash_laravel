<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;

class Image extends Model
{  
    use HasFactory;
    use Sluggable;
    // : array means return method should be an array
    public function sluggable(): array
    {
        return [
            'title' => [
                // what field to use for slug is source
                'source' => 'name'
            ]
        ];
    }
}
