<?php

namespace App\Strategies\Peso;

interface IAlgoritmoEstimacion
{
    public function ejecutar(array $datosEntrada): ResultadoEstimacion;
}
