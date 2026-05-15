<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'codigo',
        'raza',
        'sexo',
        'fecha_nacimiento',
    ];
}

