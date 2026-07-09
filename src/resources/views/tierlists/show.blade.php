@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('tierlists.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-400 hover:text-white transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Back to Tier Lists
    </a>

    {{-- Header Dashboard Panel --}}
    <div class="mb-10 rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-10 shadow-md">
        
        <div class="mb-4">
            <span class="inline-flex rounded border border-zinc-700 bg-zinc-800 px-2.5 py-1 text-xs font-bold text-zinc-300 uppercase tracking-widest shadow-sm">
                Tier List
            </span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
            {{ $tierList->name }}
        </h1>

        @if($tierList->description)
            <p class="mt-5 text-base sm:text-lg text-zinc-300 leading-relaxed text-justify max-w-4xl border-l-4 border-red-600 pl-4">
                {{ $tierList->description }}
            </p>
        @endif

    </div>

    {{-- Tier Breakdown Loop --}}
    @foreach(['S', 'A', 'B', 'C'] as $tier)

        @php
            $items = $tierList->items->where('tier', $tier)->sortBy('position');
            
            // Dynamic color logic for professional tier styling
            $tierColor = match($tier) {
                'S' => 'text-red-500',
                'A' => 'text-yellow-500',
                'B' => 'text-green-500',
                'C' => 'text-blue-400',
                default => 'text-zinc-300'
            };
        @endphp

        @if($items->count())
            <div class="mb-8 rounded-md border border-zinc-800 bg-zinc-900/50 overflow-hidden shadow-md">

                {{-- Tier Section Header --}}
                <div class="px-6 py-4 border-b border-zinc-800 bg-zinc-950 flex items-center gap-3">
                    <span class="text-3xl font-black {{ $tierColor }} uppercase tracking-tighter drop-shadow-md">
                        {{ $tier }}
                    </span>
                    <h2 class="text-lg font-bold text-zinc-300 uppercase tracking-widest">
                        Tier
                    </h2>
                </div>

                {{-- Tier Items --}}
                <div>
                    @foreach($items as $item)
                        <a href="{{ route('decks.list', $item->archetype->slug) }}" class="group block border-b border-zinc-800 last:border-0 hover:bg-zinc-800/80 transition-colors">
                            
                            <div class="flex items-center justify-between px-6 py-5 gap-6">

                                {{-- Archetype Info --}}
                                <div class="flex items-center gap-5">
                                    @if($item->featuredCard)
                                        <div class="shrink-0">
                                            <img src="{{ $item->featuredCard->image_path }}" class="w-16 sm:w-20 rounded shadow-md border border-zinc-700 group-hover:border-red-500 group-hover:scale-105 transition-all duration-300">
                                        </div>
                                    @endif

                                    <div>
                                        <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-red-400 transition-colors">
                                            {{ $item->archetype->name }}
                                        </h3>
                                        <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest mt-1 group-hover:text-zinc-400 transition-colors">
                                            View Variants →
                                        </p>
                                    </div>
                                </div>

                                {{-- Rank Position Badge --}}
                                <div class="shrink-0 flex items-center justify-center w-12 h-12 rounded bg-zinc-950 border border-zinc-800 shadow-inner group-hover:border-zinc-600 transition-colors">
                                    <span class="text-xl font-black text-zinc-500">
                                        #{{ $item->position }}
                                    </span>
                                </div>

                            </div>

                        </a>
                    @endforeach
                </div>

            </div>
        @endif

    @endforeach

</div>

@endsection