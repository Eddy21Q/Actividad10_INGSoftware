<?php

namespace App\Observers;

use App\Models\RegistroPeso;
use App\Observers\Contracts\IRegistroPesoObserver;

class RecalculadorICC implements IRegistroPesoObserver
{
    public array $registrosProcesados = [];

    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        $this->registrosProcesados[] = [
            'animal_id' => $registro->animal_id,
            'icc' => $registro->icc,
        ];
    }
}
