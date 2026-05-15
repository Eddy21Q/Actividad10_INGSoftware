<?php

namespace App\Models\Razas;

class Brahman extends Raza
{
    public function nombre(): string
    {
        return 'Brahman';
    }

    public function descripcion(): string
    {
        return 'Raza bovina resistente al calor, comun en sistemas tropicales.';
    }
}

