<?php

namespace App\Strategies\Peso;

class Yolov8Strategy implements EstimacionPesoStrategy
{
    public function estimar(array $datos): float
    {
        return (float) ($datos['peso_estimado'] ?? 0);
    }
}

