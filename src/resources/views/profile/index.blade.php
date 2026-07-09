@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">

    {{-- User Profile Header --}}
    <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-8 shadow-md mb-6">
        <div class="flex flex-col lg:flex-row items-center gap-8">
            
            <div class="relative">
                <img src="{{ auth()->user()->getFilamentAvatarUrl() }}" 
                     class="w-32 h-32 rounded border border-zinc-700 object-cover shadow-lg">
                <div class="absolute -bottom-2 -right-2 bg-red-600 p-1.5 rounded-sm border border-zinc-950">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
            </div>

            <div class="flex-1 text-center lg:text-left">
                <h1 class="text-3xl font-black text-white uppercase tracking-tight">{{ $user->name }}</h1>
                <p class="mt-1 text-zinc-400 font-medium">{{ $user->email }}</p>
                
                <div class="mt-6 flex flex-wrap justify-center lg:justify-start gap-3">
                    <span class="rounded border border-red-900/50 bg-red-950/50 px-3 py-1 text-[10px] font-bold text-red-400 uppercase tracking-widest">
                        Member
                    </span>
                    <span class="rounded border border-zinc-700 bg-zinc-800 px-3 py-1 text-[10px] font-bold text-zinc-300 uppercase tracking-widest">
                        Joined {{ $user->created_at->format('M Y') }}
                    </span>
                </div>
            </div>

        </div>
    </div>

    {{-- Statistics Grid --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        
        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6">
            <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Bookmarks</p>
            <p class="text-3xl font-black text-white">{{ $user->bookmarks()->count() }}</p>
        </div>

        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6">
            <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Quiz Played</p>
            <p class="text-3xl font-black text-white">{{ $totalQuiz }}</p>
        </div>

        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6">
            <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Highest Score</p>
            <p class="text-3xl font-black text-red-500">{{ $highestScore ?? 0 }}</p>
        </div>

        <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-6">
            <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-1">Last Quiz Result</p>
            <p class="text-xl font-bold text-white mt-1">
                @if($lastQuiz)
                    {{ $lastQuiz->score }} / {{ $lastQuiz->total_question }}
                @else
                    -
                @endif
            </p>
        </div>

    </div>

    {{-- Profile Settings --}}
    <div class="rounded-md border border-zinc-800 bg-zinc-900/50 p-8 shadow-md">
        
        <h2 class="text-xl font-black text-white uppercase tracking-tight mb-8 border-l-4 border-red-600 pl-4">Account Settings</h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="grid gap-6">
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                               class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-white focus:border-red-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2">Email</label>
                        <input type="email" value="{{ $user->email }}" readonly 
                               class="w-full rounded-md border border-zinc-800 bg-zinc-900 px-4 py-3 text-zinc-600 cursor-not-allowed">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2">New Password</label>
                        <input type="password" name="password" 
                               class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-white focus:border-red-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" 
                               class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-white focus:border-red-500 outline-none transition">
                    </div>
                </div>

                <div class="pt-4">
                    <button class="rounded-md bg-red-600 hover:bg-red-500 transition px-8 py-3 font-bold text-white shadow-lg shadow-red-950/30">
                        Save Changes
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>

@endsection