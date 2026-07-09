<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'GenesysMeta') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-950 text-white antialiased">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Flash Message: Success --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-6">
            <div class="flex items-center gap-3 rounded-md border border-green-700/50 bg-green-950/30 px-4 py-3 text-green-400 shadow-md">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="font-bold text-sm tracking-wide">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Flash Message: Errors --}}
    @if($errors->any())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-6">
            <div class="rounded-md border border-red-700/50 bg-red-950/30 px-4 py-4 shadow-md">
                <div class="flex items-center gap-3 mb-3">
                    <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span class="font-black text-red-500 text-sm uppercase tracking-widest">Errors Occurred</span>
                </div>
                <ul class="space-y-1.5 text-red-200 text-sm list-disc list-outside ml-8 font-medium">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>
</html>