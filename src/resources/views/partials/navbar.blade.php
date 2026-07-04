<nav class="sticky top-0 z-50 border-b border-gray-800 bg-slate-900/90 backdrop-blur-md">

    <div class="max-w-7xl mx-auto px-6">

        <div class="h-20 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="flex items-center gap-4">

                <div
                    class="w-11 h-11 rounded-2xl bg-red-600 flex items-center justify-center shadow-lg">

                    <span class="text-xl font-black text-white">

                        G

                    </span>

                </div>

                <div>

                    <h1
                        class="text-white text-2xl font-bold tracking-wide">

                        GenesysMeta

                    </h1>

                    <p
                        class="text-xs text-gray-400">

                        Yu-Gi-Oh! Format Database

                    </p>

                </div>

            </a>

            {{-- Center Menu --}}
            <div
                class="hidden lg:flex items-center gap-8">

                @php

                    $menus = [

                        ['Home','home'],

                        ['Decks','decks.index'],

                        ['Guides','guides.index'],

                        ['Articles','articles.index'],

                        ['Tier List','tierlists.index'],

                        ['Cards','cards.search'],

                    ];

                @endphp

                @foreach($menus as $menu)

                    <a
                        href="{{ route($menu[1]) }}"
                        class="text-gray-300 hover:text-white transition-all duration-200 hover:-translate-y-0.5">

                        {{ $menu[0] }}

                    </a>

                @endforeach

            </div>

            {{-- Right --}}
            <div
                class="flex items-center gap-3">

                @guest

                    <a
                        href="{{ route('login') }}"
                        class="text-gray-300 hover:text-white">

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="rounded-xl bg-red-600 px-5 py-2.5 text-white hover:bg-red-700 transition">

                        Register

                    </a>

                @endguest

                @auth

                    <a
                        href="{{ route('bookmarks.index') }}"
                        class="rounded-xl bg-gray-800 px-4 py-2 text-gray-300 hover:bg-gray-700">

                        🔖

                    </a>

                    <a
                        href="{{ route('quiz.index') }}"
                        class="rounded-xl bg-gray-800 px-4 py-2 text-gray-300 hover:bg-gray-700">

                        🧠

                    </a>

                    <a
                        href="{{ route('profile') }}"
                        class="rounded-xl bg-gray-800 px-5 py-2 text-white hover:bg-gray-700">

                        {{ auth()->user()->name }}

                    </a>

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="rounded-xl bg-red-600 px-5 py-2 text-white hover:bg-red-700 transition">

                            Logout

                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </div>

</nav>