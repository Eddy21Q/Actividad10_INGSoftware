<?php

namespace App\Strategies\Peso;

class AlgoritmoYolov8 implements EstimacionPesoStrategy
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion
    {
        $pesoKg = (float) ($datosEntrada['peso_estimado'] ?? 0);
        $confianza = (float) ($datosEntrada['confianza'] ?? 91.0);

        return new ResultadoEstimacion($pesoKg, $confianza, 'YOLOv8');
    }
}
