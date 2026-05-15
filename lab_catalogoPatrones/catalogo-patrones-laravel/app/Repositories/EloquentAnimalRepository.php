<?php

namespace App\Repositories;

use App\Models\Animal;
use App\Repositories\Contracts\AnimalRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentAnimalRepository implements AnimalRepositoryInterface
{
    public function all(): Collection
    {
        return Animal::query()->latest()->get();
    }

    public function find(int $id): ?Animal
    {
        return Animal::query()->find($id);
    }

    public function save(Animal $animal): Animal
    {
        $animal->save();

        return $animal;
    }
}

