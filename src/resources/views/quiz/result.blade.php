@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 py-20 text-center">

    @php
        if ($score == $cards->count()) {
            $title = "Perfect!";
            $color = "text-yellow-400";
            $svg = '<path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>';
        } elseif ($score >= 8) {
            $title = "Excellent!";
            $color = "text-green-400";
            $svg = '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>';
        } elseif ($score >= 6) {
            $title = "Good Job!";
            $color = "text-blue-400";
            $svg = '<path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>';
        } else {
            $title = "Keep Learning!";
            $color = "text-red-400";
            $svg = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>';
        }
    @endphp

    <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-12">

        <div class="flex justify-center mb-6">
            <svg class="w-20 h-20 {{ $color }}" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                {!! $svg !!}
            </svg>
        </div>

        <h1 class="text-5xl font-black {{ $color }} uppercase tracking-tight">
            {{ $title }}
        </h1>

        <div class="mt-10 text-zinc-500 uppercase tracking-widest text-xs font-bold">
            Your Score
        </div>

        <div class="mt-3 text-7xl font-black text-white">
            {{ $score }} <span class="text-zinc-600 text-4xl">/ {{ $cards->count() }}</span>
        </div>

        <div class="mt-12">
            <a href="{{ route('quiz.index') }}" class="inline-block rounded-md bg-zinc-800 hover:bg-zinc-700 px-8 py-3 font-bold text-white transition">
                Return to Quiz Home
            </a>
        </div>

    </div>

</div>

@endsection