@extends('layouts.app')

@section('content')

<div class="min-h-[calc(100vh-180px)] flex items-center justify-center py-16">

    <div class="w-full max-w-md rounded-3xl border border-slate-800 bg-slate-900 p-10 shadow-2xl">

        <div class="text-center">

            <div class="text-6xl mb-5">🔐</div>

            <h1 class="text-4xl font-black text-white">

                Welcome Back

            </h1>

            <p class="mt-3 text-slate-400">

                Login to continue using GenesysMeta.

            </p>

        </div>

        @if ($errors->any())

        <div class="mt-8 rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-red-300">

            @foreach($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

        </div>

        @endif

        <form
            method="POST"
            action="{{ route('login') }}"
            class="mt-8 space-y-6">

            @csrf

            <div>

                <label class="mb-2 block text-slate-300">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-red-500"
                    required>

            </div>

            <div>

                <label class="mb-2 block text-slate-300">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-red-500"
                    required>

            </div>

            <label class="flex items-center gap-3 text-slate-400">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-slate-600 bg-slate-800">

                Remember Me

            </label>

            <button
                class="w-full rounded-xl bg-red-600 py-3 font-bold text-white transition hover:bg-red-700">

                Login

            </button>

        </form>

        <p class="mt-8 text-center text-slate-400">

            Don't have an account?

            <a
                href="{{ route('register') }}"
                class="text-red-400 hover:text-red-300">

                Register

            </a>

        </p>

    </div>

</div>

@endsection