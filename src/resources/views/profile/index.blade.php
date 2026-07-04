@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-4xl font-bold mb-8">

        My Profile

    </h1>

    @if(session('success'))

        <div class="mb-6 p-4 bg-green-100 border border-green-300 rounded">

            {{ session('success') }}

        </div>

    @endif

    @if($errors->any())

        <div class="mb-6 p-4 bg-red-100 border border-red-300 rounded">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('profile.update') }}">

        @csrf

        <div class="mb-5">

            <label class="font-semibold">

                Name

            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name',$user->name) }}"
                class="w-full border rounded p-2">

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                Email

            </label>

            <input
                type="email"
                value="{{ $user->email }}"
                class="w-full border rounded p-2 bg-gray-100"
                readonly>

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                New Password

            </label>

            <input
                type="password"
                name="password"
                class="w-full border rounded p-2">

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                Confirm Password

            </label>

            <input
                type="password"
                name="password_confirmation"
                class="w-full border rounded p-2">

        </div>

        <button
            class="px-5 py-2 bg-blue-600 text-white rounded">

            Save Changes

        </button>

    </form>

    <div class="mt-10 border-t pt-8">

        <h2 class="text-2xl font-bold mb-4">

            Statistics

            <hr class="my-6">

            <h2 class="text-2xl font-bold mb-4">

            Quiz Statistics

            </h2>

            <p>

            Total Quiz Played :

            <strong>

            {{ $totalQuiz }}

            </strong>

            </p>

            <p>

            Highest Score :

            <strong>

            {{ $highestScore ?? 0 }}

            </strong>

            </p>

            @if($lastQuiz)

            <p>

            Last Quiz :

            <strong>

            {{ $lastQuiz->score }}

            /

            {{ $lastQuiz->total_question }}

            </strong>

            </p>

            @endif

        </h2>

        <p>

            Total Bookmarks :

            <strong>

                {{ $user->bookmarks()->count() }}

            </strong>

        </p>

        <p>

            Member Since :

            <strong>

                {{ $user->created_at->format('d M Y') }}

            </strong>

        </p>

    </div>

</div>

@endsection