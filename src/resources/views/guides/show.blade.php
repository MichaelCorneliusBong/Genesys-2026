@extends('layouts.app')

@section('content')

<a href="{{ route('decks.index') }}">

← Back

</a>

<h1 class="text-4xl font-bold mt-4">

{{ $deck->name }}

</h1>

<p class="mt-4">

{{ $deck->description }}

</p>

<hr class="my-6">

<p>

Deck Detail Coming Soon...

</p>

@endsection