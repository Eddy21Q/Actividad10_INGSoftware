<?php

namespace App\Observers;

use App\Models\RegistroPeso;
use App\Observers\Contracts\IRegistroPesoObserver;

class WebhookSenasa implements IRegistroPesoObserver
{
    public array $payloads = [];

    public function onPesoRegistrado(RegistroPeso $registro): void
    {
        $this->payloads[] = [
            'animal_id' => $registro->animal_id,
            'peso' => $registro->peso,
            'fecha_registro' => $registro->created_at?->toDateTimeString(),
        ];
    }
}
