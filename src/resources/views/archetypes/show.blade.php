@extends('layouts.app')

@section('title', $archetype->name)

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">

    <h1 class="text-5xl font-black mb-4">
        {{ $archetype->name }}
    </h1>

    @if($archetype->thumbnail)

    <img
        src="{{ asset('storage/' . $archetype->thumbnail) }}"
        alt="{{ $archetype->name }}"
        class="
            w-full
            h-80
            object-cover
            rounded-2xl
            mb-8
            border
            border-zinc-800
        "
    >

    @endif

    <p class="text-zinc-400 mb-10">
        {{ $archetype->description }}
    </p>

    <h2 class="text-3xl font-bold mb-6 text-red-500">
        Guides
    </h2>

    @foreach($archetype->guides as $guide)

        <div class="bg-zinc-900 p-4 rounded-xl mb-4">

            {{ $guide->title }}

        </div>

    @endforeach

    <h2 class="text-3xl font-bold mb-6 mt-12 text-red-500">
        Tournament Decks
    </h2>

    @foreach($archetype->decks as $deck)

        <div class="bg-zinc-900 p-4 rounded-xl mb-4">

            <a href="{{ route('decks.show', $deck) }}">
                {{ $deck->name }}
            </a>

            <div class="text-sm text-zinc-400">

                    {{ $deck->author }}

                    @if($deck->tournament_name)
                        • {{ $deck->tournament_name }}
                    @endif

                    @if($deck->placement)
                        • {{ $deck->placement }}
                    @endif

                </div>

                @if($deck->source)
                    <div class="text-xs text-zinc-500 mt-1">
                        Source: {{ $deck->source }}
                    </div>
                @endif

        </div>

    @endforeach

</div>

@endsection