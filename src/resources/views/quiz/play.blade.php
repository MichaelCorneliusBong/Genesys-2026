@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-14">

    <h1
        class="text-5xl font-black text-white mb-10">

        Genesys Point Quiz

    </h1>

    <form
        method="POST"
        action="{{ route('quiz.submit') }}">

        @csrf

        @foreach($cards as $index => $card)

        <div
            class="mb-8 rounded-3xl border border-slate-800 bg-slate-900 p-8">

            <div
                class="flex justify-between items-center mb-6">

                <span
                    class="rounded-full bg-red-600 px-4 py-2 text-white text-sm">

                    Question {{ $index+1 }}

                </span>

                <span
                    class="text-slate-500">

                    {{ $index+1 }}/{{ $cards->count() }}

                </span>

            </div>

            <h2
                class="text-3xl font-bold text-white">

                {{ $card->name }}

            </h2>

            <p
                class="mt-4 text-slate-400">

                How many Genesys Points does this card have?

            </p>

            <div
                class="grid md:grid-cols-2 gap-4 mt-8">

                @php

                $options = collect([
                    $card->genesys_points,
                    max(0,$card->genesys_points-1),
                    $card->genesys_points+1,
                    $card->genesys_points+2,
                ])->unique()->shuffle();

                @endphp

                @foreach($options as $option)

                <label
                    class="cursor-pointer">

                    <input
                        type="radio"
                        class="peer hidden"
                        name="answer_{{ $card->id }}"
                        value="{{ $option }}"
                        required>

                    <div
                        class="rounded-xl border border-slate-700 bg-slate-800 p-5 text-center text-white transition peer-checked:border-red-500 peer-checked:bg-red-600 hover:border-red-400">

                        {{ $option }}

                    </div>

                </label>

                @endforeach

            </div>

        </div>

        @endforeach

        <button
            class="w-full rounded-xl bg-red-600 py-4 text-xl font-bold text-white hover:bg-red-700 transition">

            Submit Quiz

        </button>

    </form>

</div>

@endsection