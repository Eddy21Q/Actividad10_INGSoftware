<?php

namespace App\Http\Controllers;

use App\Factories\Contracts\IRazaFactory;
use Illuminate\View\View;

class RazaController extends Controller
{
    public function show(string $nombreRaza, IRazaFactory $razaFactory): View
    {
        $raza = $razaFactory->create($nombreRaza);

        return view('razas.show', compact('raza'));
    }
}

