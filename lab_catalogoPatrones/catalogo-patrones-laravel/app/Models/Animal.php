<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'arete',
        'codigo',
        'rancho_id',
        'raza',
        'sexo',
        'fecha_nacimiento',
    ];

    public function registrosPeso()
    {
        return $this->hasMany(RegistroPeso::class);
    }
}
