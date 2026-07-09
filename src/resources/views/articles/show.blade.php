@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-400 hover:text-white transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Back to Articles
    </a>

    {{-- Header Dashboard Panel --}}
    <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-10 shadow-md">

        <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="inline-flex rounded border border-zinc-700 bg-zinc-800 px-2.5 py-1 text-xs font-bold text-zinc-300 uppercase tracking-widest shadow-sm">
                Article
            </span>

            <span class="inline-flex rounded-sm border px-2 py-0.5 text-[10px] font-bold uppercase tracking-widest shadow-sm
                {{ $article->status == 'published'
                    ? 'bg-green-950/50 border-green-800 text-green-400'
                    : 'bg-yellow-950/50 border-yellow-800 text-yellow-400'
                }}">
                {{ ucfirst($article->status) }}
            </span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
            {{ $article->title }}
        </h1>

        {{-- Meta Info --}}
        <div class="mt-8 flex flex-wrap gap-8 border-t border-zinc-800 pt-6">
            <div>
                <span class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1 block">
                    Published
                </span>
                <span class="font-bold text-zinc-200 text-sm">
                    {{ $article->created_at->format('d F Y') }}
                </span>
            </div>

            @if($article->author)
                <div>
                    <span class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1 block">
                        Author
                    </span>
                    <span class="font-bold text-zinc-200 text-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        {{ $article->author }}
                    </span>
                </div>
            @endif
        </div>

    </div>

    {{-- Thumbnail --}}
    @if($article->thumbnail)
        <div class="mt-8 overflow-hidden rounded-md border border-zinc-800 shadow-md">
            <img src="{{ asset('storage/'.$article->thumbnail) }}" class="w-full object-cover max-h-[500px]">
        </div>
    @endif

    {{-- Article Content --}}
    <div class="mt-8 rounded-md border border-zinc-800 bg-zinc-950 p-6 sm:p-10 shadow-md">
        
        <article class="prose prose-invert prose-zinc max-w-none
            prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
            prose-p:text-zinc-300 prose-p:leading-relaxed prose-p:text-justify
            prose-strong:text-white
            prose-a:text-red-400 prose-a:no-underline hover:prose-a:underline hover:prose-a:text-red-300
            prose-li:text-zinc-300
            prose-img:rounded-md prose-img:shadow-md
            prose-blockquote:border-l-red-600 prose-blockquote:bg-zinc-900/50 prose-blockquote:py-1 prose-blockquote:px-4 prose-blockquote:not-italic prose-blockquote:rounded-r-md">
            
            {!! $article->content !!}
            
        </article>

    </div>

</div>

@endsection