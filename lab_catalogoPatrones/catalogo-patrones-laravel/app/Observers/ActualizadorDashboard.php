<?php

namespace App\Observers;

use App\Models\RegistroPeso;
use App\Observers\Contracts\IRegistroPesoObserver;

class ActualizadorDashboard implements IRegistroPesoObserver
{
    public array $eventos = [];

    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        $this->eventos[] = [
            'animal_id' => $registro->animal_id,
            'peso' => $registro->peso,
            'metodo' => $registro->metodo,
        ];
    }
}
