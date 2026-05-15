<?php

namespace App\Strategies\Peso;

class AlgoritmoRegresionLineal implements EstimacionPesoStrategy
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion
    {
        $perimetro = (float) ($datosEntrada['perimetro_toracico'] ?? 0);
        $largo = (float) ($datosEntrada['largo_corporal'] ?? 0);
        $pesoKg = ($perimetro * $largo) / 100;

        return new ResultadoEstimacion($pesoKg, 82.0, 'Regresion Lineal');
    }
}
