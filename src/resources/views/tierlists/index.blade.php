@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Header --}}
    <div class="mb-12">

        <span
            class="inline-flex items-center rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

            Meta Analysis

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            Tier Lists

        </h1>

        <p
            class="mt-4 text-lg text-slate-400 max-w-3xl">

            Explore the current Genesys Format metagame.
            Each tier list ranks archetypes based on tournament performance,
            consistency, and overall competitiveness.

        </p>

    </div>

    @if($tierLists->count())

    <div
        class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">

        @foreach($tierLists as $tier)

        <a
            href="{{ route('tierlists.show',$tier) }}"
            class="block border-b border-slate-800 last:border-0 hover:bg-slate-800/60 transition">

            <div
                class="flex items-center justify-between px-8 py-7">

                <div class="flex-1">

                    <h2
                        class="text-2xl font-bold text-white hover:text-red-400 transition">

                        {{ $tier->name }}

                    </h2>

                    <p
                        class="mt-3 text-slate-400 leading-7">

                        {{ Str::limit($tier->description,180) }}

                    </p>

                </div>

                <div
                    class="ml-8">

                    <span
                        class="rounded-xl bg-red-600 px-5 py-3 text-white font-semibold">

                        View →

                    </span>

                </div>

            </div>

        </a>

        @endforeach

    </div>

    <div class="mt-12">

        {{ $tierLists->links() }}

    </div>

    @else

    <div
        class="rounded-3xl border border-slate-800 bg-slate-900 py-20 text-center">

        <div class="text-6xl">

            📊

        </div>

        <h2
            class="mt-6 text-3xl font-bold text-white">

            No Tier List Available

        </h2>

        <p
            class="mt-4 text-slate-400">

            There are currently no published tier lists.

        </p>

    </div>

    @endif

</div>

@endsection