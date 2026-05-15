<?php

namespace App\Providers;

use App\Factories\Contracts\IRazaFactory;
use App\Factories\RazaFactory;
use App\Models\RegistroPeso;
use App\Observers\ActualizadorDashboard;
use App\Observers\NotificadorPropietario;
use App\Observers\RecalculadorICC;
use App\Observers\RegistroPesoObserver;
use App\Observers\RegistroPesoSubject;
use App\Observers\WebhookSenasa;
use App\Repositories\Contracts\IAnimalRepository;
use App\Repositories\EloquentAnimalRepository;
use App\Strategies\Peso\AlgoritmoRegresionLineal;
use App\Strategies\Peso\EstimacionPesoStrategy;
use App\Strategies\Peso\IAlgoritmoEstimacion;
use App\Strategies\Peso\RegresionStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(IRazaFactory::class, function (): RazaFactory {
            return new RazaFactory(config('razas'));
        });

        $this->app->bind(IAnimalRepository::class, EloquentAnimalRepository::class);
        $this->app->bind(IAlgoritmoEstimacion::class, AlgoritmoRegresionLineal::class);
        $this->app->bind(EstimacionPesoStrategy::class, RegresionStrategy::class);

        $this->app->singleton(RegistroPesoSubject::class, function (): RegistroPesoSubject {
            $subject = new RegistroPesoSubject();
            $subject->suscribir(new NotificadorPropietario());
            $subject->suscribir(new ActualizadorDashboard());
            $subject->suscribir(new RecalculadorICC());
            $subject->suscribir(new WebhookSenasa());

            return $subject;
        });
    }

    public function boot(): void
    {
        RegistroPeso::observe(RegistroPesoObserver::class);
    }
}
