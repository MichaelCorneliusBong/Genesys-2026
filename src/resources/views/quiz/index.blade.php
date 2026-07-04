@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-20 text-center">

    <span
        class="inline-flex rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm text-red-400">

        Quiz Challenge

    </span>

    <h1
        class="mt-6 text-5xl font-black text-white">

        Genesys Point Quiz

    </h1>

    <p
        class="mt-6 text-lg text-slate-400 leading-8">

        Test your knowledge of the Genesys Format.

        You will answer <strong class="text-white">10 questions</strong>
        about the Genesys Point value of popular cards.

    </p>

    <div
        class="mt-12 grid grid-cols-3 gap-6">

        <div class="rounded-2xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-4xl">

                📝

            </div>

            <div class="mt-4 text-white font-bold">

                10 Questions

            </div>

        </div>

        <div class="rounded-2xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-4xl">

                ⏱️

            </div>

            <div class="mt-4 text-white font-bold">

                No Time Limit

            </div>

        </div>

        <div class="rounded-2xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-4xl">

                🏆

            </div>

            <div class="mt-4 text-white font-bold">

                Save High Score

            </div>

        </div>

    </div>

    <a
        href="{{ route('quiz.start') }}"
        class="inline-flex mt-12 rounded-xl bg-red-600 px-10 py-4 text-lg font-bold text-white hover:bg-red-700 transition">

        Start Quiz →

    </a>

</div>

@endsection