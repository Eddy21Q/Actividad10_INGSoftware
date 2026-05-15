<?php

namespace App\Observers;

use App\Models\RegistroPeso;
use App\Observers\Contracts\IRegistroPesoObserver;

class AlertaSMS implements IRegistroPesoObserver
{
    public array $mensajes = [];

    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        $this->mensajes[] = "SMS: nuevo peso {$registro->peso} para animal {$registro->animal_id}.";
    }
}
