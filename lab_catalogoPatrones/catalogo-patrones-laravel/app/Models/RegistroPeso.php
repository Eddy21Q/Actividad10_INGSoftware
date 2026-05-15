<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroPeso extends Model
{
    protected $table = 'registros_peso';

    protected $fillable = [
        'animal_id',
        'peso',
        'metodo',
        'icc',
        'observaciones',
    ];
}

