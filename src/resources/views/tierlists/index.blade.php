@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Header --}}
    <div class="mb-10 border-l-4 border-red-600 pl-4">
        <span class="text-xs font-black text-red-500 uppercase tracking-widest block mb-2">
            Meta Analysis
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
            Tier Lists
        </h1>
        <p class="mt-4 max-w-3xl text-base text-zinc-300 leading-relaxed text-justify">
            Explore the current Genesys Format metagame.
            Each tier list ranks archetypes based on tournament performance,
            consistency, and overall competitiveness.
        </p>
    </div>

    @if($tierLists->count())

        {{-- Tier Lists Data Table --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 shadow-md">
            @foreach($tierLists as $tier)
                <a href="{{ route('tierlists.show', $tier) }}" class="group block border-b border-zinc-800 last:border-0 hover:bg-zinc-800/80 transition-colors">
                    
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center px-6 py-6 gap-6">
                        
                        <div class="flex-1">
                            <span class="inline-flex rounded border border-zinc-700 bg-zinc-800 px-2 py-0.5 text-[10px] font-bold text-zinc-300 uppercase tracking-widest shadow-sm">
                                Meta Ranking
                            </span>
                            
                            <h2 class="mt-3 text-2xl font-bold text-white group-hover:text-red-400 transition-colors">
                                {{ $tier->name }}
                            </h2>
                            
                            <p class="mt-2 text-sm text-zinc-400 leading-relaxed text-justify max-w-4xl">
                                {{ \Illuminate\Support\Str::limit($tier->description, 180) }}
                            </p>
                        </div>

                        {{-- Action Button --}}
                        <div class="w-full md:w-auto shrink-0 flex justify-end">
                            <div class="w-full md:w-32 text-center rounded bg-zinc-800 group-hover:bg-red-600 border border-zinc-700 group-hover:border-red-500 px-4 py-2.5 text-sm font-bold text-white transition-all flex items-center justify-center gap-2">
                                View
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </div>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $tierLists->links() }}
        </div>

    @else

        {{-- Empty State --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-16 text-center shadow-md">
            <svg class="w-12 h-12 text-zinc-600 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13h8M3 7h15M14 13h2m-6 6h10M3 19h2"/></svg>
            <h2 class="text-xl font-bold text-white mb-2">No Tier List Available</h2>
            <p class="text-sm text-zinc-400">There are currently no published tier lists. Check back after the next tournament.</p>
        </div>

    @endif

</div>

@endsection