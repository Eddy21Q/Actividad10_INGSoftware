<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table): void {
            $table->id();
            $table->string('arete')->unique();
            $table->string('codigo')->nullable();
            $table->unsignedBigInteger('rancho_id');
            $table->string('raza');
            $table->string('sexo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};

