<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Article;
use App\Models\Archetype;
use App\Models\Card;
use App\Models\Deck;
use App\Models\Guide;
use App\Models\TierList;

/*
|--------------------------------------------------------------------------
| CARDS
|--------------------------------------------------------------------------
*/

Route::get('/cards', function () {

    return Card::orderBy('name')->get();

});

Route::get('/cards/search', function (Request $request) {

    return Card::query()

        ->when($request->filled('q'), function ($query) use ($request) {

            $query->where(
                'name',
                'like',
                '%' . $request->q . '%'
            );

        })

        ->orderBy('name')

        ->get();

});

Route::get('/cards/{card}', function (Card $card) {

    return $card->load('decks');

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

/*
|--------------------------------------------------------------------------
| DECKS
|--------------------------------------------------------------------------
*/

Route::get('/decks', function () {

    return Deck::with(
        'guides',
        'cards'
    )->get();

});

Route::get('/decks/{deck}', function (Deck $deck) {

    return $deck->load(
        'guides',
        'cards'
    );

});

/*
|--------------------------------------------------------------------------
| ARCHETYPES
|--------------------------------------------------------------------------
*/

Route::get('/archetypes', function () {

    return Archetype::withCount('decks')

        ->orderBy('name')

        ->get();

});

Route::get('/archetypes/{archetype}', function (Archetype $archetype) {

    return $archetype->load(
        'decks'
    );

});

/*
|--------------------------------------------------------------------------
| GUIDES
|--------------------------------------------------------------------------
*/

Route::get('/guides', function () {

    return Guide::latest()->get();

});

/*
|--------------------------------------------------------------------------
| ARTICLES
|--------------------------------------------------------------------------
*/

Route::get('/articles', function () {

    return Article::latest()->get();

});

/*
|--------------------------------------------------------------------------
| TIER LISTS
|--------------------------------------------------------------------------
*/

Route::get('/tierlists', function () {

    return TierList::with(

        'items.archetype',

        'items.featuredCard'

    )->get();

});