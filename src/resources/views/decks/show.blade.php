@extends('layouts.app')

@section('content')

@php
$mainDeck = $deck->cards->where('pivot.card_role', 'main');
$extraDeck = $deck->cards->where('pivot.card_role', 'extra');
$sideDeck = $deck->cards->where('pivot.card_role', 'side');
$isBookmarked = auth()->check()
    ? auth()->user()->bookmarks()->where('deck_id', $deck->id)->exists()
    : false;
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('decks.list', $deck->archetype->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-400 hover:text-white transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Back to {{ $deck->archetype->name }}
    </a>

    {{-- Header Dashboard Panel --}}
    <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-8 shadow-md">
        
        <div class="flex flex-col xl:flex-row justify-between gap-6 items-start xl:items-center">
            
            {{-- Title Area --}}
            <div>
                <div class="inline-flex items-center gap-2 mb-3">
                    <span class="rounded bg-zinc-800 border border-zinc-700 px-2.5 py-1 text-xs font-bold text-zinc-300 uppercase tracking-widest">
                        {{ $deck->archetype->name }}
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-2">
                    {{ $deck->name }}
                </h1>
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-zinc-500">By</span>
                    <span class="font-bold text-zinc-200 flex items-center gap-1">
                        <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        {{ $deck->author ?: 'Unknown Player' }}
                    </span>
                </div>
            </div>

            {{-- Action Area --}}
            <div>
                @auth
                    <form method="POST" action="{{ route('bookmark.store', $deck) }}">
                        @csrf
                        <button class="flex items-center gap-2 rounded border px-5 py-2.5 text-sm font-bold transition-all shadow-sm 
                            {{ $isBookmarked
                                ? 'bg-zinc-800 border-zinc-700 text-red-400 hover:bg-zinc-700'
                                : 'bg-red-600 border-red-500 text-white hover:bg-red-500'
                            }}">
                            @if($isBookmarked)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                                Bookmarked
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                                Bookmark Deck
                            @endif
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="flex items-center gap-2 rounded border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 px-5 py-2.5 text-sm font-bold text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Login to Bookmark
                    </a>
                @endauth
            </div>

        </div>

        {{-- Metrics Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-3 mt-8">
            
            <div class="rounded border border-zinc-800 bg-zinc-950 p-4">
                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Tournament</p>
                <p class="font-bold text-white text-sm truncate">{{ $deck->tournament_name ?: '-' }}</p>
            </div>
            
            <div class="rounded border border-zinc-800 bg-zinc-950 p-4">
                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Placement</p>
                <p class="font-bold text-white text-sm">{{ $deck->placement ?: '-' }}</p>
            </div>
            
            <div class="rounded border border-zinc-800 bg-zinc-950 p-4">
                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Difficulty</p>
                <span class="inline-flex rounded bg-zinc-800 px-2 py-0.5 text-xs font-bold text-zinc-300 mt-0.5">
                    {{ ucfirst($deck->difficulty) }}
                </span>
            </div>
            
            <div class="rounded border border-zinc-800 bg-zinc-950 p-4">
                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Event Date</p>
                <p class="font-bold text-white text-sm">{{ $deck->event_date ?: '-' }}</p>
            </div>
            
            <div class="rounded border border-zinc-800 bg-zinc-950 p-4">
                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Main Deck</p>
                <p class="text-xl font-black text-white">{{ $mainDeck->sum('pivot.quantity') }} <span class="text-xs font-bold text-zinc-600">CARDS</span></p>
            </div>
            
            <div class="rounded border border-red-900/30 bg-red-950/20 p-4">
                <p class="text-[10px] font-black text-red-500/70 uppercase tracking-widest mb-1">Total GP</p>
                <p class="text-xl font-black text-red-400">{{ $deck->total_genesys_points }} <span class="text-xs font-bold text-red-500/50">PTS</span></p>
            </div>

        </div>
    </div>

    {{-- MAIN DECK SECTION --}}
    <div class="mt-12">
        <div class="flex items-center gap-3 mb-6 border-b border-zinc-800 pb-3">
            <h2 class="text-2xl font-black text-white uppercase tracking-tight">Main Deck</h2>
            <span class="rounded bg-zinc-800 px-2.5 py-1 text-xs font-bold text-zinc-400">{{ $mainDeck->sum('pivot.quantity') }} Cards</span>
        </div>

        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3">
            @foreach($mainDeck as $card)
                @for($i = 0; $i < $card->pivot->quantity; $i++)
                    <div class="group relative">
                        <div class="absolute right-1 top-1 z-20 flex flex-col items-end gap-1">
                            <!-- Genesys Points Badge -->
                            <span class="rounded-sm bg-red-600/95 border border-red-700 px-1.5 py-0.5 text-[10px] font-bold text-white shadow-md backdrop-blur-sm">
                                {{ $card->genesys_points }} GP
                            </span>
                        </div>
                        <img src="{{ $card->image_path }}" class="rounded shadow-md transition-all duration-200 group-hover:scale-105 group-hover:shadow-[0_0_15px_rgba(220,38,38,0.5)] group-hover:ring-2 ring-red-500 ring-offset-2 ring-offset-zinc-950">
                    </div>
                @endfor
            @endforeach
        </div>
    </div>

    {{-- EXTRA DECK SECTION --}}
    @if($extraDeck->count())
    <div class="mt-12">
        <div class="flex items-center gap-3 mb-6 border-b border-zinc-800 pb-3">
            <h2 class="text-2xl font-black text-white uppercase tracking-tight">Extra Deck</h2>
            <span class="rounded bg-zinc-800 px-2.5 py-1 text-xs font-bold text-zinc-400">{{ $extraDeck->sum('pivot.quantity') }} Cards</span>
        </div>

        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3">
            @foreach($extraDeck as $card)
                @for($i = 0; $i < $card->pivot->quantity; $i++)
                    <div class="group relative">
                        <div class="absolute right-1 top-1 z-20 flex flex-col items-end gap-1">
                            <span class="rounded-sm bg-red-600/95 border border-red-700 px-1.5 py-0.5 text-[10px] font-bold text-white shadow-md backdrop-blur-sm">
                                {{ $card->genesys_points }} GP
                            </span>
                        </div>
                        <img src="{{ $card->image_path }}" class="rounded shadow-md transition-all duration-200 group-hover:scale-105 group-hover:shadow-[0_0_15px_rgba(220,38,38,0.5)] group-hover:ring-2 ring-red-500 ring-offset-2 ring-offset-zinc-950">
                    </div>
                @endfor
            @endforeach
        </div>
    </div>
    @endif

    {{-- SIDE DECK SECTION --}}
    @if($sideDeck->count())
    <div class="mt-12">
        <div class="flex items-center gap-3 mb-6 border-b border-zinc-800 pb-3">
            <h2 class="text-2xl font-black text-white uppercase tracking-tight">Side Deck</h2>
            <span class="rounded bg-zinc-800 px-2.5 py-1 text-xs font-bold text-zinc-400">{{ $sideDeck->sum('pivot.quantity') }} Cards</span>
        </div>

        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3">
            @foreach($sideDeck as $card)
                @for($i = 0; $i < $card->pivot->quantity; $i++)
                    <div class="group relative">
                        <div class="absolute right-1 top-1 z-20 flex flex-col items-end gap-1">
                            <span class="rounded-sm bg-red-600/95 border border-red-700 px-1.5 py-0.5 text-[10px] font-bold text-white shadow-md backdrop-blur-sm">
                                {{ $card->genesys_points }} GP
                            </span>
                        </div>
                        <img src="{{ $card->image_path }}" class="rounded shadow-md transition-all duration-200 group-hover:scale-105 group-hover:shadow-[0_0_15px_rgba(220,38,38,0.5)] group-hover:ring-2 ring-red-500 ring-offset-2 ring-offset-zinc-950">
                    </div>
                @endfor
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection