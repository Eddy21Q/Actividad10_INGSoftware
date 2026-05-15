<?php

namespace App\Observers;

use App\Models\RegistroPeso;

class RegistroPesoObserver
{
    public function saved(RegistroPeso $registroPeso): void
    {
        // Centraliza efectos secundarios: notificar, actualizar dashboard, recalcular ICC y webhooks.
    }
}

