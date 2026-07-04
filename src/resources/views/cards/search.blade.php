@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

Card Database

</h1>

<form
method="GET"
action="{{ route('cards.search') }}"
class="mb-8">

<input
type="text"
name="q"
value="{{ request('q') }}"
placeholder="Search Card..."
class="border rounded p-3 w-full">

</form>

<div
class="grid grid-cols-5 gap-4">

@foreach($cards as $card)

<div>

<img
src="{{ $card->image_path }}"
class="rounded shadow">

<p
class="text-sm text-center mt-2">

{{ $card->name }}

</p>

</div>

@endforeach

</div>

<div class="mt-10">

{{ $cards->withQueryString()->links() }}

</div>

@endsection