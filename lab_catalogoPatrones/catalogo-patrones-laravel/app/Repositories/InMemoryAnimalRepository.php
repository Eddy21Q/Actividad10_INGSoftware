<?php

namespace App\Repositories;

use App\Models\Animal;
use App\Repositories\Contracts\IAnimalRepository;
use Illuminate\Support\Collection;

class InMemoryAnimalRepository implements IAnimalRepository
{
    /**
     * @param array<int, Animal> $animals
     */
    public function __construct(
        private array $animals = []
    ) {
    }

    public function findByArete(string $arete): ?Animal
    {
        return collect($this->animals)
            ->first(fn (Animal $animal): bool => $animal->arete === $arete);
    }

    public function findAllByRancho(int $ranchoId): Collection
    {
        return collect($this->animals)
            ->filter(fn (Animal $animal): bool => (int) $animal->rancho_id === $ranchoId)
            ->values();
    }

    public function save(Animal $animal): void
    {
        $this->animals[] = $animal;
    }
}

