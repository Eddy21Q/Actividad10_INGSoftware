<?php

namespace App\Observers;

use App\Models\RegistroPeso;
use App\Observers\Contracts\IRegistroPesoObserver;

class RegistroPesoSubject
{
    /**
     * @var array<string, IRegistroPesoObserver>
     */
    private array $observadores = [];

    public function suscribir(IRegistroPesoObserver $observador): void
    {
        $this->observadores[spl_object_hash($observador)] = $observador;
    }

    public function desuscribir(IRegistroPesoObserver $observador): void
    {
        unset($this->observadores[spl_object_hash($observador)]);
    }

    public function notificar(RegistroPeso $registro): void
    {
        foreach ($this->observadores as $observador) {
            $observador->onPesoRegistrado($registro);
        }
    }
}
