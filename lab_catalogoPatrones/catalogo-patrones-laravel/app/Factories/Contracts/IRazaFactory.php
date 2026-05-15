<?php

namespace App\Factories\Contracts;

use App\Models\Razas\Raza;

interface IRazaFactory
{
    public function create(string $nombreRaza): Raza;
}

