<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        {{ config('app.name', 'GenesysMeta') }}

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-slate-950 text-white antialiased">

    {{-- Background Effect --}}
    <div
        class="fixed inset-0 -z-50 overflow-hidden">

        <div
            class="absolute top-[-300px] left-1/2 -translate-x-1/2 w-[900px] h-[900px] rounded-full bg-red-600/10 blur-[180px]">

        </div>

        <div
            class="absolute bottom-[-400px] right-[-200px] w-[600px] h-[600px] rounded-full bg-red-500/5 blur-[160px]">

        </div>

    </div>

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Flash Message --}}
    @if(session('success'))

        <div
            class="max-w-7xl mx-auto px-6 pt-6">

            <div
                class="rounded-2xl border border-green-700 bg-green-500/10 px-6 py-4 text-green-300">

                {{ session('success') }}

            </div>

        </div>

    @endif

    @if($errors->any())

        <div
            class="max-w-7xl mx-auto px-6 pt-6">

            <div
                class="rounded-2xl border border-red-700 bg-red-500/10 px-6 py-4">

                <ul
                    class="space-y-1 text-red-300">

                    @foreach($errors->all() as $error)

                        <li>

                            • {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    @endif

    {{-- Main Content --}}
    <main
        class="min-h-screen">

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>

</html>