<?php

use App\Http\Controllers\PatternController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PatternController::class, 'index'])->name('patterns.index');

