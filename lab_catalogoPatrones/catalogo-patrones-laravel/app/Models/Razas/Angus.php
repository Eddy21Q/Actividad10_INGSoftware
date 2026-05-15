<?php

namespace App\Models\Razas;

class Angus extends Raza
{
    public function nombre(): string
    {
        return 'Angus';
    }

    public function descripcion(): string
    {
        return 'Raza bovina reconocida por calidad carnica y adaptacion productiva.';
    }
}

