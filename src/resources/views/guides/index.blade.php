@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Header --}}
    <div class="mb-12">

        <span class="inline-flex rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-2 text-sm text-blue-400">

            Knowledge Base

        </span>

        <h1 class="mt-5 text-5xl font-black text-white">

            Guides

        </h1>

        <p class="mt-4 max-w-3xl text-lg text-slate-400">

            Learn the fundamentals of the Genesys Format, improve your gameplay,
            and master every archetype through detailed strategy guides.

        </p>

    </div>

    @if($guides->count())

    <div class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">

        @foreach($guides as $guide)

        <a
            href="{{ route('guides.show',$guide) }}"
            class="block border-b border-slate-800 last:border-0 hover:bg-slate-800/60 transition">

            <div class="flex justify-between items-center px-8 py-7">

                <div class="flex-1">

                    <span class="inline-flex rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">

                        GUIDE

                    </span>

                    <h2 class="mt-4 text-2xl font-bold text-white hover:text-red-400 transition">

                        {{ $guide->title }}

                    </h2>

                    <p class="mt-3 text-slate-400 leading-7">

                        {{ Str::limit($guide->description,160) }}

                    </p>

                </div>

                <div>

                    <span class="rounded-xl bg-red-600 px-5 py-3 font-semibold text-white">

                        Read →

                    </span>

                </div>

            </div>

        </a>

        @endforeach

    </div>

    <div class="mt-10">

        {{ $guides->links() }}

    </div>

    @else

    <div class="rounded-3xl border border-slate-800 bg-slate-900 py-20 text-center">

        <div class="text-6xl">

            📚

        </div>

        <h2 class="mt-6 text-3xl font-bold text-white">

            No Guide Available

        </h2>

        <p class="mt-4 text-slate-400">

            New guides will appear here.

        </p>

    </div>

    @endif

</div>

@endsection