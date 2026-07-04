@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-14">

    <a
        href="{{ route('guides.index') }}"
        class="inline-flex items-center gap-2 text-slate-400 hover:text-red-400 transition">

        ← Back to Guides

    </a>

    <div
        class="mt-8 rounded-3xl border border-slate-800 bg-slate-900 p-10">

        <span
            class="inline-flex rounded-full bg-blue-600 px-4 py-2 text-sm font-semibold text-white">

            GUIDE

        </span>

        <h1
            class="mt-6 text-5xl font-black text-white">

            {{ $guide->title }}

        </h1>

        @if($guide->description)

        <p
            class="mt-5 text-lg leading-8 text-slate-300">

            {{ $guide->description }}

        </p>

        @endif

    </div>

    <div
        class="mt-10 rounded-3xl border border-slate-800 bg-slate-900 p-10">

        <article
            class="prose prose-invert prose-lg max-w-none
            prose-headings:text-white
            prose-p:text-slate-200
            prose-p:leading-8
            prose-p:text-justify
            prose-strong:text-white
            prose-a:text-red-400
            prose-li:text-slate-200
            prose-img:rounded-xl">

            {!! $guide->content !!}

        </article>

    </div>

</div>

@endsection