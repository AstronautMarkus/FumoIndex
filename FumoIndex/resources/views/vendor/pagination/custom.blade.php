@if ($paginator->hasPages())
    <nav class="flex justify-center">
        <ul class="inline-flex gap-2 items-center">
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 bg-gray-300 text-gray-700 cursor-not-allowed select-none">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       class="px-4 py-2 bg-tertiary text-white hover:bg-tertiary/80 transition-all">Previous</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 bg-gray-200 text-gray-500 select-none">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 bg-gray-300 text-gray-700 font-bold cursor-not-allowed select-none">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-4 py-2 bg-tertiary text-white hover:bg-tertiary/80 transition-all">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                       class="px-4 py-2 bg-tertiary text-white hover:bg-tertiary/80 transition-all">Next</a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 bg-gray-300 text-gray-700 cursor-not-allowed select-none">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
