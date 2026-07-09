@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Header --}}
    <div class="mb-10 border-l-4 border-red-600 pl-4">
        <span class="text-xs font-black text-red-500 uppercase tracking-widest block mb-2">
            My Collection
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
            Bookmarked Decks
        </h1>
        <p class="mt-4 text-zinc-300 text-base">
            Your saved deck lists for quick access.
        </p>
    </div>

    @if($bookmarks->count())

        {{-- Bookmarks Data Table --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 shadow-md">
            @foreach($bookmarks as $bookmark)
                <div class="group border-b border-zinc-800 last:border-0 hover:bg-zinc-800/80 transition-colors">
                    <div class="flex items-center justify-between px-6 py-5 gap-6">

                        {{-- Left: Archetype Icon & Info --}}
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded border border-zinc-700 bg-zinc-950 flex items-center justify-center text-red-500 shrink-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white group-hover:text-red-400 transition-colors">
                                    {{ $bookmark->deck->name }}
                                </h2>
                                <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                                    {{ $bookmark->deck->archetype->name }}
                                </p>
                            </div>
                        </div>

                        {{-- Right: Action --}}
                        <a href="{{ route('decks.show', $bookmark->deck) }}" class="rounded bg-zinc-800 hover:bg-red-600 border border-zinc-700 hover:border-red-500 px-4 py-2.5 text-sm font-bold text-white transition-all">
                            View Deck
                        </a>

                    </div>
                </div>
            @endforeach
        </div>

    @else

        {{-- Empty State --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-16 text-center shadow-md">
            <svg class="w-12 h-12 text-zinc-600 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
            <h2 class="text-xl font-bold text-white mb-2">No Bookmarks Yet</h2>
            <p class="text-sm text-zinc-400 mb-6">Save your favorite decks to access them quickly later.</p>
            <a href="{{ route('decks.index') }}" class="inline-flex items-center rounded bg-red-600 hover:bg-red-500 px-6 py-2.5 text-sm font-bold text-white transition-all">
                Browse Decks
            </a>
        </div>

    @endif

</div>

@endsection