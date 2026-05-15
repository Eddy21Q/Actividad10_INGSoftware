<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\View\View;

class PatternController extends Controller
{
    public function index(): View
    {
        $patterns = Pattern::query()->latest()->get();

        return view('patterns.index', compact('patterns'));
    }
}

