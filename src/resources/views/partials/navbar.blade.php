<nav class="bg-white shadow">

    <div class="container mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">

                GenesysMeta

            </a>

            <div class="flex items-center gap-6">

                <a href="{{ route('decks.index') }}">
                    Decks
                </a>

                <a href="{{ route('guides.index') }}">
                    Guides
                </a>

                <a href="{{ route('articles.index') }}">
                    Articles
                </a>

                <a href="{{ route('tierlists.index') }}">
                    Tier Lists
                </a>

                @guest

                <a href="{{ route('login') }}">

                Login

                </a>

                <a href="{{ route('register') }}">

                Register

                </a>

                @endguest


                @auth

                <a href="{{ route('bookmarks.index') }}">

                Bookmarks

                </a>

                <a href="{{ route('quiz.index') }}">

                Quiz
                
                </a>

                <span>

                <a href="{{ route('profile') }}">

                Hi, {{ auth()->user()->name }}
                
                </a>

                </span>

                <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button>

                Logout

                </button>

                </form>

                @endauth

            </div>

        </div>

    </div>

</nav>