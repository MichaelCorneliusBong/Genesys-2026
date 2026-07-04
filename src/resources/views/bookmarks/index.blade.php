@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

My Bookmarks

</h1>

@if($bookmarks->count())

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach($bookmarks as $bookmark)

<div class="bg-white rounded-xl shadow overflow-hidden">

    @if($bookmark->deck->thumbnail)

        <img
        src="{{ asset('storage/'.$bookmark->deck->thumbnail) }}"
        class="w-full h-48 object-cover">

    @endif

    <div class="p-5">

        <h2 class="text-2xl font-bold">

            {{ $bookmark->deck->name }}

        </h2>

        <p class="text-gray-500 mt-2">

            {{ $bookmark->deck->archetype->name }}

        </p>

        <div class="mt-4">

            <a
            href="{{ route('decks.show',$bookmark->deck) }}"
            class="px-4 py-2 rounded bg-blue-600 text-white">

                View Deck

            </a>

        </div>

    </div>

</div>

@endforeach

</div>

@else

<div class="bg-yellow-100 border border-yellow-300 rounded-lg p-6">

Belum ada deck yang dibookmark.

</div>

@endif

@endsection