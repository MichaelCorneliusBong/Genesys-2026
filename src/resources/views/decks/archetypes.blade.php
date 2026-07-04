@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Header --}}
    <div class="mb-12">

        <span
            class="inline-flex items-center rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

            Deck Database

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            Browse Archetypes

        </h1>

        <p
            class="mt-4 max-w-3xl text-lg text-slate-400">

            Explore every supported archetype in the Genesys Format.
            Each archetype contains tournament-ready deck variants,
            player submissions, and optimized deck builds.

        </p>

    </div>

    {{-- Grid --}}
    <div
        class="grid gap-8 sm:grid-cols-2 xl:grid-cols-4">

        @foreach($archetypes as $archetype)

            <a
                href="{{ route('decks.list',$archetype->slug) }}"
                class="group">

                <div
                    class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900 transition-all duration-300 hover:-translate-y-2 hover:border-red-500 hover:shadow-2xl hover:shadow-red-500/10">

                    {{-- Thumbnail --}}
                    <div class="relative overflow-hidden">

                        @if($archetype->thumbnail)

                            <img
                                src="{{ asset('storage/'.$archetype->thumbnail) }}"
                                class="h-56 w-full object-cover transition duration-500 group-hover:scale-110">

                        @else

                            <div
                                class="flex h-56 items-center justify-center bg-slate-800">

                                <span
                                    class="text-slate-500">

                                    No Image

                                </span>

                            </div>

                        @endif

                        {{-- Deck Count --}}
                        <div
                            class="absolute right-4 top-4 rounded-full bg-red-600 px-4 py-2 text-sm font-bold text-white shadow-lg">

                            {{ $archetype->decks_count }}

                            Decks

                        </div>

                    </div>

                    {{-- Content --}}
                    <div class="p-6">

                        <h2
                            class="text-2xl font-bold text-white transition group-hover:text-red-400">

                            {{ $archetype->name }}

                        </h2>

                        <p
                            class="mt-4 line-clamp-3 text-sm leading-7 text-slate-400">

                            {{ $archetype->description }}

                        </p>

                        <div
                            class="mt-8 flex items-center justify-between">

                            <span
                                class="font-semibold text-red-500 transition group-hover:translate-x-1">

                                View →

                            </span>

                        </div>

                    </div>

                </div>

            </a>

        @endforeach

    </div>

</div>

@endsection