@extends('layouts.app')

@section('content')

{{-- Wrapping the entire page in bg-zinc-950 to prevent the layout background from peeking through gaps --}}
<div class="bg-zinc-950 min-h-screen pb-24">

    <section class="relative overflow-hidden border-b border-zinc-900">

        {{-- Authentic Database Grid Background --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#27272a_1px,transparent_1px),linear-gradient(to_bottom,#27272a_1px,transparent_1px)] bg-[size:3rem_3rem] [mask-image:radial-gradient(ellipse_80%_50%_at_50%_0%,#000_40%,transparent_100%)] opacity-30"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6">

            <div class="min-h-[70vh] flex flex-col justify-center pt-20 pb-16">

                <div class="max-w-3xl">

                    {{-- Sharp, Tactical Pill --}}
                    <div class="inline-flex items-center border border-red-500/30 bg-red-950/30 px-3 py-1 mb-6">
                        <span class="text-xs font-black text-red-500 uppercase tracking-widest">
                            Yu-Gi-Oh! Genesys Database
                        </span>
                    </div>

                    <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-white leading-none">
                        Master the <br />
                        <span class="text-red-500">Genesys Format</span>
                    </h1>

                    {{-- Applied text-justify here --}}
                    <p class="mt-6 text-lg md:text-xl text-zinc-300 leading-relaxed max-w-2xl font-medium text-justify">
                        Explore competitive deck lists, discover detailed strategy guides,
                        browse community articles, analyze tier lists, search thousands of cards,
                        and challenge yourself with interactive format quizzes.
                    </p>

                    <div class="mt-10 flex flex-wrap items-center gap-4">

                        <a href="{{ route('decks.index') }}"
                           class="rounded-md bg-red-600 hover:bg-red-500 px-8 py-3.5 text-base font-bold text-white transition-all shadow-[0_0_20px_rgba(220,38,38,0.2)] hover:shadow-[0_0_25px_rgba(220,38,38,0.4)] flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Browse Decks
                        </a>

                        <a href="{{ route('cards.search') }}"
                           class="rounded-md border border-zinc-700 bg-zinc-900 hover:bg-zinc-800 hover:border-zinc-500 px-8 py-3.5 text-base font-bold text-white transition-all flex items-center gap-2">
                            <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Search Cards
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- CORE FEATURES SECTION --}}

    <section class="pt-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            <div class="mb-10">
                <h2 class="text-2xl font-black text-white tracking-tight uppercase border-l-4 border-red-600 pl-4">Platform Features</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- Feature 1: Deck Database --}}
                <a href="{{ route('decks.index') }}" class="group block rounded-md border border-zinc-800 bg-zinc-900/50 p-6 hover:bg-zinc-800 hover:border-zinc-600 transition-all duration-200">
                    <div class="w-12 h-12 rounded bg-zinc-950 border border-zinc-800 flex items-center justify-center mb-5 group-hover:border-red-500/50 group-hover:text-red-400 text-zinc-300 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                        Deck Database
                    </h3>
                    <p class="text-sm text-zinc-300 leading-relaxed text-justify">
                        Browse tournament-ready deck lists from multiple archetypes.
                    </p>
                </a>

                {{-- Feature 2: Guides --}}
                <a href="{{ route('guides.index') }}" class="group block rounded-md border border-zinc-800 bg-zinc-900/50 p-6 hover:bg-zinc-800 hover:border-zinc-600 transition-all duration-200">
                    <div class="w-12 h-12 rounded bg-zinc-950 border border-zinc-800 flex items-center justify-center mb-5 group-hover:border-red-500/50 group-hover:text-red-400 text-zinc-300 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                        Format Guides
                    </h3>
                    <p class="text-sm text-zinc-300 leading-relaxed text-justify">
                        Learn combos, advanced deck building, and specific matchup strategies.
                    </p>
                </a>

                {{-- Feature 3: Card Search --}}
                <a href="{{ route('cards.search') }}" class="group block rounded-md border border-zinc-800 bg-zinc-900/50 p-6 hover:bg-zinc-800 hover:border-zinc-600 transition-all duration-200">
                    <div class="w-12 h-12 rounded bg-zinc-950 border border-zinc-800 flex items-center justify-center mb-5 group-hover:border-red-500/50 group-hover:text-red-400 text-zinc-300 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                        Card Search
                    </h3>
                    <p class="text-sm text-zinc-300 leading-relaxed text-justify">
                        Search every legal card available in the Genesys database.
                    </p>
                </a>

                {{-- Feature 4: Quiz --}}
                <a href="{{ route('quiz.index') }}" class="group block rounded-md border border-zinc-800 bg-zinc-900/50 p-6 hover:bg-zinc-800 hover:border-zinc-600 transition-all duration-200">
                    <div class="w-12 h-12 rounded bg-zinc-950 border border-zinc-800 flex items-center justify-center mb-5 group-hover:border-red-500/50 group-hover:text-red-400 text-zinc-300 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                        Knowledge Quiz
                    </h3>
                    <p class="text-sm text-zinc-300 leading-relaxed text-justify">
                        Test your ruling knowledge and improve your understanding of the format.
                    </p>
                </a>

            </div>

        </div>

    </section>

</div>

@endsection