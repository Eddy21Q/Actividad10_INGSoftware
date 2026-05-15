<?php

namespace App\Factories;

use App\Factories\Contracts\IRazaFactory;
use App\Models\Razas\Raza;
use InvalidArgumentException;

class RazaFactory implements IRazaFactory
{
    public function __construct(
        private array $razas
    ) {
    }

    public function create(string $nombreRaza): Raza
    {
        $key = strtolower(trim($nombreRaza));

        if (! array_key_exists($key, $this->razas)) {
            throw new InvalidArgumentException("Raza no soportada: {$nombreRaza}");
        }

        $razaClass = $this->razas[$key];

        return new $razaClass();
    }
}

