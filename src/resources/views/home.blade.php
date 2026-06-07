@extends('layouts.app')

@section('title', 'Genesys')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-24">

    <div class="text-center">

        <div class="inline-block px-4 py-1 rounded-full bg-red-900/30 border border-red-800 text-red-400 mb-6">
            Yu-Gi-Oh! Deck Guide Platform
        </div>

        <h1 class="text-7xl md:text-8xl font-black text-red-600 mb-6">
            GENESYS
        </h1>

        <p class="text-2xl text-zinc-300 mb-10">
            Master Your Deck, Master Your Game.
        </p>

        <a
            href="{{ route('decks.index') }}"
            class="inline-block bg-red-700 hover:bg-red-600 px-8 py-4 rounded-xl font-bold text-lg transition"
        >
            Browse Decks
        </a>

    </div>

</section>

<section class="max-w-7xl mx-auto px-6 pb-24">

    <div class="flex items-center justify-between mb-8">

        <h2 class="text-4xl font-bold">
            Featured Decks
        </h2>

        <span class="text-zinc-500">
            {{ $featuredDecks->count() }} Decks
        </span>

    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach ($featuredDecks as $deck)

            <a
                href="{{ route('decks.show', $deck) }}"
                class="
                    bg-zinc-900
                    border border-zinc-800
                    rounded-2xl
                    p-6
                    hover:border-red-600
                    hover:-translate-y-1
                    transition
                "
            >

                <div class="flex items-center justify-between mb-4">

                    <h3 class="text-2xl font-bold">
                        {{ $deck->name }}
                    </h3>

                    <span class="text-red-500">
                        →
                    </span>

                </div>

                <p class="text-zinc-400">
                    {{ ucfirst($deck->difficulty) }}
                </p>

            </a>

        @endforeach

    </div>

</section>

@endsection