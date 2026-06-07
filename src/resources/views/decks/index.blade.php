@extends('layouts.app')

@section('title', 'Deck Library')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-16">

    <h1 class="text-5xl font-black mb-3">
        Deck Library
    </h1>

    <p class="text-zinc-400 mb-12">
        Browse available deck guides.
    </p>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach ($decks as $deck)

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

                <h2 class="text-2xl font-bold mb-2">
                    {{ $deck->name }}
                </h2>

                <p class="text-zinc-400">
                    {{ ucfirst($deck->difficulty) }}
                </p>

                <div class="text-red-400 font-semibold mt-2">
                    {{ $deck->total_genesys_points }}/100 Points
                </div>

                @if($deck->total_genesys_points <= 100)

                    <div class="text-green-500 font-semibold">
                        Legal Deck
                    </div>

                @else

                    <div class="text-red-500 font-semibold">
                        Illegal Deck
                    </div>

@endif

            </a>

        @endforeach

    </div>

</div>

@endsection