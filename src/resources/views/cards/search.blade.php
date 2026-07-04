@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Header --}}
    <div class="mb-10">

        <span
            class="inline-flex items-center rounded-full bg-red-500/10 border border-red-500/30 px-4 py-2 text-red-400 text-sm">

            Card Database

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            Search Cards

        </h1>

        <p
            class="mt-3 text-slate-400 text-lg">

            Browse every available card in the Genesys format database.

        </p>

    </div>

    {{-- Search --}}
    <form
        method="GET"
        action="{{ route('cards.search') }}"
        class="mb-10">

        <div
            class="relative">

            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search card name..."
                autofocus
                class="w-full rounded-2xl border border-slate-700 bg-slate-900 px-6 py-5 text-lg text-white placeholder:text-slate-500 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">

            <button
                class="absolute right-3 top-1/2 -translate-y-1/2 rounded-xl bg-red-600 px-6 py-3 text-white hover:bg-red-700 transition">

                Search

            </button>

        </div>

    </form>

    {{-- Result --}}
    <div
        class="flex items-center justify-between mb-8">

        <p
            class="text-slate-400">

            Showing

            <span class="text-white font-semibold">

                {{ $cards->count() }}

            </span>

            cards

        </p>

        @if(request('q'))

            <span
                class="rounded-full bg-slate-800 px-4 py-2 text-sm text-slate-300">

                Search :

                <strong>

                    "{{ request('q') }}"

                </strong>

            </span>

        @endif

    </div>

    {{-- Cards --}}
    <div
        class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-7">

        @foreach($cards as $card)

            <div
                class="group rounded-3xl border border-slate-800 bg-slate-900 p-4 hover:border-red-500 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">

                <div class="overflow-hidden rounded-2xl">

                    <img
                        src="{{ $card->image_path }}"
                        class="w-full transition duration-300 group-hover:scale-105">

                </div>

                <div class="mt-5">

                    <h3
                        class="text-sm font-semibold text-white line-clamp-2">

                        {{ $card->name }}

                    </h3>

                    <div
                        class="mt-4 flex items-center justify-between">

                        <span
                            class="rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">

                            {{ $card->genesys_points }} GP

                        </span>

                        <span
                            class="text-xs text-slate-500">

                            {{ $card->type }}

                        </span>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

    {{-- Pagination --}}
    <div class="mt-14">

        {{ $cards->withQueryString()->links() }}

    </div>

</div>

@endsection