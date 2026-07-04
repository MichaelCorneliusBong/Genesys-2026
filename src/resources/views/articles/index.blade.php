@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-6">

    Articles

</h1>

@foreach($articles as $article)

<div class="border rounded-lg p-5 mb-4">

    <h2 class="text-2xl font-bold">

        {{ $article->title }}

    </h2>

    <p>

        Status :

        {{ ucfirst($article->status) }}

    </p>

</div>

@endforeach

{{ $articles->links() }}

@endsection