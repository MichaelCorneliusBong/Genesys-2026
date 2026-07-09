@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('decks.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-400 hover:text-white transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Back to Archetypes
    </a>

    {{-- Header --}}
    <div class="mb-10 border-l-4 border-red-600 pl-4">
        <span class="text-xs font-black text-red-500 uppercase tracking-widest block mb-2">
            Archetype
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
            {{ $archetype->name }}
        </h1>
        <p class="mt-4 max-w-4xl text-base text-zinc-300 leading-relaxed text-justify">
            {{ $archetype->description }}
        </p>
    </div>

    @if($decks->count())

        {{-- Data List --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 shadow-md">
            @foreach($decks as $deck)
                <div class="group border-b border-zinc-800 last:border-0 hover:bg-zinc-800/80 transition-colors">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between px-6 py-5 gap-6">

                        {{-- Identity (Left) --}}
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-white group-hover:text-red-400 transition-colors">
                                {{ $deck->name }}
                            </h2>
                            <div class="mt-2 flex items-center gap-2 text-sm">
                                <span class="text-zinc-500">By</span>
                                <span class="font-bold text-zinc-200 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    {{ $deck->author ?: 'Unknown Player' }}
                                </span>
                            </div>
                        </div>

                        {{-- Quick Stats (Center) --}}
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-sm min-w-[60%] lg:min-w-[600px]">
                            <div>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Tournament</p>
                                <p class="text-zinc-100 font-bold truncate">{{ $deck->tournament_name ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Placement</p>
                                <p class="text-zinc-100 font-bold">{{ $deck->placement ?: '-' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Difficulty</p>
                                <span class="inline-flex rounded border border-zinc-700 bg-zinc-800 px-2 py-0.5 text-xs font-bold text-zinc-300">
                                    {{ ucfirst($deck->difficulty) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Event Date</p>
                                <p class="text-zinc-100 font-bold">{{ $deck->event_date ?: '-' }}</p>
                            </div>
                        </div>

                        {{-- Action (Right) --}}
                        <div class="lg:w-32 flex justify-end">
                            <a href="{{ route('decks.show', $deck->slug) }}" class="w-full text-center rounded bg-zinc-800 hover:bg-red-600 border border-zinc-700 hover:border-red-500 px-4 py-2.5 text-sm font-bold text-white transition-all">
                                View Deck
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $decks->links() }}
        </div>

    @else
        {{-- Empty State --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-16 text-center shadow-md">
            <svg class="w-12 h-12 text-zinc-600 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <h2 class="text-xl font-bold text-white mb-2">No Decks Found</h2>
            <p class="text-sm text-zinc-400">There are currently no deck variants submitted for this archetype.</p>
        </div>
    @endif

</div>

@endsection