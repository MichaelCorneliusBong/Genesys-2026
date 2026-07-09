@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Header --}}
    <div class="mb-10 border-l-4 border-red-600 pl-4">
        <span class="text-xs font-black text-red-500 uppercase tracking-widest block mb-2">
            Card Database
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
            Search Cards
        </h1>
        <p class="mt-4 text-zinc-300 text-base">
            Browse every available card in the Genesys format database.
        </p>
    </div>

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('cards.search') }}" class="mb-8">
        <div class="relative max-w-2xl">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search by card name..."
                class="w-full rounded-md border border-zinc-700 bg-zinc-900 px-4 py-3 text-white placeholder:text-zinc-500 outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all">
            
            <button class="absolute right-1 top-1 bottom-1 rounded bg-red-600 hover:bg-red-500 px-4 text-white text-sm font-bold transition-all">
                Search
            </button>
        </div>
    </form>

    {{-- Results Info --}}
    <div class="flex items-center justify-between mb-6 text-xs uppercase tracking-widest font-bold">
        <p class="text-zinc-400">
            Showing <span class="text-white">{{ $cards->count() }}</span> results
        </p>
        @if(request('q'))
            <span class="text-zinc-500">
                FILTER: <span class="text-zinc-200">"{{ request('q') }}"</span>
            </span>
        @endif
    </div>

    {{-- Card Grid (Tight Layout) --}}
    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-2">
        @foreach($cards as $card)
            <div class="group relative">
                
                {{-- Only GP Badge on Border --}}
                <div class="absolute right-1 top-1 z-20">
                    <span class="rounded-sm bg-red-600/90 border border-red-700 px-1.5 py-0.5 text-[10px] font-black text-white shadow-md backdrop-blur-sm">
                        {{ $card->genesys_points }} GP
                    </span>
                </div>

                {{-- Card Image --}}
                <img
                    src="{{ $card->image_path }}"
                    title="{{ $card->name }}"
                    class="w-full rounded border border-zinc-700 group-hover:border-red-500 transition-all duration-200 hover:scale-105 hover:shadow-lg hover:shadow-red-950/50 cursor-pointer">
            
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-12">
        {{ $cards->withQueryString()->links() }}
    </div>

</div>

@endsection