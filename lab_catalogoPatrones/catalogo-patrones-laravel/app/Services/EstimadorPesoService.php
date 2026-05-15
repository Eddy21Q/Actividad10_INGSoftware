<?php

namespace App\Services;

use App\Strategies\Peso\IAlgoritmoEstimacion;
use App\Strategies\Peso\ResultadoEstimacion;

class EstimadorPesoService
{
    public function __construct(
        private IAlgoritmoEstimacion $algoritmo
    ) {
    }

    public function estimar(array $datos): ResultadoEstimacion
    {
        return $this->algoritmo->ejecutar($datos);
    }
}

