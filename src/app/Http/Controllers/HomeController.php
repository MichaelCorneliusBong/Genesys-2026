<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredDecks = Deck::query()
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', [
            'featuredDecks' => $featuredDecks,
        ]);
    }
}