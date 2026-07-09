@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-4 sm:px-6 py-12">

    {{-- Back Navigation --}}
    <a href="{{ route('guides.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-400 hover:text-white transition-colors mb-8 uppercase tracking-widest">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Back to Guides
    </a>

    {{-- Header Dashboard Panel --}}
    <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-10 shadow-md">
        
        <div class="mb-4">
            <span class="inline-flex rounded border border-zinc-700 bg-zinc-800 px-2.5 py-1 text-xs font-bold text-zinc-300 uppercase tracking-widest shadow-sm">
                Guide
            </span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
            {{ $guide->title }}
        </h1>

        @if($guide->description)
            <p class="mt-5 text-base sm:text-lg text-zinc-300 leading-relaxed text-justify border-l-4 border-red-600 pl-4">
                {{ $guide->description }}
            </p>
        @endif

    </div>

    {{-- Article Content --}}
    <div class="mt-6 rounded-md border border-zinc-800 bg-zinc-950 p-6 sm:p-10 shadow-md">

        <article class="prose prose-invert prose-zinc max-w-none
            prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
            prose-p:text-zinc-300 prose-p:leading-relaxed prose-p:text-justify
            prose-strong:text-white
            prose-a:text-red-400 prose-a:no-underline hover:prose-a:underline hover:prose-a:text-red-300
            prose-li:text-zinc-300
            prose-img:rounded-md prose-img:shadow-md
            prose-blockquote:border-l-red-600 prose-blockquote:bg-zinc-900/50 prose-blockquote:py-1 prose-blockquote:px-4 prose-blockquote:not-italic prose-blockquote:rounded-r-md">
            
            {!! $guide->content !!}
            
        </article>

    </div>

</div>

@endsection