@extends('layouts.app')

@section('content')

@php

$mainDeck = $deck->cards->where('pivot.card_role', 'main');

$extraDeck = $deck->cards->where('pivot.card_role', 'extra');

$sideDeck = $deck->cards->where('pivot.card_role', 'side');

$isBookmarked = auth()->check()
    ? auth()->user()
        ->bookmarks()
        ->where('deck_id', $deck->id)
        ->exists()
    : false;

@endphp

<div class="max-w-7xl mx-auto px-6 py-12">

    <a
        href="{{ route('decks.list',$deck->archetype->slug) }}"
        class="inline-flex items-center gap-2 text-slate-400 hover:text-red-400 transition">

        ← Back to {{ $deck->archetype->name }}

    </a>

    {{-- Header --}}
    <div
        class="mt-8 rounded-3xl border border-slate-800 bg-slate-900 p-8">

        <div
            class="flex flex-col xl:flex-row justify-between gap-8">

            <div>

                <span
                    class="inline-flex rounded-full bg-red-500/10 border border-red-500/30 px-4 py-2 text-red-400 text-sm">

                    {{ $deck->archetype->name }}

                </span>

                <h1
                    class="mt-5 text-5xl font-black text-white">

                    {{ $deck->name }}

                </h1>

                <p
                    class="mt-3 text-lg text-slate-400">

                    By

                    <span class="text-white font-semibold">

                        {{ $deck->author ?: 'Unknown Player' }}

                    </span>

                </p>

            </div>

            <div
                class="flex flex-wrap gap-3">

                @auth

                <form
                    method="POST"
                    action="{{ route('bookmark.store',$deck) }}">

                    @csrf

                    <button
                        class="rounded-xl px-6 py-3 font-semibold transition
                        {{ $isBookmarked
                            ? 'bg-red-600 hover:bg-red-700 text-white'
                            : 'bg-yellow-500 hover:bg-yellow-600 text-black'
                        }}">

                        {{ $isBookmarked ? '❤️ Bookmarked' : '⭐ Bookmark' }}

                    </button>

                </form>

                @else

                <a
                    href="{{ route('login') }}"
                    class="rounded-xl bg-slate-800 hover:bg-slate-700 px-6 py-3">

                    Login to Bookmark

                </a>

                @endauth

            </div>

        </div>

        {{-- Stats --}}
        <div
            class="grid grid-cols-2 lg:grid-cols-6 gap-5 mt-10">

            <div
                class="rounded-2xl bg-slate-800 p-5">

                <p class="text-slate-500 text-xs uppercase">

                    Tournament

                </p>

                <p class="mt-2 font-semibold text-white">

                    {{ $deck->tournament_name ?: '-' }}

                </p>

            </div>

            <div
                class="rounded-2xl bg-slate-800 p-5">

                <p class="text-slate-500 text-xs uppercase">

                    Placement

                </p>

                <p class="mt-2 font-semibold text-white">

                    {{ $deck->placement ?: '-' }}

                </p>

            </div>

            <div
                class="rounded-2xl bg-slate-800 p-5">

                <p class="text-slate-500 text-xs uppercase">

                    Difficulty

                </p>

                <p class="mt-2">

                    <span
                        class="rounded-full bg-red-600 px-3 py-1 text-sm text-white">

                        {{ ucfirst($deck->difficulty) }}

                    </span>

                </p>

            </div>

            <div
                class="rounded-2xl bg-slate-800 p-5">

                <p class="text-slate-500 text-xs uppercase">

                    Event Date

                </p>

                <p class="mt-2 font-semibold text-white">

                    {{ $deck->event_date ?: '-' }}

                </p>

            </div>

            <div
                class="rounded-2xl bg-slate-800 p-5">

                <p class="text-slate-500 text-xs uppercase">

                    Main Deck

                </p>

                <p class="mt-2 text-2xl font-black text-white">

                    {{ $mainDeck->sum('pivot.quantity') }}

                </p>

            </div>

            <div
                class="rounded-2xl bg-slate-800 p-5">

                <p class="text-slate-500 text-xs uppercase">

                    Total GP

                </p>

                <p class="mt-2 text-2xl font-black text-red-400">

                    {{ $deck->total_genesys_points }}

                </p>

            </div>

        </div>

    </div>

    {{-- MAIN DECK --}}

    <div class="mt-14">

        <div
            class="flex items-center justify-between mb-6">

            <div>

                <h2
                    class="text-3xl font-bold text-white">

                    Main Deck

                </h2>

                <p
                    class="text-slate-400">

                    {{ $mainDeck->sum('pivot.quantity') }} Cards

                </p>

            </div>

        </div>

        <div
            class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 xl:grid-cols-8 gap-4">

            @foreach($mainDeck as $card)

            <div
                class="group relative">

                <div class="absolute right-2 top-2 z-20 flex flex-col items-end gap-1">

                <!-- Pivot Quantity (Top) -->
                <span class="rounded bg-black/80 px-2 py-1 text-[10px] font-bold text-white">
                    x{{ $card->pivot->quantity }}
                </span>

                <!-- Genesys Points (Bottom) -->
                <span class="rounded bg-red-600 px-2 py-1 text-[10px] font-bold text-white">
                    {{ $card->genesys_points }}
                </span>
            </div>

                <img
                    src="{{ $card->image_path }}"
                    class="rounded-xl border border-slate-700 transition duration-300 group-hover:scale-105 group-hover:border-red-500">

            </div>

            @endforeach

        </div>

    </div>
    {{-- EXTRA DECK --}}
    @if($extraDeck->count())

    <div class="mt-16">

        <div
            class="flex items-center justify-between mb-6">

            <div>

                <h2
                    class="text-3xl font-bold text-white">

                    Extra Deck

                </h2>

                <p
                    class="text-slate-400">

                    {{ $extraDeck->sum('pivot.quantity') }} Cards

                </p>

            </div>

        </div>

        <div
            class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 xl:grid-cols-8 gap-4">

            @foreach($extraDeck as $card)

            <div
                class="group relative">

                
                <div class="absolute right-2 top-2 z-20 flex flex-col items-end gap-1">
                    
                <!-- Pivot Quantity (Top) -->
                <span class="rounded bg-black/80 px-2 py-1 text-[10px] font-bold text-white">
                    x{{ $card->pivot->quantity }}
                </span>

                <!-- Genesys Points (Bottom) -->
                <span class="rounded bg-red-600 px-2 py-1 text-[10px] font-bold text-white">
                    {{ $card->genesys_points }}
                </span>
            </div>

                <img
                    src="{{ $card->image_path }}"
                    class="rounded-xl border border-slate-700 transition duration-300 group-hover:scale-105 group-hover:border-red-500">

            </div>

            @endforeach

        </div>

    </div>

    @endif

    {{-- SIDE DECK --}}
    @if($sideDeck->count())

    <div class="mt-16">

        <div
            class="flex items-center justify-between mb-6">

            <div>

                <h2
                    class="text-3xl font-bold text-white">

                    Side Deck

                </h2>

                <p
                    class="text-slate-400">

                    {{ $sideDeck->sum('pivot.quantity') }} Cards

                </p>

            </div>

        </div>

        <div
            class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 xl:grid-cols-8 gap-4">

            @foreach($sideDeck as $card)

            <div
                class="group relative">

                <div class="absolute right-2 top-2 z-20 flex flex-col items-end gap-1">
                    
                <!-- Pivot Quantity (Top) -->
                <span class="rounded bg-black/80 px-2 py-1 text-[10px] font-bold text-white">
                    x{{ $card->pivot->quantity }}
                </span>

                <!-- Genesys Points (Bottom) -->
                <span class="rounded bg-red-600 px-2 py-1 text-[10px] font-bold text-white">
                    {{ $card->genesys_points }}
                </span>
            </div>

                <img
                    src="{{ $card->image_path }}"
                    class="rounded-xl border border-slate-700 transition duration-300 group-hover:scale-105 group-hover:border-red-500">

            </div>

            @endforeach

        </div>

    </div>

    @endif

</div>

@endsection