<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\View\View;

class DeckController extends Controller
{
    public function index(): View
    {
        $decks = Deck::query()
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        return view('decks.index', [
            'decks' => $decks,
        ]);
    }

    public function show(Deck $deck): View
    {
        $deck->load(
            'cards',
            'archetype'
        );

        $mainDeck = $deck->cards
            ->where('pivot.card_role', 'main');

        $extraDeck = $deck->cards
            ->where('pivot.card_role', 'extra');

        $sideDeck = $deck->cards
            ->where('pivot.card_role', 'side');

        return view('decks.show', [
            'deck' => $deck,
            'mainDeck' => $mainDeck,
            'extraDeck' => $extraDeck,
            'sideDeck' => $sideDeck,
        ]);
    }
}