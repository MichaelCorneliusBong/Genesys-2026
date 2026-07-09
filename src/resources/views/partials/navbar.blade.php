<nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 border-b border-zinc-800 bg-zinc-950/90 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded bg-red-600 flex items-center justify-center shadow-[0_0_15px_rgba(220,38,38,0.3)] group-hover:bg-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                    </svg>
                </div>
                <div class="leading-none">
                    <h1 class="text-white text-lg font-bold tracking-tight transition-colors">
                        Genesys<span class="text-red-500">Meta</span>
                    </h1>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex items-center h-full gap-1">
                @php
                    $menus = [
                        ['Home','home'],
                        ['Decks','decks.index'],
                        ['Guides','guides.index'],
                        ['Articles','articles.index'],
                        ['Tier Lists','tierlists.index'],
                        ['Cards','cards.search'],
                    ];
                @endphp

                @foreach($menus as $menu)
                    <a href="{{ route($menu[1]) }}"
                       class="text-white hover:text-red-400 hover:bg-zinc-800 px-3 py-2 rounded-md text-sm font-bold tracking-wide transition-all duration-150">
                        {{ $menu[0] }}
                    </a>
                @endforeach
            </div>

            {{-- Right Side Action Control & Mobile Toggle --}}
            <div class="flex items-center gap-2">
                
                <div class="hidden sm:flex items-center gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="text-white hover:text-red-400 text-sm font-bold px-3 py-2 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="rounded bg-red-600 hover:bg-red-500 text-white px-4 py-2 text-sm font-bold transition shadow-md shadow-red-950/50">
                            Register
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('bookmarks.index') }}" class="rounded bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 p-2 text-white transition" title="Bookmarks">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </a>
                        <a href="{{ route('quiz.index') }}" class="rounded bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 p-2 text-white transition" title="Quiz">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </a>
                        <a href="{{ route('profile') }}" class="rounded bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 px-3 py-2 text-sm font-bold text-white transition flex items-center gap-2">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="max-w-[100px] truncate">{{ auth()->user()->name }}</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button class="rounded bg-zinc-800 hover:bg-red-600 border border-zinc-700 hover:border-red-600 px-3 py-2 text-sm font-bold text-white transition">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>

                {{-- Mobile Menu Hamburger Button --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-zinc-400 hover:text-white focus:outline-none transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div x-show="mobileMenuOpen" class="lg:hidden border-t border-zinc-800 bg-zinc-950 shadow-2xl absolute w-full" style="display: none;">
        <div class="px-4 py-4 space-y-1">
            @foreach($menus as $menu)
                <a href="{{ route($menu[1]) }}" class="block px-3 py-3 rounded-md text-base font-bold text-white hover:bg-zinc-800 hover:text-red-400 transition">
                    {{ $menu[0] }}
                </a>
            @endforeach
        </div>
        <div class="sm:hidden px-4 py-4 border-t border-zinc-800 flex flex-col gap-3">
            @guest
                <a href="{{ route('login') }}" class="block w-full text-center px-3 py-3 rounded-md text-base font-bold text-white bg-zinc-800 hover:bg-zinc-700 transition">Login</a>
                <a href="{{ route('register') }}" class="block w-full text-center px-3 py-3 rounded-md text-base font-bold bg-red-600 text-white hover:bg-red-500 transition shadow-md">Register</a>
            @endguest
            @auth
                <a href="{{ route('bookmarks.index') }}" class="block px-3 py-3 rounded-md text-base font-bold text-white hover:bg-zinc-800 transition">Bookmarks</a>
                <a href="{{ route('quiz.index') }}" class="block px-3 py-3 rounded-md text-base font-bold text-white hover:bg-zinc-800 transition">Quiz</a>
                <a href="{{ route('profile') }}" class="block px-3 py-3 rounded-md text-base font-bold text-white hover:bg-zinc-800 transition">My Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button class="w-full text-left px-3 py-3 rounded-md text-base font-bold text-red-500 hover:bg-zinc-800 transition">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>