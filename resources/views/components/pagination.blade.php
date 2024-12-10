@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            <!-- Tombol Previous -->
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded-l-md">←</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="px-3 py-2 text-gray-600 bg-white border border-gray-300 hover:bg-gray-100 rounded-l-md">
                        ←
                    </a>
                </li>
            @endif

            <!-- Halaman -->
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled">
                        <span class="px-3 py-2 text-gray-600 bg-gray-100 border border-gray-300">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-2 text-white bg-blue-500 border border-gray-300">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-300 hover:bg-gray-100">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Tombol Next -->
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="px-3 py-2 text-gray-600 bg-white border border-gray-300 hover:bg-gray-100 rounded-r-md">
                        →
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded-r-md">→</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
