<?php

namespace App\Models\Razas;

class Nelore extends Raza
{
    public function nombre(): string
    {
        return 'Nelore';
    }

    public function descripcion(): string
    {
        return 'Raza bovina cebuina usada para produccion de carne y rusticidad.';
    }
}

