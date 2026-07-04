@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

<h1 class="text-3xl font-bold mb-6">

Verify OTP

</h1>

@if($errors->any())

<div class="bg-red-100 p-4 rounded mb-4">

@foreach($errors->all() as $error)

<p>{{ $error }}</p>

@endforeach

</div>

@endif

<form
method="POST"
action="{{ route('verify.otp.post') }}">

@csrf

<label>

OTP Code

</label>

<input
type="text"
name="otp"
class="w-full border rounded p-2 mt-2 mb-4"
required>

<button
class="bg-blue-600 text-white px-6 py-2 rounded">

Verify

</button>

</form>

</div>

@endsection