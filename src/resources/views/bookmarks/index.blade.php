@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Header --}}
    <div class="mb-12">

        <span
            class="inline-flex items-center rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

            My Collection

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            Bookmarked Decks

        </h1>

        <p
            class="mt-4 text-lg text-slate-400">

            Your saved deck lists for quick access.

        </p>

    </div>

    @if($bookmarks->count())

    <div
        class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">

        @foreach($bookmarks as $bookmark)

        <div
            class="group border-b border-slate-800 last:border-0 hover:bg-slate-800/60 transition">

            <div
                class="flex items-center justify-between px-8 py-6">

                {{-- Left --}}
                <div class="flex items-center gap-5">

                    <div
                        class="w-14 h-14 rounded-2xl bg-red-600 flex items-center justify-center text-white text-xl">

                        ⭐

                    </div>

                    <div>

                        <h2
                            class="text-2xl font-bold text-white group-hover:text-red-400 transition">

                            {{ $bookmark->deck->name }}

                        </h2>

                        <p
                            class="mt-1 text-slate-400">

                            {{ $bookmark->deck->archetype->name }}

                        </p>

                    </div>

                </div>

                {{-- Right --}}
                <div
                    class="flex items-center gap-3">

                    <a
                        href="{{ route('decks.show',$bookmark->deck) }}"
                        class="rounded-xl bg-red-600 hover:bg-red-700 px-6 py-3 text-white font-semibold transition">

                        View Deck →

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <div
        class="rounded-3xl border border-slate-800 bg-slate-900 py-20 text-center">

        <div
            class="text-6xl">

            ⭐

        </div>

        <h2
            class="mt-6 text-3xl font-bold text-white">

            No Bookmarks Yet

        </h2>

        <p
            class="mt-4 text-slate-400">

            Save your favorite decks to access them quickly later.

        </p>

        <a
            href="{{ route('decks.index') }}"
            class="inline-flex mt-8 rounded-xl bg-red-600 hover:bg-red-700 px-6 py-3 font-semibold text-white transition">

            Browse Decks

        </a>

    </div>

    @endif

</div>

@endsection