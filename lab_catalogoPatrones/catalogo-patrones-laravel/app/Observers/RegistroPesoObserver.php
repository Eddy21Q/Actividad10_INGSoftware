<?php

namespace App\Observers;

use App\Models\RegistroPeso;

class RegistroPesoObserver
{
    public function __construct(
        private RegistroPesoSubject $subject
    ) {
    }

    public function saved(RegistroPeso $registroPeso): void
    {
        $this->subject->notificar($registroPeso);
    }
}

