@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">

    <div class="mb-10">
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">
            Genesys Point Quiz
        </h1>
    </div>

    <form method="POST" action="{{ route('quiz.result') }}">
        @csrf

        @foreach($cards as $index => $card)
        <div class="mb-8 rounded-md border border-zinc-800 bg-zinc-900/50 p-6 sm:p-8">

            <div class="flex justify-between items-center mb-6">
                <span class="rounded bg-zinc-950 border border-zinc-700 px-3 py-1 text-xs font-bold text-white uppercase tracking-widest">
                    Question {{ $index+1 }}
                </span>
                <span class="text-xs font-bold text-zinc-500">
                    {{ $index+1 }}/{{ $cards->count() }}
                </span>
            </div>

            <h2 class="text-2xl font-black text-white tracking-tight">
                {{ $card->name }}
            </h2>

            <p class="mt-2 text-sm text-zinc-400">
                How many Genesys Points does this card have?
            </p>

            <div class="grid md:grid-cols-2 gap-3 mt-6">
                @php
                    $options = collect([
                        $card->genesys_points,
                        max(0, $card->genesys_points-1),
                        $card->genesys_points+1,
                        $card->genesys_points+2,
                    ])->unique()->shuffle();
                @endphp

                @foreach($options as $option)
                <label class="cursor-pointer group">
                    <input type="radio" class="peer hidden" name="answer_{{ $card->id }}" value="{{ $option }}" required>
                    <div class="rounded-md border border-zinc-700 bg-zinc-950 p-4 text-center text-white font-bold transition peer-checked:border-red-500 peer-checked:bg-red-950/50 group-hover:border-zinc-500">
                        {{ $option }}
                    </div>
                </label>
                @endforeach
            </div>

        </div>
        @endforeach

        <button class="w-full rounded-md bg-red-600 hover:bg-red-500 py-4 text-lg font-black text-white transition shadow-lg shadow-red-950/50">
            Submit Answers
        </button>
    </form>

</div>

@endsection