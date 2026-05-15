<?php

namespace App\Observers\Contracts;

use App\Models\RegistroPeso;

interface IRegistroPesoObserver
{
    public function onPesoRegistrado(RegistroPeso $registro): void;
}
