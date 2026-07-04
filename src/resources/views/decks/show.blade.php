@extends('layouts.app')

@section('content')

@php

$mainDeck = $deck->cards->where('pivot.card_role', 'main');

$extraDeck = $deck->cards->where('pivot.card_role', 'extra');

$sideDeck = $deck->cards->where('pivot.card_role', 'side');

@endphp

@php

$isBookmarked = auth()->check()
    ? auth()->user()
        ->bookmarks()
        ->where('deck_id', $deck->id)
        ->exists()
    : false;

@endphp

<a href="{{ route('decks.list',$deck->archetype->slug) }}"
class="text-blue-600">

← Back

</a>

<div class="mt-6 mb-8">

<h1 class="text-4xl font-bold">

{{ $deck->name }}

</h1>

<p class="text-gray-500 mt-2">

By {{ $deck->author }}

</p>

<div class="mt-4 flex gap-6 flex-wrap">

<div>

<strong>Tournament</strong>

<br>

{{ $deck->tournament_name }}

</div>

<div>

<strong>Placement</strong>

<br>

{{ $deck->placement }}

</div>

<div>

<strong>Difficulty</strong>

<br>

{{ $deck->difficulty }}

</div>

<div>

<strong>Genesys Points</strong>

<br>

{{ $deck->total_genesys_points }}

</div>

</div>

</div>

@auth

<form
method="POST"
action="{{ route('bookmark.store',$deck) }}">

@csrf

<button
class="px-4 py-2 rounded text-white
{{ $isBookmarked ? 'bg-red-500' : 'bg-yellow-500' }}">

{{ $isBookmarked ? '❤️ Remove Bookmark' : '⭐ Bookmark Deck' }}

</button>

</form>

@endauth

@guest

<a
href="{{ route('login') }}"
class="px-4 py-2 bg-gray-500 text-white rounded">

Login untuk Bookmark

</a>

@endguest

{{-- MAIN DECK --}}

<h2 class="text-2xl font-bold border-b pb-2 mb-6">

MAIN DECK ({{ $mainDeck->count() }})

</h2>

<div class="grid grid-cols-5 md:grid-cols-8 lg:grid-cols-10 gap-3">

@foreach($mainDeck as $card)

<div class="relative">

<div class="absolute left-1 top-1 bg-red-600 text-white text-xs px-1 rounded">

{{ $card->genesys_points }} GP

</div>

<div class="absolute right-1 top-1 bg-black text-white text-xs px-1 rounded">

x{{ $card->pivot->quantity }}

</div>

<img

src="{{ $card->image_path }}"

class="rounded shadow"

>

</div>

@endforeach

</div>

{{-- EXTRA DECK --}}

<h2 class="text-2xl font-bold border-b pb-2 my-8">

EXTRA DECK ({{ $extraDeck->count() }})

</h2>

<div class="grid grid-cols-5 md:grid-cols-8 lg:grid-cols-10 gap-3">

@foreach($extraDeck as $card)

<div class="relative">

<div class="absolute left-1 top-1 bg-red-600 text-white text-xs px-1 rounded">

{{ $card->genesys_points }} GP

</div>

<div class="absolute right-1 top-1 bg-black text-white text-xs px-1 rounded">

x{{ $card->pivot->quantity }}

</div>

<img

src="{{ $card->image_path }}"

class="rounded shadow"

>

</div>

@endforeach

</div>

@if($sideDeck->count())

<h2 class="text-2xl font-bold border-b pb-2 my-8">

SIDE DECK ({{ $sideDeck->count() }})

</h2>

<div class="grid grid-cols-5 md:grid-cols-8 lg:grid-cols-10 gap-3">

@foreach($sideDeck as $card)

<div class="relative">

<div class="absolute left-1 top-1 bg-red-600 text-white text-xs px-1 rounded">

{{ $card->genesys_points }} GP

</div>

<div class="absolute right-1 top-1 bg-black text-white text-xs px-1 rounded">

x{{ $card->pivot->quantity }}

</div>

<img

src="{{ $card->image_path }}"

class="rounded shadow"

>

</div>

@endforeach

</div>

@endif

@endsection