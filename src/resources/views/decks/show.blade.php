@extends('layouts.app')

@section('title', $deck->name)

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">

    {{-- HERO --}}
    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8 mb-10">

        <div class="flex justify-between items-center">

            <div>

                <div class="text-red-500 text-sm uppercase tracking-widest mb-2">
                    Deck Guide
                </div>

                <h1 class="text-5xl font-black mb-3">
                    {{ $deck->name }}
                </h1>

                <div class="flex gap-6 text-zinc-400">

                    <span>
                        Difficulty:
                        <span class="text-white">
                            {{ ucfirst($deck->difficulty) }}
                        </span>
                    </span>

                    <span>
                        Guides:
                        <span class="text-white">
                            {{ $deck->archetype?->guides?->count() ?? 0 }}  
                        </span>
                    </span>

                    <span>
                        Cards:
                        <span class="text-white">
                            {{ $deck->cards->sum('pivot.quantity') }}
                        </span>
                    </span>

                    <span>
                        Points:    
                        <span class="
                            {{ $deck->total_genesys_points <= 100
                                ? 'text-green-500'
                                : 'text-red-500' }}
                        ">
                            {{ $deck->total_genesys_points }}/100
                        </span>
                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- MAIN DECK --}}
    <div class="mb-12">

        <h2 class="text-3xl font-bold text-red-500 mb-6">
            Main Deck ({{ $mainDeck->sum('pivot.quantity') }})
        </h2>

        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-11 gap-2">

            @foreach($mainDeck as $card)

                <div class="relative">

                    <img
                        src="{{ asset('storage/' . $card->local_image) }}"
                        alt="{{ $card->name }}"
                        class="rounded-lg border border-zinc-800 hover:border-red-500 transition"
                    >

                    <div class="absolute top-2 right-2 flex flex-col gap-1 items-end">

                    <div class="bg-red-600 px-2 py-1 rounded text-xs font-bold shadow">
                        x{{ $card->pivot->quantity }}
                    </div>

                    @if($card->genesys_points > 0)
                        <div class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold shadow">
                            {{ $card->genesys_points }}P
                        </div>
                    @endif

                </div>

            </div>

            @endforeach

        </div>

    </div>

    {{-- EXTRA DECK --}}
    <div class="mb-12">

        <h2 class="text-3xl font-bold text-red-500 mb-6">
            Extra Deck ({{ $extraDeck->sum('pivot.quantity') }})
        </h2>

        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-11 gap-2">

            @foreach($extraDeck as $card)

                <div class="relative">

                    <img
                        src="{{ asset('storage/' . $card->local_image) }}"
                        alt="{{ $card->name }}"
                        class="rounded-lg border border-zinc-800 hover:border-red-500 transition"
                    >

                    <div class="absolute top-2 right-2 flex flex-col gap-1 items-end">

                    <div class="bg-red-600 px-2 py-1 rounded text-xs font-bold shadow">
                        x{{ $card->pivot->quantity }}
                    </div>

                    @if($card->genesys_points > 0)
                        <div class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold shadow">
                            {{ $card->genesys_points }}P
                        </div>
                    @endif

                </div>

            </div>

            @endforeach

        </div>

    </div>

    {{-- SIDE DECK --}}
    <div>

        <h2 class="text-3xl font-bold text-red-500 mb-6">
            Side Deck ({{ $sideDeck->sum('pivot.quantity') }})
        </h2>

        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-9 xl:grid-cols-11 gap-2">

            @foreach($sideDeck as $card)

                <div class="relative">

                    <img
                        src="{{ asset('storage/' . $card->local_image) }}"
                        alt="{{ $card->name }}"
                        class="rounded-lg border border-zinc-800 hover:border-red-500 transition"
                    >
                    
                    <div class="absolute top-2 right-2 flex flex-col gap-1 items-end">

                    <div class="bg-red-600 px-2 py-1 rounded text-xs font-bold shadow">
                        x{{ $card->pivot->quantity }}
                    </div>

                    @if($card->genesys_points > 0)
                        <div class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold shadow">
                            {{ $card->genesys_points }}P
                        </div>
                    @endif

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection