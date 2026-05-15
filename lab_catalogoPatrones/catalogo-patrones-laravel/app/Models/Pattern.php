<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    protected $fillable = [
        'name',
        'category',
        'intent',
        'problem',
        'solution',
        'example',
    ];
}

