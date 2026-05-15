<?php

namespace App\Strategies\Peso;

class RegresionStrategy implements EstimacionPesoStrategy
{
    public function estimar(array $datos): float
    {
        $perimetro = (float) ($datos['perimetro_toracico'] ?? 0);
        $largo = (float) ($datos['largo_corporal'] ?? 0);

        return ($perimetro * $largo) / 100;
    }
}

