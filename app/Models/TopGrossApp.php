<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopGrossApp extends Model
{
    protected $fillable = ['bigimage', 'musicid', 'imname'];

    protected $casts = [
        'musicid' => 'array'
    ];


}
