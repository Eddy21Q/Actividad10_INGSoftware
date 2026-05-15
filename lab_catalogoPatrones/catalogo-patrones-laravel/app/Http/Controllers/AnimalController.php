<?php

namespace App\Http\Controllers;

use App\Factories\Contracts\IRazaFactory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalController extends Controller
{
    public function create(Request $request, IRazaFactory $razaFactory): View
    {
        $raza = $razaFactory->create($request->string('raza', 'brahman')->toString());

        return view('animals.create', compact('raza'));
    }
}

