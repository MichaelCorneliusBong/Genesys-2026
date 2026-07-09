@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Header --}}
    <div class="mb-10 border-l-4 border-red-600 pl-4">
        <span class="text-xs font-black text-red-500 uppercase tracking-widest block mb-2">
            Deck Database
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
            Browse Archetypes
        </h1>
        <p class="mt-4 max-w-3xl text-base text-zinc-300 leading-relaxed text-justify">
            Explore every supported archetype in the Genesys Format.
            Each archetype contains tournament-ready deck variants,
            player submissions, and optimized deck builds.
        </p>
    </div>

    {{-- Grid --}}
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
        @foreach($archetypes as $archetype)
            <a href="{{ route('decks.list', $archetype->slug) }}" class="group block h-full">
                <div class="flex flex-col h-full overflow-hidden rounded-md border border-zinc-800 bg-zinc-900/50 transition-all duration-200 hover:border-zinc-500 hover:bg-zinc-800 shadow-md">
                    
                    {{-- Thumbnail --}}
                    <div class="relative overflow-hidden border-b border-zinc-800">
                        @if($archetype->thumbnail)
                            <img src="{{ asset('storage/'.$archetype->thumbnail) }}" 
                                 class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="flex h-48 w-full items-center justify-center bg-zinc-950">
                                <span class="text-zinc-600 font-bold uppercase tracking-widest text-xs">No Image</span>
                            </div>
                        @endif

                        {{-- Deck Count Pill --}}
                        <div class="absolute right-3 top-3 rounded bg-red-600 px-2.5 py-1 text-xs font-bold text-white shadow-md flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            {{ $archetype->decks_count }}
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5 flex flex-col flex-grow">
                        <h2 class="text-xl font-bold text-white transition-colors group-hover:text-red-400">
                            {{ $archetype->name }}
                        </h2>
                        <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-zinc-400 flex-grow">
                            {{ $archetype->description }}
                        </p>
                        <div class="mt-6 flex items-center justify-between border-t border-zinc-800 pt-4">
                            <span class="text-xs font-bold text-red-500 uppercase tracking-widest flex items-center gap-1 group-hover:text-red-400 transition-colors">
                                View Variants 
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>

                </div>
            </a>
        @endforeach
    </div>

</div>

@endsection