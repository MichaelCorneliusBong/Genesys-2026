<footer class="border-t border-zinc-800 bg-zinc-950 mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 border-b border-zinc-800 pb-8">
            
            <div>
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-sm bg-red-600 flex items-center justify-center">
                        <span class="text-white text-[10px] font-black">G</span>
                    </div>
                    <h2 class="text-md font-bold tracking-tight text-white">
                        Genesys<span class="text-red-500">Meta</span>
                    </h2>
                </div>
                <p class="mt-3 text-sm text-white max-w-sm leading-relaxed">
                    The ultimate Yu-Gi-Oh! Genesys format database, providing meta breakdowns, advanced deck builders, strategy guides, and card pricing metrics.
                </p>
            </div>

            {{-- Quick structural reference space --}}
            <div class="flex gap-12 text-sm w-full md:w-auto mt-6 md:mt-0">
                <div class="flex flex-col gap-3 w-1/2 md:w-auto">
                    <span class="text-white font-black uppercase tracking-widest border-b border-zinc-700 pb-1 mb-1">Database</span>
                    <a href="{{ route('cards.search') }}" class="text-white hover:text-red-400 transition font-medium">Cards</a>
                    <a href="{{ route('decks.index') }}" class="text-white hover:text-red-400 transition font-medium">Decks</a>
                </div>
                <div class="flex flex-col gap-3 w-1/2 md:w-auto">
                    <span class="text-white font-black uppercase tracking-widest border-b border-zinc-700 pb-1 mb-1">Community</span>
                    <a href="{{ route('articles.index') }}" class="text-white hover:text-red-400 transition font-medium">Articles</a>
                    <a href="{{ route('guides.index') }}" class="text-white hover:text-red-400 transition font-medium">Guides</a>
                </div>
            </div>
        </div>

        {{-- Legal Footprint --}}
        <div class="mt-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 text-xs text-zinc-300">
            <p class="leading-relaxed max-w-2xl text-left">
                This website is purely a fan-made database and strategy platform. GenesysMeta is not affiliated with, authorized, or endorsed by Konami Digital Entertainment, Shueisha, or TV Tokyo. Yu-Gi-Oh! card designs, names, and assets are trademarks of their respective owners.
            </p>
            <div class="whitespace-nowrap font-bold text-white pt-4 md:pt-0 border-t border-zinc-800 md:border-none w-full md:w-auto text-left md:text-right">
                © {{ date('Y') }} GenesysMeta.
            </div>
        </div>
    </div>
</footer>