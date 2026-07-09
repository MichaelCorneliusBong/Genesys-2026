@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">

    <div class="text-center mb-12">
        <span class="inline-flex items-center rounded border border-red-500/30 bg-red-950/30 px-3 py-1 text-xs font-black text-red-500 uppercase tracking-widest">
            Quiz Challenge
        </span>
        <h1 class="mt-6 text-4xl md:text-5xl font-black text-white tracking-tight">
            Genesys Point Quiz
        </h1>
        <p class="mt-6 text-base text-zinc-300 leading-relaxed max-w-2xl mx-auto">
            Test your knowledge of the Genesys Format. You will answer <strong>10 questions</strong> about the Genesys Point value of popular cards.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 flex flex-col items-center text-center">
            <div class="w-10 h-10 mb-4 text-red-500">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            </div>
            <div class="text-white font-bold tracking-tight">10 Questions</div>
        </div>

        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 flex flex-col items-center text-center">
            <div class="w-10 h-10 mb-4 text-red-500">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="text-white font-bold tracking-tight">No Time Limit</div>
        </div>

        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6 flex flex-col items-center text-center">
            <div class="w-10 h-10 mb-4 text-red-500">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
            </div>
            <div class="text-white font-bold tracking-tight">Challenge Mode</div>
        </div>

    </div>

    <div class="mt-12 text-center">
        <a href="{{ route('quiz.play') }}" class="inline-block rounded-md bg-red-600 hover:bg-red-500 px-8 py-3.5 text-base font-bold text-white transition shadow-lg shadow-red-950/50">
            Start Quiz
        </a>
    </div>

</div>

@endsection