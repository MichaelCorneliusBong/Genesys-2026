@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('cards.search') }}" class="group inline-flex items-center gap-2 text-xs font-bold text-zinc-400 hover:text-red-400 transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
        </svg>
        Back to Card Database
    </a>

    <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

        {{-- Left Column: Card Image (With Tactical HUD Borders) --}}
        <div class="lg:sticky lg:top-24">
            <div class="relative rounded-md border border-zinc-800 bg-zinc-900/50 p-4 shadow-xl flex justify-center">
                {{-- HUD Corner Accents --}}
                <div class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-red-500/50 rounded-tl-sm"></div>
                <div class="absolute top-0 right-0 w-3 h-3 border-t-2 border-r-2 border-red-500/50 rounded-tr-sm"></div>
                <div class="absolute bottom-0 left-0 w-3 h-3 border-b-2 border-l-2 border-red-500/50 rounded-bl-sm"></div>
                <div class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-red-500/50 rounded-br-sm"></div>

                <img src="{{ $card->image_path }}" alt="{{ $card->name }}" class="w-full max-w-sm rounded border border-zinc-700 shadow-[0_0_20px_rgba(0,0,0,0.5)]">
            </div>
        </div>

        {{-- Right Column: Card Information --}}
        <div class="lg:col-span-2 flex flex-col gap-6">

            {{-- Main Info Panel --}}
            <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-8 shadow-md relative overflow-hidden">
                
                {{-- Background Watermark Accent --}}
                <div class="absolute -right-10 -top-10 text-zinc-800/20 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>

                <div class="relative z-10">
                    {{-- GP Badge --}}
                    <div class="mb-4 flex">
                        <span class="inline-flex items-center gap-1.5 rounded-sm bg-red-600 border border-red-500 px-3 py-1 text-[10px] font-black text-white uppercase tracking-widest shadow-[0_0_10px_rgba(220,38,38,0.3)]">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            {{ $card->genesys_points }} Genesys Point
                        </span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-none uppercase">
                        {{ $card->name }}
                    </h1>

                    {{-- Card Stats Terminal Grid --}}
                    <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-3">

                        @if($card->attribute)
                        <div class="group rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-500 transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-zinc-300 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">Attribute</p>
                            </div>
                            <p class="text-white font-bold truncate pl-5">{{ $card->attribute }}</p>
                        </div>
                        @endif

                        @if($card->level)
                        <div class="group rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-yellow-500/50 transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-yellow-500 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">Level / Rank</p>
                            </div>
                            <p class="text-white font-bold truncate pl-5">{{ $card->level }}</p>
                        </div>
                        @endif

                        @if($card->race)
                        <div class="group rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-500 transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-zinc-300 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">Race</p>
                            </div>
                            <p class="text-white font-bold truncate pl-5">{{ $card->race }}</p>
                        </div>
                        @endif

                        @if($card->type)
                        <div class="group rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-zinc-500 transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-zinc-300 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/></svg>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">Type</p>
                            </div>
                            <p class="text-white font-bold truncate pl-5">{{ $card->type }}</p>
                        </div>
                        @endif

                        @if($card->atk !== null)
                        <div class="group rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-red-500/50 transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">ATK</p>
                            </div>
                            <p class="text-white font-bold truncate pl-5">{{ $card->atk }}</p>
                        </div>
                        @endif

                        @if($card->def !== null)
                        <div class="group rounded bg-zinc-950 border border-zinc-800 p-4 hover:border-blue-500/50 transition-colors">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-3.5 h-3.5 text-zinc-500 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">DEF</p>
                            </div>
                            <p class="text-white font-bold truncate pl-5">{{ $card->def }}</p>
                        </div>
                        @endif

                    </div>

                </div>
            </div>

            {{-- Effect Panel --}}
            @if($card->description)
            <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-8 shadow-md">
                
                <div class="flex items-center gap-3 mb-6 border-l-4 border-red-600 pl-3">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    <h2 class="text-sm font-black text-white uppercase tracking-widest">
                        Card Effect
                    </h2>
                </div>

                <div class="relative rounded bg-zinc-950 border border-zinc-800 overflow-hidden">
                    {{-- Subtle top gradient to look like a screen --}}
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-600/20 to-transparent"></div>
                    
                    <div class="p-5 sm:p-6">
                        <p class="leading-relaxed text-zinc-300 text-sm whitespace-pre-line font-medium text-justify">
                            {{ $card->description }}
                        </p>
                    </div>
                </div>

            </div>
            @endif

        </div>

    </div>

</div>

@endsection