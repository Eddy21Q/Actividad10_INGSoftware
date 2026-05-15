<?php

namespace App\Repositories;

use App\Models\Animal;
use App\Repositories\Contracts\IAnimalRepository;
use Illuminate\Support\Collection;

class EloquentAnimalRepository implements IAnimalRepository
{
    public function findByArete(string $arete): ?Animal
    {
        return Animal::query()
            ->where('arete', $arete)
            ->first();
    }

    public function findAllByRancho(int $ranchoId): Collection
    {
        return Animal::query()
            ->where('rancho_id', $ranchoId)
            ->with('registrosPeso')
            ->get();
    }

    public function save(Animal $animal): void
    {
        $animal->save();
    }
}
