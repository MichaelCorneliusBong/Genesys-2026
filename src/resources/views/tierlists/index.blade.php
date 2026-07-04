@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-6">

Tier Lists

</h1>

@foreach($tierLists as $tier)

<div class="border rounded-lg p-5 mb-4">

<h2 class="text-2xl font-bold">

{{ $tier->title }}

</h2>

<p>

{{ $tier->description }}

</p>

</div>

@endforeach

{{ $tierLists->links() }}

@endsection