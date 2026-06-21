<?php

namespace App\Http\Controllers;

use App\Models\Archetype;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredArchetypes = Archetype::query()
            ->withCount('decks')
            ->latest()
            ->take(6)
            ->get();

        return view('home', [
            'featuredArchetypes' => $featuredArchetypes,
        ]);
    }
}