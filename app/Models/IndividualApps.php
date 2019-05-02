<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualApps extends Model
{
    protected $casts = [
        'artist_id' => 'array',
        'genre_ids' => 'array',
        'screenshots' => 'array'
    ];
}
