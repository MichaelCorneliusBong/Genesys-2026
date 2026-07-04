@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-20 text-center">

    @if($score == $cards->count())

        @php
            $emoji="🏆";
            $title="Perfect!";
            $color="text-yellow-400";
        @endphp

    @elseif($score >= 8)

        @php
            $emoji="🥇";
            $title="Excellent!";
            $color="text-green-400";
        @endphp

    @elseif($score >= 6)

        @php
            $emoji="👍";
            $title="Good Job!";
            $color="text-blue-400";
        @endphp

    @else

        @php
            $emoji="📚";
            $title="Keep Learning!";
            $color="text-red-400";
        @endphp

    @endif

    <div
        class="rounded-3xl border border-slate-800 bg-slate-900 p-12">

        <div
            class="text-7xl">

            {{ $emoji }}

        </div>

        <h1
            class="mt-6 text-5xl font-black {{ $color }}">

            {{ $title }}

        </h1>

        <div
            class="mt-10 text-slate-400">

            Your Score

        </div>

        <div
            class="mt-3 text-7xl font-black text-white">

            {{ $score }}

            <span
                class="text-slate-500 text-4xl">

                / {{ $cards->count() }}

            </span>

        </div>

        <a
            href="{{ route('quiz.index') }}"
            class="mt-12 inline-flex rounded-xl bg-red-600 px-10 py-4 text-lg font-bold text-white hover:bg-red-700 transition">

            Play Again →

        </a>

    </div>

</div>

@endsection