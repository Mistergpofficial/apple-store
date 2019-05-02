<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function getDescription($value){
        return substr($value,0,430);
    }

    protected $casts = [
        'search' => 'array',
    ];
}
