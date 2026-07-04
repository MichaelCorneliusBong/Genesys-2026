@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

Genesys Point Quiz

</h1>

<form
method="POST"
action="{{ route('quiz.submit') }}">

@csrf

@foreach($cards as $index => $card)

<div class="border rounded-lg p-6 mb-6">

<h2 class="text-2xl font-bold mb-3">

Question {{ $index+1 }}

</h2>

<p class="mb-4">

Berapa Genesys Point dari

<strong>

{{ $card->name }}

</strong>

?

</p>

@php

$options = collect([
    $card->genesys_points,
    max(0,$card->genesys_points-1),
    $card->genesys_points+1,
    $card->genesys_points+2,
])->unique()->shuffle();

@endphp

@foreach($options as $option)

<label class="block mb-2">

<input
type="radio"
name="answer_{{ $card->id }}"
value="{{ $option }}"
required>

{{ $option }}

</label>

@endforeach

</div>

@endforeach

<button
class="px-6 py-3 bg-green-600 text-white rounded">

Submit Quiz

</button>

</form>

@endsection