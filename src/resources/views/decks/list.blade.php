
@extends('layouts.app')

@section('content')

<a href="{{ route('decks.index') }}"
   class="text-blue-600">

    ← Back to Archetypes

</a>

<h1 class="text-4xl font-bold mt-4">

    {{ $archetype->name }}

</h1>

<p class="text-gray-500 mb-8">

    {{ $archetype->description }}

</p>

@if($decks->count())

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

@foreach($decks as $deck)

<div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

    @if($deck->thumbnail)

        <img
            src="{{ asset('storage/'.$deck->thumbnail) }}"
            class="w-full h-48 object-cover">

    @endif

    <div class="p-5">

        <h2 class="text-2xl font-bold">

            {{ $deck->name }}

        </h2>

        <div class="mt-4 space-y-2 text-sm">

            <p>

                👤 <strong>Author</strong>

                <br>

                {{ $deck->author ?? '-' }}

            </p>

            <p>

                🏆 <strong>Tournament</strong>

                <br>

                {{ $deck->tournament_name ?? '-' }}

            </p>

            <p>

                🥇 <strong>Placement</strong>

                <br>

                {{ $deck->placement ?? '-' }}

            </p>

            <p>

                📅 <strong>Date</strong>

                <br>

                {{ $deck->event_date ?? '-' }}

            </p>

            <p>

                ⭐ <strong>Difficulty</strong>

                <br>

                {{ $deck->difficulty }}

            </p>

        </div>

        <div class="mt-6">

            <a
                href="{{ route('decks.show',$deck->slug) }}"
                class="px-4 py-2 rounded-lg bg-blue-600 text-white">

                View Deck →

            </a>

        </div>

    </div>

</div>

@endforeach

</div>

<div class="mt-8">

{{ $decks->links() }}

</div>

@else

<p>

No Deck Found.

</p>

@endif

@endsection