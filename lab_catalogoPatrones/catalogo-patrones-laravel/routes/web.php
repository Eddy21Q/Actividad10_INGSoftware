<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\RazaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PatternController::class, 'index'])->name('patterns.index');
Route::get('/animales/crear', [AnimalController::class, 'create'])->name('animals.create');
Route::get('/razas/{nombreRaza}', [RazaController::class, 'show'])->name('razas.show');
