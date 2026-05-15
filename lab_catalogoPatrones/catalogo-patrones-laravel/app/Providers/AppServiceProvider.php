<?php

namespace App\Providers;

use App\Factories\Contracts\IRazaFactory;
use App\Factories\RazaFactory;
use App\Models\RegistroPeso;
use App\Observers\RegistroPesoObserver;
use App\Repositories\Contracts\AnimalRepositoryInterface;
use App\Repositories\EloquentAnimalRepository;
use App\Strategies\Peso\EstimacionPesoStrategy;
use App\Strategies\Peso\RegresionStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(IRazaFactory::class, function (): RazaFactory {
            return new RazaFactory(config('razas'));
        });

        $this->app->bind(AnimalRepositoryInterface::class, EloquentAnimalRepository::class);
        $this->app->bind(EstimacionPesoStrategy::class, RegresionStrategy::class);
    }

    public function boot(): void
    {
        RegistroPeso::observe(RegistroPesoObserver::class);
    }
}
