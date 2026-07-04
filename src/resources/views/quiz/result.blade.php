@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">

Quiz Result

</h1>

<h2 class="text-2xl mb-6">

Your Score

<strong>

{{ $score }}

/

{{ $cards->count() }}

</strong>

</h2>

@if($score == $cards->count())

<p>

Perfect! 🎉

</p>

@elseif($score >= 8)

<p>

Excellent!

</p>

@elseif($score >= 6)

<p>

Good Job!

</p>

@else

<p>

Keep Learning!

</p>

@endif

<a
href="{{ route('quiz.index') }}"
class="mt-8 inline-block px-6 py-3 bg-blue-600 text-white rounded">

Play Again

</a>

@endsection