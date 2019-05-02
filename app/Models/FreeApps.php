<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeApps extends Model
{
    protected $casts = [
        'musicid1' => 'array',
        'catid1' => 'array'
    ];




    public function getReleaseDate($value){
        return substr($value,0,10);
    }
}