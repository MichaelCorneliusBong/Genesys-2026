@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-14">

    {{-- Header --}}
    <div class="mb-12">

        <span
            class="inline-flex items-center rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

            News & Guides

        </span>

        <h1
            class="mt-5 text-5xl font-black text-white">

            Articles

        </h1>

        <p
            class="mt-4 max-w-3xl text-lg text-slate-400">

            Read the latest articles, tournament reports, format updates,
            and strategy discussions from the Genesys community.

        </p>

    </div>

    @if($articles->count())

    <div
        class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900">

        @foreach($articles as $article)

        <a
            href="{{ route('articles.show',$article) }}"
            class="group relative block border-b border-slate-800 last:border-0 overflow-hidden">

            {{-- Banner --}}
            @if($article->thumbnail)

                <img
                    src="{{ asset('storage/'.$article->thumbnail) }}"
                    class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105">

            @endif

            {{-- Overlay --}}
            <div
                class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-black/40">

            </div>

            {{-- Content --}}
            <div
                class="relative z-10 flex justify-between items-end px-8 py-10 min-h-[240px]">

                <div class="max-w-3xl">

                    <span
                        class="inline-flex rounded-full
                        {{ $article->status == 'published'
                            ? 'bg-green-600'
                            : 'bg-yellow-600'
                        }}
                        px-4 py-2 text-sm font-semibold text-white">

                        {{ ucfirst($article->status) }}

                    </span>

                    <h2
                        class="mt-5 text-4xl font-black text-white group-hover:text-red-400 transition">

                        {{ $article->title }}

                    </h2>

                    @if($article->excerpt)

                        <p
                            class="mt-4 text-slate-300 text-lg leading-8">

                            {{ Str::limit($article->excerpt,180) }}

                        </p>

                    @endif

                </div>

                <div>

                    <span
                        class="rounded-xl bg-red-600 px-6 py-3 font-semibold text-white group-hover:bg-red-700 transition">

                        Read →

                    </span>

                </div>

            </div>

        </a>

        @endforeach

    </div>

    <div class="mt-12">

        {{ $articles->links() }}

    </div>

    @else

    <div
        class="rounded-3xl border border-slate-800 bg-slate-900 py-20 text-center">

        <div
            class="text-6xl">

            📰

        </div>

        <h2
            class="mt-6 text-3xl font-bold text-white">

            No Articles Yet

        </h2>

        <p
            class="mt-4 text-slate-400">

            Articles will appear here once they have been published.

        </p>

    </div>

    @endif

</div>

@endsection