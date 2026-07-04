@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    <a
        href="{{ route('tierlists.index') }}"
        class="inline-flex items-center gap-2 text-slate-400 hover:text-red-400 transition">

        ← Back to Tier Lists

    </a>

    <div class="mt-8 mb-12">

        <span
            class="inline-flex rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

            Tier List

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            {{ $tierList->name }}

        </h1>

        @if($tierList->description)

        <p
            class="mt-4 text-lg text-slate-400">

            {{ $tierList->description }}

        </p>

        @endif

    </div>

    @foreach(['S','A','B','C'] as $tier)

    @php

        $items = $tierList->items
            ->where('tier',$tier)
            ->sortBy('position');

    @endphp

    @if($items->count())

    <div
        class="mb-10 rounded-3xl border border-slate-800 bg-slate-900 overflow-hidden">

        <div
            class="px-8 py-5 border-b border-slate-800">

                    <h2
                        class="text-3xl font-bold text-white">

                        {{ $tier }} Tier

                    </h2>

                </div>

                @foreach($items as $item)

                <a
                    href="{{ route('decks.list',$item->archetype->slug) }}"
                    class="block border-b border-slate-800 last:border-0 hover:bg-slate-800/60 transition">

                    <div
                        class="flex items-center justify-between px-8 py-6">

                        <div class="flex items-center gap-5">

            @if($item->featuredCard)

                <img
                    src="{{ $item->featuredCard->image_path }}"
                    class="w-20 rounded-lg border border-slate-700">

            @endif

            <div>

                <h3
                    class="text-2xl font-bold text-white">

                    {{ $item->archetype->name }}

                </h3>

            </div>

        </div>

                <div
                    class="text-slate-500">

                    #{{ $item->position }}

                </div>

            </div>

        </a>

        @endforeach

    </div>

    @endif

    @endforeach

</div>

@endsection