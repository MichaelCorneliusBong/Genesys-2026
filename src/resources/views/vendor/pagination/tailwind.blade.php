@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        
        {{-- Mobile View: Simple Prev/Next Buttons --}}
        <div class="flex justify-between flex-1 sm:hidden gap-2">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center w-1/2 justify-center px-4 py-3 text-sm font-bold text-zinc-600 bg-zinc-900 border border-zinc-800 cursor-default rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center w-1/2 justify-center px-4 py-3 text-sm font-bold text-white bg-zinc-800 border border-zinc-700 rounded-md hover:bg-red-600 hover:border-red-500 transition shadow-md">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center w-1/2 justify-center px-4 py-3 text-sm font-bold text-white bg-zinc-800 border border-zinc-700 rounded-md hover:bg-red-600 hover:border-red-500 transition shadow-md">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center w-1/2 justify-center px-4 py-3 text-sm font-bold text-zinc-600 bg-zinc-900 border border-zinc-800 cursor-default rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        {{-- Desktop View: Full Numbered Pagination --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between sm:gap-8 sm:flex-wrap">
            
            {{-- Left Side: Showing 1 to 30 of 1000 --}}
            <div>
                <p class="text-[10px] font-black text-zinc-500 uppercase tracking-widest">
                    Showing
                    <span class="text-white">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="text-white">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="text-white">{{ $paginator->total() }}</span>
                </p>
            </div>

            {{-- Right Side: Numbered Buttons --}}
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md border border-zinc-800 bg-zinc-900/50 p-1 gap-1">
                    
                    {{-- Previous Page Arrow --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-700 cursor-default rounded" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-400 rounded hover:bg-zinc-800 hover:text-white transition" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-zinc-600 cursor-default">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-black text-white bg-red-600 rounded cursor-default shadow-md shadow-red-950/50">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-zinc-400 rounded hover:bg-zinc-800 hover:text-white transition" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Arrow --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-400 rounded hover:bg-zinc-800 hover:text-white transition" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-700 cursor-default rounded" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                    
                </span>
            </div>
        </div>
    </nav>
@endif