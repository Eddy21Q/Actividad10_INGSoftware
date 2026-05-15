<?php

namespace App\Strategies\Peso;

interface EstimacionPesoStrategy
{
    public function estimar(array $datos): float;
}

