<?php

namespace App\Observers;

use App\Models\RegistroPeso;
use App\Observers\Contracts\IRegistroPesoObserver;

class NotificadorPropietario implements IRegistroPesoObserver
{
    public array $notificaciones = [];

    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        $this->notificaciones[] = [
            'animal_id' => $registro->animal_id,
            'peso' => $registro->peso,
            'mensaje' => 'Peso registrado para notificar al propietario.',
        ];
    }
}
