@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-180px)] flex items-center justify-center py-16 px-4">

    <div class="w-full max-w-md rounded-md border border-zinc-800 bg-zinc-900/50 p-8 shadow-md">

        <div class="text-center mb-8">
            <div class="flex justify-center mb-4 text-zinc-500">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h1 class="text-2xl font-black text-white uppercase tracking-tight">Welcome Back</h1>
            <p class="mt-2 text-sm text-zinc-400">Login to continue using GenesysMeta.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Email</label>
                <input type="email" name="email" class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-2.5 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition" required>
            </div>

            <div>
                <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Password</label>
                <input type="password" name="password" class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-2.5 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition" required>
            </div>

            <label class="flex items-center gap-3 text-sm text-zinc-400 cursor-pointer">
                <input type="checkbox" name="remember" class="rounded bg-zinc-800 border-zinc-700 text-red-600 focus:ring-red-500">
                Remember Me
            </label>

            <button class="w-full rounded-md bg-red-600 py-3 font-bold text-white transition hover:bg-red-500 shadow-lg shadow-red-950/30">
                Login
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-zinc-400">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-red-500 font-bold hover:underline">Register</a>
        </p>

    </div>

</div>

@endsection