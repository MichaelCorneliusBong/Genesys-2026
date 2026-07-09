@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

    {{-- Header --}}
    <div class="mb-10 border-l-4 border-red-600 pl-4">
        <span class="text-xs font-black text-red-500 uppercase tracking-widest block mb-2">
            News & Updates
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
            Articles
        </h1>
        <p class="mt-4 max-w-3xl text-base text-zinc-300 leading-relaxed text-justify">
            Read the latest articles, tournament reports, format updates,
            and strategy discussions from the Genesys community.
        </p>
    </div>

    @if($articles->count())

        {{-- Article Feed --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 shadow-md">
            @foreach($articles as $article)
                <a href="{{ route('articles.show', $article) }}" class="group relative block border-b border-zinc-800 last:border-0 overflow-hidden bg-zinc-950 transition-colors">

                    {{-- Banner Image --}}
                    @if($article->thumbnail)
                        <img src="{{ asset('storage/'.$article->thumbnail) }}" class="absolute inset-0 h-full w-full object-cover opacity-40 transition-transform duration-700 group-hover:scale-105 group-hover:opacity-50">
                    @endif

                    {{-- Tactical Gradient Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/90 to-transparent"></div>

                    {{-- Content --}}
                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-end px-6 sm:px-8 py-8 sm:py-10 min-h-[220px] gap-6">

                        <div class="max-w-3xl">
                            {{-- Status Badge --}}
                            <span class="inline-flex rounded-sm border px-2 py-0.5 text-[10px] font-bold uppercase tracking-widest shadow-sm
                                {{ $article->status == 'published'
                                    ? 'bg-green-950/50 border-green-800 text-green-400'
                                    : 'bg-yellow-950/50 border-yellow-800 text-yellow-400'
                                }}">
                                {{ ucfirst($article->status) }}
                            </span>

                            <h2 class="mt-4 text-3xl font-black text-white group-hover:text-red-400 transition-colors leading-tight">
                                {{ $article->title }}
                            </h2>

                            @if($article->excerpt)
                                <p class="mt-3 text-sm text-zinc-300 leading-relaxed max-w-2xl text-justify">
                                    {{ \Illuminate\Support\Str::limit($article->excerpt, 180) }}
                                </p>
                            @endif
                        </div>

                        {{-- Action Button --}}
                        <div class="w-full md:w-auto shrink-0">
                            <div class="w-full md:w-32 text-center rounded bg-zinc-800/80 backdrop-blur-sm group-hover:bg-red-600 border border-zinc-700 group-hover:border-red-500 px-4 py-2.5 text-sm font-bold text-white transition-all flex items-center justify-center gap-2">
                                Read
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </div>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $articles->links() }}
        </div>

    @else

        {{-- Empty State --}}
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-16 text-center shadow-md">
            <svg class="w-12 h-12 text-zinc-600 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <h2 class="text-xl font-bold text-white mb-2">No Articles Yet</h2>
            <p class="text-sm text-zinc-400">Articles and tournament reports will appear here once they are published.</p>
        </div>

    @endif

</div>

@endsection