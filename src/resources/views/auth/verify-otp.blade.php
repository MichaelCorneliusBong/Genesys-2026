@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-180px)] flex items-center justify-center py-16 px-4">

    <div class="w-full max-w-md rounded-md border border-zinc-800 bg-zinc-900/50 p-8 shadow-md">

        <div class="text-center mb-8">
            <div class="flex justify-center mb-4 text-zinc-500">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h1 class="text-2xl font-black text-white uppercase tracking-tight">Verify OTP</h1>
            <p class="mt-2 text-sm text-zinc-400">We've sent a verification code to your email.</p>
        </div>

        <form method="POST" action="{{ route('verify.otp.post') }}">
            @csrf

            <input type="text" name="otp" maxlength="6" inputmode="numeric" autocomplete="one-time-code" placeholder="000000" 
                   class="w-full rounded-md border border-zinc-700 bg-zinc-950 p-4 text-center text-3xl font-black tracking-[10px] text-white focus:border-red-500 outline-none">

            <button class="mt-6 w-full rounded-md bg-red-600 py-3 font-bold text-white hover:bg-red-500 transition shadow-lg shadow-red-950/30">
                Verify OTP
            </button>
        </form>

    </div>

</div>

@endsection