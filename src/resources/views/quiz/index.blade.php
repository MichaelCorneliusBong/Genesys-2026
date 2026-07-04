@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

Genesys Point Quiz

</h1>

<p class="mb-8">

Jawab 10 pertanyaan mengenai Genesys Point.

</p>

<a
href="{{ route('quiz.start') }}"
class="px-6 py-3 bg-blue-600 text-white rounded">

Start Quiz

</a>

@endsection