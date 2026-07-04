@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-180px)] flex items-center justify-center py-16">

<div class="w-full max-w-md rounded-3xl border border-slate-800 bg-slate-900 p-10">

<div class="text-center">

<div class="text-6xl mb-5">

📝

</div>

<h1 class="text-4xl font-black text-white">

Create Account

</h1>

<p class="mt-3 text-slate-400">

Join the GenesysMeta community.

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
action="{{ route('register') }}"
class="mt-8 space-y-5">

@csrf

<input
name="name"
placeholder="Name"
class="w-full rounded-xl border border-slate-700 bg-slate-800 p-3 text-white">

<input
type="email"
name="email"
placeholder="Email"
class="w-full rounded-xl border border-slate-700 bg-slate-800 p-3 text-white">

<input
type="password"
name="password"
placeholder="Password"
class="w-full rounded-xl border border-slate-700 bg-slate-800 p-3 text-white">

<input
type="password"
name="password_confirmation"
placeholder="Confirm Password"
class="w-full rounded-xl border border-slate-700 bg-slate-800 p-3 text-white">

<div>

<label class="text-slate-300">

Security Check

</label>

<p class="text-slate-400 mt-2">

{{ $a }} + {{ $b }} = ?

</p>

<input
name="captcha"
class="mt-3 w-full rounded-xl border border-slate-700 bg-slate-800 p-3 text-white">

</div>

<button
class="w-full rounded-xl bg-red-600 py-3 font-bold text-white hover:bg-red-700">

Register

</button>

</form>

<p class="mt-8 text-center text-slate-400">

Already have an account?

<a
href="{{ route('login') }}"
class="text-red-400">

Login

</a>

</p>

</div>

</div>

@endsection