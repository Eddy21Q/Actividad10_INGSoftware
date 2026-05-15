<?php

namespace Database\Seeders;

use App\Models\Pattern;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Pattern::create([
            'name' => 'Singleton',
            'category' => 'Creacional',
            'intent' => 'Garantizar una unica instancia y dar un punto global de acceso.',
            'problem' => 'Se necesita controlar la creacion de una clase compartida.',
            'solution' => 'Ocultar el constructor y exponer un metodo estatico de acceso.',
            'example' => 'Configuracion global de la aplicacion.',
        ]);
    }
}

