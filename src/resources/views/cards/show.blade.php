@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('cards.search') }}" class="inline-flex items-center gap-2 text-xs font-bold text-zinc-400 hover:text-white transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Back to Card Database
    </a>

    <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

        {{-- Left Column: Card Image --}}
        <div class="lg:sticky lg:top-24">
            <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-3 shadow-md flex justify-center">
                <img src="{{ $card->image_path }}" alt="{{ $card->name }}" class="w-full max-w-sm rounded border border-zinc-700 shadow-lg">
            </div>
        </div>

        {{-- Right Column: Card Information --}}
        <div class="lg:col-span-2 flex flex-col gap-6">

            {{-- Main Info Panel --}}
            <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-8 shadow-md">
                
                {{-- GP Badge --}}
                <div class="mb-4">
                    <span class="inline-flex items-center rounded-sm bg-red-600/90 border border-red-700 px-3 py-1 text-[10px] font-black text-white uppercase tracking-widest shadow-sm">
                        {{ $card->genesys_points }} Genesys Point
                    </span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-none uppercase">
                    {{ $card->name }}
                </h1>

                {{-- Card Stats Terminal Grid --}}
                <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-3">

                    @if($card->attribute)
                    <div class="rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-600 transition-colors">
                        <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Attribute</p>
                        <p class="text-white font-bold truncate">{{ $card->attribute }}</p>
                    </div>
                    @endif

                    @if($card->level)
                    <div class="rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-600 transition-colors">
                        <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Level / Rank</p>
                        <p class="text-white font-bold truncate">{{ $card->level }}</p>
                    </div>
                    @endif

                    @if($card->race)
                    <div class="rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-600 transition-colors">
                        <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Race</p>
                        <p class="text-white font-bold truncate">{{ $card->race }}</p>
                    </div>
                    @endif

                    @if($card->type)
                    <div class="rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-600 transition-colors">
                        <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Type</p>
                        <p class="text-white font-bold truncate">{{ $card->type }}</p>
                    </div>
                    @endif

                    @if($card->atk !== null)
                    <div class="rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-red-900/50 transition-colors">
                        <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">ATK</p>
                        <p class="text-white font-bold truncate">{{ $card->atk }}</p>
                    </div>
                    @endif

                    @if($card->def !== null)
                    <div class="rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-blue-900/50 transition-colors">
                        <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">DEF</p>
                        <p class="text-white font-bold truncate">{{ $card->def }}</p>
                    </div>
                    @endif

                </div>

            </div>

            {{-- Effect Panel --}}
            @if($card->description)
            <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-8 shadow-md">
                
                <h2 class="text-sm font-black text-white uppercase tracking-widest mb-6 border-l-4 border-red-600 pl-3">
                    Card Effect
                </h2>

                <div class="rounded bg-zinc-950 border border-zinc-800 p-5 sm:p-6">
                    <p class="leading-relaxed text-zinc-300 text-sm whitespace-pre-line font-medium text-justify">
                        {{ $card->description }}
                    </p>
                </div>

            </div>
            @endif

        </div>

    </div>

</div>

@endsection