@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-14">

    {{-- Back --}}
    <a
        href="{{ route('articles.index') }}"
        class="inline-flex items-center gap-2 text-slate-400 hover:text-red-400 transition">

        ← Back to Articles

    </a>

    {{-- Header --}}
    <div
        class="mt-8 rounded-3xl border border-slate-800 bg-slate-900 p-8">

        <div class="flex flex-wrap items-center gap-4">

            <span
                class="rounded-full bg-red-500/10 border border-red-500/30 px-4 py-2 text-sm text-red-400">

                Article

            </span>

            <span
                class="rounded-full
                {{ $article->status == 'published'
                    ? 'bg-green-600'
                    : 'bg-yellow-600'
                }}
                px-4 py-2 text-sm font-semibold text-white">

                {{ ucfirst($article->status) }}

            </span>

        </div>

        <h1
            class="mt-6 text-5xl font-black text-white leading-tight">

            {{ $article->title }}

        </h1>

        <div
            class="mt-8 flex flex-wrap gap-8 text-slate-400">

            <div>

                <span class="text-slate-500">

                    Published

                </span>

                <br>

                {{ $article->created_at->format('d F Y') }}

            </div>

            @if($article->author)

            <div>

                <span class="text-slate-500">

                    Author

                </span>

                <br>

                {{ $article->author }}

            </div>

            @endif

        </div>

    </div>

    {{-- Thumbnail --}}
    @if($article->thumbnail)

    <div
        class="mt-10 overflow-hidden rounded-3xl border border-slate-800">

        <img
            src="{{ asset('storage/'.$article->thumbnail) }}"
            class="w-full">

    </div>

    @endif

    {{-- Content --}}
    <div
        class="mt-10 rounded-3xl border border-slate-800 bg-slate-900 p-10">

        <article
          class="prose prose-invert prose-lg max-w-none
           prose-headings:text-white
           prose-p:text-slate-200
           prose-p:text-justify
           prose-strong:text-white
           prose-a:text-red-400
           prose-li:text-slate-200
           prose-blockquote:text-slate-300">

    {!! $article->content !!}

</article>

    </div>

</div>

@endsection