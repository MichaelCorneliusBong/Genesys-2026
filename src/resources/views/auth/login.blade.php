@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

<h1 class="text-3xl font-bold mb-6">

Login

</h1>

<form method="POST">

@csrf

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

<label>

<input
type="checkbox"
name="remember">

Remember Me

</label>

</div>

<button
class="bg-blue-600 text-white px-5 py-2 rounded">

Login

</button>

</form>

</div>

@endsection