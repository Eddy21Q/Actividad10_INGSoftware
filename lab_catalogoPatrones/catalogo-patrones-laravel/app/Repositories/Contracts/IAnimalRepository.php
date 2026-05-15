<?php

namespace App\Repositories\Contracts;

use App\Models\Animal;
use Illuminate\Support\Collection;

interface IAnimalRepository
{
    public function findByArete(string $arete): ?Animal;

    public function findAllByRancho(int $ranchoId): Collection;

    public function save(Animal $animal): void;
}

