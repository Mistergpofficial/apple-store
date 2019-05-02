<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedApps extends Model
{
    protected $fillable = ['artist_name', 'track_name', 'image', 'track_id', 'average_user_rating', 'user_rating_counting', 'release_date', 'genres', 'description'];



//    public function getTrackNameAttribute($value)
//    {
//        return strtolower($value);
//    }
    public function getDescription($value){
        return strip_tags($value);
       // return substr($value,0,330);
    }
    public function getReleaseDate($value){
        return substr($value,0,10);
    }
}
