@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Back --}}
    <a
        href="{{ route('decks.index') }}"
        class="inline-flex items-center gap-2 text-slate-400 hover:text-red-400 transition">

        ← Back to Archetypes

    </a>

    {{-- Header --}}
    <div class="mt-8 mb-12">

        <span
            class="inline-flex items-center rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

            Archetype

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            {{ $archetype->name }}

        </h1>

        <p
            class="mt-4 max-w-4xl text-slate-400">

            {{ $archetype->description }}

        </p>

    </div>

    @if($decks->count())

    <div
        class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">

        @foreach($decks as $deck)

        <div
            class="group border-b border-slate-800 last:border-0 hover:bg-slate-800/60 transition">

            <div
                class="flex flex-col lg:flex-row lg:items-center justify-between px-8 py-6 gap-6">

                {{-- Left --}}
                <div class="flex-1">

                    <h2
                        class="text-2xl font-bold text-white group-hover:text-red-400 transition">

                        {{ $deck->name }}

                    </h2>

                    <p
                        class="mt-2 text-slate-400">

                        By

                        <span class="text-white">

                            {{ $deck->author ?: 'Unknown Player' }}

                        </span>

                    </p>

                </div>

                {{-- Center --}}
                <div
                    class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-sm min-w-[600px]">

                    <div>

                        <p
                            class="text-slate-500 uppercase tracking-wider">

                            Tournament

                        </p>

                        <p
                            class="mt-2 text-white font-semibold">

                            {{ $deck->tournament_name ?: '-' }}

                        </p>

                    </div>

                    <div>

                        <p
                            class="text-slate-500 uppercase tracking-wider">

                            Placement

                        </p>

                        <p
                            class="mt-2 text-white font-semibold">

                            {{ $deck->placement ?: '-' }}

                        </p>

                    </div>

                    <div>

                        <p
                            class="text-slate-500 uppercase tracking-wider">

                            Difficulty

                        </p>

                        <span
                            class="inline-flex mt-2 rounded-full bg-red-600 px-3 py-1 text-xs font-semibold text-white">

                            {{ ucfirst($deck->difficulty) }}

                        </span>

                    </div>

                    <div>

                        <p
                            class="text-slate-500 uppercase tracking-wider">

                            Event Date

                        </p>

                        <p
                            class="mt-2 text-white font-semibold">

                            {{ $deck->event_date ?: '-' }}

                        </p>

                    </div>

                </div>

                {{-- Right --}}
                <div
                    class="lg:w-44 flex justify-end">

                    <a
                        href="{{ route('decks.show',$deck->slug) }}"
                        class="rounded-xl bg-red-600 hover:bg-red-700 px-6 py-3 text-white font-semibold transition">

                        View →

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <div class="mt-10">

        {{ $decks->links() }}

    </div>

    @else

    <div
        class="rounded-3xl border border-slate-800 bg-slate-900 p-20 text-center">

        <h2
            class="text-3xl font-bold text-white">

            No Deck Found

        </h2>

        <p
            class="mt-4 text-slate-400">

            There are currently no deck variants for this archetype.

        </p>

    </div>

    @endif

</div>

@endsection