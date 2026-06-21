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
            Featured Archetypes
        </h2>

        <span class="text-zinc-500">
            {{ $featuredArchetypes->count() }} Archetypes
        </span>

    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach ($featuredArchetypes as $archetype)

            <a
                href="{{ route('archetypes.show', $archetype) }}"
                class="
                    relative
                    overflow-hidden
                    border border-zinc-800
                    rounded-2xl
                    p-6
                    hover:border-red-600
                    hover:-translate-y-1
                    transition
                    bg-zinc-900
                "
            >

                {{-- Background Artwork --}}
                @if($archetype->thumbnail)

                    <img
                        src="{{ asset('storage/' . $archetype->thumbnail) }}"
                        alt="{{ $archetype->name }}"
                        class="
                            absolute
                            inset-0
                            w-full
                            h-full
                            object-cover
                            opacity-20
                        "
                    >

                    <div class="absolute inset-0 bg-black/60"></div>

                @endif

                {{-- Content --}}
                <div class="relative z-10">

                    <div class="flex items-center justify-between mb-4">

                        <h3 class="text-2xl font-bold">
                            {{ $archetype->name }}
                        </h3>

                        <span class="text-red-500 text-xl">
                            →
                        </span>

                    </div>

                    <p class="text-zinc-300">
                        {{ $archetype->decks_count }} Tournament Decks
                    </p>

                </div>

            </a>

        @endforeach

    </div>

</section>

@endsection