<?php

namespace App\Services;

use App\Models\Animal;
use App\Repositories\Contracts\IAnimalRepository;
use Illuminate\Support\Collection;

class ReporteService
{
    public function __construct(
        private IAnimalRepository $animals
    ) {
    }

    public function buscarAnimalPorArete(string $arete): ?Animal
    {
        return $this->animals->findByArete($arete);
    }

    public function animalesDelRancho(int $ranchoId): Collection
    {
        return $this->animals->findAllByRancho($ranchoId);
    }
}

