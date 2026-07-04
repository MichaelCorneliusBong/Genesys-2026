@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden">

    {{-- Background Glow --}}
    <div class="absolute -top-48 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-red-600/20 blur-[160px] rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <div class="min-h-[85vh] flex items-center justify-center">

            <div class="text-center max-w-4xl">

                <span class="inline-flex items-center rounded-full border border-red-500/40 bg-red-500/10 px-4 py-2 text-sm text-red-400">

                    Yu-Gi-Oh! Genesys Format Database

                </span>

                <h1
                    class="mt-8 text-6xl md:text-7xl font-black tracking-tight text-white leading-tight">

                    Master the

                    <span class="text-red-500">

                        Genesys Format

                    </span>

                </h1>

                <p
                    class="mt-8 text-xl text-slate-400 leading-9 max-w-3xl mx-auto">

                    Explore competitive deck lists, discover detailed strategy guides,
                    browse community articles, analyze tier lists, search thousands of cards,
                    and challenge yourself with interactive quizzes.

                </p>

                <div class="mt-12 flex flex-wrap justify-center gap-5">

                    <a
                        href="{{ route('decks.index') }}"
                        class="rounded-2xl bg-red-600 hover:bg-red-700 px-8 py-4 text-lg font-semibold text-white transition shadow-xl">

                        Browse Decks

                    </a>

                    <a
                        href="{{ route('cards.search') }}"
                        class="rounded-2xl border border-slate-700 bg-slate-900 hover:bg-slate-800 px-8 py-4 text-lg font-semibold text-white transition">

                        Search Cards

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- FEATURES --}}

<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 hover:border-red-500 transition">

                <div class="text-5xl mb-5">

                    📚

                </div>

                <h3 class="text-2xl font-bold text-white">

                    Deck Database

                </h3>

                <p class="mt-4 text-slate-400">

                    Browse tournament-ready deck lists from multiple archetypes.

                </p>

            </div>

            <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 hover:border-red-500 transition">

                <div class="text-5xl mb-5">

                    📝

                </div>

                <h3 class="text-2xl font-bold text-white">

                    Guides

                </h3>

                <p class="mt-4 text-slate-400">

                    Learn combos, deck building, and advanced strategies.

                </p>

            </div>

            <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 hover:border-red-500 transition">

                <div class="text-5xl mb-5">

                    🔍

                </div>

                <h3 class="text-2xl font-bold text-white">

                    Card Search

                </h3>

                <p class="mt-4 text-slate-400">

                    Search every card available in the Genesys database.

                </p>

            </div>

            <div class="rounded-3xl border border-slate-800 bg-slate-900 p-8 hover:border-red-500 transition">

                <div class="text-5xl mb-5">

                    🧠

                </div>

                <h3 class="text-2xl font-bold text-white">

                    Quiz

                </h3>

                <p class="mt-4 text-slate-400">

                    Test your knowledge and improve your understanding of the format.

                </p>

            </div>

        </div>

    </div>

</section>

@endsection