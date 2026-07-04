@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

Deck Database

</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

@foreach($archetypes as $archetype)

<a href="{{ route('decks.list',$archetype->slug) }}">

<div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

@if($archetype->thumbnail)

<img
src="{{ asset('storage/'.$archetype->thumbnail) }}"
class="w-full h-48 object-cover">

@else

<div class="h-48 bg-gray-200 flex items-center justify-center">

No Image

</div>

@endif

<div class="p-5">

<h2 class="text-xl font-bold">

{{ $archetype->name }}

</h2>

<p class="text-gray-500 mt-2">

{{ Str::limit($archetype->description,80) }}

</p>

<div class="mt-4 text-sm">

{{ $archetype->decks_count }}

Decks Available

</div>

</div>

</div>

</a>

@endforeach

</div>

@endsection