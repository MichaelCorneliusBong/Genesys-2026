@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-14">

    @if(session('success'))

    <div class="mb-8 rounded-2xl border border-green-500/30 bg-green-500/10 p-5 text-green-300">

        {{ session('success') }}

    </div>

    @endif

    @if($errors->any())

    <div class="mb-8 rounded-2xl border border-red-500/30 bg-red-500/10 p-5 text-red-300">

        <ul class="space-y-2">

            @foreach($errors->all() as $error)

                <li>• {{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    {{-- Header --}}
    <div
        class="rounded-3xl border border-slate-800 bg-slate-900 p-8">

        <div
            class="flex flex-col lg:flex-row items-center gap-8">

            <img
                src="{{ auth()->user()->getFilamentAvatarUrl() }}"
                class="w-36 h-36 rounded-full border-4 border-red-500 object-cover">

            <div class="flex-1">

                <h1
                    class="text-5xl font-black text-white">

                    {{ $user->name }}

                </h1>

                <p
                    class="mt-3 text-slate-400">

                    {{ $user->email }}

                </p>

                <div
                    class="mt-6 flex flex-wrap gap-3">

                    <span
                        class="rounded-full bg-red-600 px-4 py-2 text-white text-sm">

                        Member

                    </span>

                    <span
                        class="rounded-full bg-slate-800 px-4 py-2 text-slate-300 text-sm">

                        Joined {{ $user->created_at->format('M Y') }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- Statistics --}}
    <div
        class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

        <div class="rounded-3xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-slate-400">

                Bookmarks

            </div>

            <div class="mt-3 text-4xl font-black text-white">

                {{ $user->bookmarks()->count() }}

            </div>

        </div>

        <div class="rounded-3xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-slate-400">

                Quiz Played

            </div>

            <div class="mt-3 text-4xl font-black text-white">

                {{ $totalQuiz }}

            </div>

        </div>

        <div class="rounded-3xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-slate-400">

                Highest Score

            </div>

            <div class="mt-3 text-4xl font-black text-red-400">

                {{ $highestScore ?? 0 }}

            </div>

        </div>

        <div class="rounded-3xl bg-slate-900 border border-slate-800 p-6">

            <div class="text-slate-400">

                Last Quiz

            </div>

            <div class="mt-3 text-2xl font-bold text-white">

                @if($lastQuiz)

                    {{ $lastQuiz->score }}

                    /

                    {{ $lastQuiz->total_question }}

                @else

                    -

                @endif

            </div>

        </div>

    </div>

    {{-- Profile Settings --}}
    <div
        class="mt-10 rounded-3xl border border-slate-800 bg-slate-900 p-8">

        <h2
            class="text-3xl font-bold text-white mb-8">

            Account Settings

        </h2>

        <form
            method="POST"
            action="{{ route('profile.update') }}">

            @csrf

            <div class="space-y-6">

                <div>

                    <label
                        class="block mb-2 font-semibold text-slate-300">

                        Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name',$user->name) }}"
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-red-500 focus:ring-red-500">

                </div>

                <div>

                    <label
                        class="block mb-2 font-semibold text-slate-300">

                        Email

                    </label>

                    <input
                        type="email"
                        value="{{ $user->email }}"
                        readonly
                        class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-slate-500">

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label
                            class="block mb-2 font-semibold text-slate-300">

                            New Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-red-500">

                    </div>

                    <div>

                        <label
                            class="block mb-2 font-semibold text-slate-300">

                            Confirm Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-red-500">

                    </div>

                </div>

                <div class="pt-2">

                    <button
                        class="rounded-xl bg-red-600 hover:bg-red-700 transition px-8 py-3 font-semibold text-white">

                        Save Changes

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection