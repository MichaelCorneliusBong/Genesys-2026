@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

<h1 class="text-3xl font-bold mb-6">

Register

</h1>

<form method="POST" action="{{ route('register') }}">

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 rounded">

        <ul>

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>
@endif

@csrf

<div class="mb-4">

<label>Name</label>

<input
name="name"
class="w-full border rounded p-2"
required>

</div>

<div class="mb-4">

<label>Email</label>

<input
type="email"
name="email"
class="w-full border rounded p-2"
required>

</div>

<div class="mb-4">

<label>Password</label>

<input
type="password"
name="password"
class="w-full border rounded p-2"
required>

</div>

<div class="mb-4">

<label>Confirm Password</label>

<input
type="password"
name="password_confirmation"
class="w-full border rounded p-2"
required>

</div>

<div class="mb-4">

<label>

Berapa

<strong>

{{ $a }} + {{ $b }}

</strong>

?

</label>

<input
name="captcha"
class="w-full border rounded p-2"
required>

@error('captcha')

<p class="text-red-500">

{{ $message }}

</p>

@enderror

</div>

<button
class="bg-green-600 text-white px-5 py-2 rounded">

Register

</button>

</form>

</div>

@endsection