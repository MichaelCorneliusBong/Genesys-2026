@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-6">

    Guides

</h1>

@if($guides->count())

@foreach($guides as $guide)

<div class="border rounded-lg p-5 mb-4">

    <h2 class="text-2xl font-bold">

        {{ $guide->title }}

    </h2>

    <p class="mt-2">

        {{ Str::limit($guide->description, 120) }}

    </p>

    <a href="#">

        Read Guide →

    </a>

</div>

@endforeach

{{ $guides->links() }}

@else

<p>No Guide Available.</p>

@endif

@endsection