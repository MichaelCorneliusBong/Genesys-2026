<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\HomeController;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/decks', [DeckController::class, 'index'])
    ->name('decks.index');

Route::get('/decks/{deck:slug}', [DeckController::class, 'show'])
    ->name('decks.show');

Route::get('/', [HomeController::class, 'index'])
    ->name('home');