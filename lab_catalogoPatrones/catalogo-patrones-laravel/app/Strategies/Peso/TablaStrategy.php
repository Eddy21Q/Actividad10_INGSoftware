<?php

namespace App\Strategies\Peso;

class TablaStrategy implements EstimacionPesoStrategy
{
    public function estimar(array $datos): float
    {
        return (float) ($datos['peso_tabla'] ?? 0);
    }
}

