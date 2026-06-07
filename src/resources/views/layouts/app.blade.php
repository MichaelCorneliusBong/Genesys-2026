<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Genesys')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-black text-white min-h-screen"
    style="
        background-image:
        linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
        background-size:40px 40px;
    "
>

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 bg-black/90 backdrop-blur border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center justify-between h-16">

                <a
                    href="{{ route('home') }}"
                    class="text-3xl font-black text-red-600 tracking-wider"
                >
                    GENESYS
                </a>

                <div class="flex items-center gap-8">

                    <a
                        href="{{ route('home') }}"
                        class="text-zinc-300 hover:text-red-500 transition"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('decks.index') }}"
                        class="text-zinc-300 hover:text-red-500 transition"
                    >
                        Decks
                    </a>

                    <span class="text-zinc-600">
                        Tier List
                    </span>

                    <span class="text-zinc-600">
                        Articles
                    </span>

                </div>

            </div>

        </div>
    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="mt-20 border-t border-zinc-800">

        <div class="max-w-7xl mx-auto px-6 py-8 text-center text-zinc-500">

            Genesys © {{ date('Y') }}

        </div>

    </footer>

</body>
</html>