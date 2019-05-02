<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestApps extends Model
{
    protected $casts = [
        'musicid1' => 'array',
        'catid1' => 'array'
    ];




    public function getReleaseDate($value){
        return substr($value,0,10);
    }



//    public function getMusicIdAttribute($value)
//    {
//        $value = str_replace("/id/","xxx",$value);
//        return $value = explode('/id', $value);
//    }
}
