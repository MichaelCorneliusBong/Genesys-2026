<?php

use Illuminate\Support\Facades\Route;
use App\Models\Deck;
use App\Models\Card;
use App\Models\Guide;

Route::get('/decks', function () {
    return Deck::with('guides', 'cards')->get();
});

Route::get('/decks/{deck}', function (Deck $deck) {
    return $deck->load(
        'guides',
        'cards'
    );
});

Route::get('/cards', function () {
    return Card::all();
});

Route::get('/guides', function () {
    return Guide::all();
});

Route::get('/cards/{card}/synergy', function (Card $card) {

    $relatedCards = Card::query()
        ->whereHas('decks', function ($query) use ($card) {

            $query->whereIn(
                'decks.id',
                $card->decks->pluck('id')
            );

        })
        ->where('cards.id', '!=', $card->id)
        ->withCount([
            'decks as synergy_count' => function ($query) use ($card) {

                $query->whereIn(
                    'decks.id',
                    $card->decks->pluck('id')
                );

            }
        ])
        ->orderByDesc('synergy_count')
        ->take(10)
        ->get();

    return [
        'searched_card' => $card->name,
        'results' => $relatedCards,
    ];
});