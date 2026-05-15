<?php

namespace App\Repositories\Contracts;

use App\Models\Animal;
use Illuminate\Support\Collection;

interface AnimalRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Animal;

    public function save(Animal $animal): Animal;
}

