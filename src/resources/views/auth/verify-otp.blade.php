@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-180px)] flex items-center justify-center py-16">

<div class="w-full max-w-md rounded-3xl border border-slate-800 bg-slate-900 p-10">

<div class="text-center">

<div class="text-6xl mb-5">

📧

</div>

<h1 class="text-4xl font-black text-white">

Verify OTP

</h1>

<p class="mt-3 text-slate-400">

We've sent a verification code to your email.

</p>

</div>

@if($errors->any())

<div class="mt-8 rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-red-300">

@foreach($errors->all() as $error)

<p>{{ $error }}</p>

@endforeach

</div>

@endif

<form
method="POST"
action="{{ route('verify.otp.post') }}"
class="mt-8">

@csrf

<input
    type="text"
    name="otp"
    maxlength="6"
    inputmode="numeric"
    autocomplete="one-time-code"
    placeholder="6-digit OTP"
    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-4
           text-center text-3xl font-bold tracking-[6px]
           text-white
           placeholder:text-base
           placeholder:tracking-normal
           placeholder:font-normal
           placeholder:text-slate-500
           focus:border-red-500 focus:ring-red-500">

<button
class="mt-6 w-full rounded-xl bg-red-600 py-3 font-bold text-white hover:bg-red-700">

Verify OTP

</button>

</form>

</div>

</div>

@endsection