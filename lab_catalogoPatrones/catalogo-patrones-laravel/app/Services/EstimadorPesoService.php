<?php

namespace App\Services;

use App\Strategies\Peso\EstimacionPesoStrategy;

class EstimadorPesoService
{
    public function __construct(
        private EstimacionPesoStrategy $strategy
    ) {
    }

    public function estimar(array $datos): float
    {
        return $this->strategy->estimar($datos);
    }
}

