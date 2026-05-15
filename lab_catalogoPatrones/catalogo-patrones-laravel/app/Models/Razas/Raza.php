<?php

namespace App\Models\Razas;

abstract class Raza
{
    abstract public function nombre(): string;

    abstract public function descripcion(): string;
}

