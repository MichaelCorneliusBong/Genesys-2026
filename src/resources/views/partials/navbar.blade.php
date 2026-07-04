<nav class="sticky top-0 z-50 border-b border-slate-800 bg-slate-950/80 backdrop-blur-xl">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-4 group">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center shadow-lg group-hover:scale-105 transition">

                    <span class="text-white text-2xl font-black">

                        G

                    </span>

                </div>

                <div>

                    <h1 class="text-white text-2xl font-extrabold tracking-wide">

                        GenesysMeta

                    </h1>

                    <p class="text-xs text-slate-400">

                        Yu-Gi-Oh! Format Database

                    </p>

                </div>

            </a>

            {{-- Navigation --}}
            <div class="hidden lg:flex items-center gap-8">

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

                    <a
                        href="{{ route($menu[1]) }}"
                        class="text-slate-300 hover:text-red-500 font-medium transition-all duration-200 hover:-translate-y-0.5">

                        {{ $menu[0] }}

                    </a>

                @endforeach

            </div>

            {{-- Right Side --}}
            <div class="flex items-center gap-3">

                @guest

                    <a
                        href="{{ route('login') }}"
                        class="text-slate-300 hover:text-white transition">

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="rounded-xl bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 font-semibold transition shadow-lg">

                        Register

                    </a>

                @endguest

                @auth

                    <a
                        href="{{ route('bookmarks.index') }}"
                        class="rounded-xl bg-slate-800 hover:bg-slate-700 px-4 py-2 transition">

                        🔖

                    </a>

                    <a
                        href="{{ route('quiz.index') }}"
                        class="rounded-xl bg-slate-800 hover:bg-slate-700 px-4 py-2 transition">

                        🧠

                    </a>

                    <a
                        href="{{ route('profile') }}"
                        class="rounded-xl bg-slate-800 hover:bg-slate-700 px-5 py-2 text-white transition">

                        👤 {{ auth()->user()->name }}

                    </a>

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="rounded-xl bg-red-600 hover:bg-red-700 px-5 py-2 text-white transition shadow">

                            Logout

                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </div>

</nav>