<?php

namespace App\Strategies\Peso;

class AlgoritmoTablaReferencia implements EstimacionPesoStrategy
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion
    {
        $pesoKg = (float) ($datosEntrada['peso_tabla'] ?? 0);

        return new ResultadoEstimacion($pesoKg, 68.0, 'Tabla de Referencia');
    }
}
