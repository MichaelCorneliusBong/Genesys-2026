@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-180px)] flex items-center justify-center py-16 px-4">

    <div class="w-full max-w-md rounded-md border border-zinc-800 bg-zinc-900/50 p-8 shadow-md">

        <div class="text-center mb-8">
            <div class="flex justify-center mb-4 text-zinc-500">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <h1 class="text-2xl font-black text-white uppercase tracking-tight">Create Account</h1>
            <p class="mt-2 text-sm text-zinc-400">Join the GenesysMeta community.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <input name="name" placeholder="Name" class="w-full rounded-md border border-zinc-700 bg-zinc-950 p-3 text-white placeholder:text-zinc-600 focus:border-red-500 outline-none">
            <input type="email" name="email" placeholder="Email" class="w-full rounded-md border border-zinc-700 bg-zinc-950 p-3 text-white placeholder:text-zinc-600 focus:border-red-500 outline-none">
            <input type="password" name="password" placeholder="Password" class="w-full rounded-md border border-zinc-700 bg-zinc-950 p-3 text-white placeholder:text-zinc-600 focus:border-red-500 outline-none">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full rounded-md border border-zinc-700 bg-zinc-950 p-3 text-white placeholder:text-zinc-600 focus:border-red-500 outline-none">

            <div class="bg-zinc-950 p-4 rounded-md border border-zinc-800">
                <label class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">Security Check</label>
                <p class="text-zinc-300 font-bold mt-1">{{ $a }} + {{ $b }} = ?</p>
                <input name="captcha" class="mt-2 w-full rounded-md border border-zinc-700 bg-zinc-900 p-3 text-white focus:border-red-500 outline-none">
            </div>

            <button class="w-full rounded-md bg-red-600 py-3 font-bold text-white transition hover:bg-red-500 shadow-lg shadow-red-950/30">
                Register
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-zinc-400">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-red-500 font-bold hover:underline">Login</a>
        </p>

    </div>

</div>

@endsection