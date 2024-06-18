@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled color-gold" aria-disabled="true" aria-label="Anterior">
                    <span aria-hidden="true" class="color-gold">&lsaquo;</span>
                </li>
            @else
                <li class="color-gold">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Anterior" class="color-gold">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled color-gold" aria-disabled="true"><span class="color-gold">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active color-gold" aria-current="page"><span class="color-gold">{{ $page }}</span></li>
                        @else
                            <li class="color-gold"><a href="{{ $url }}" class="color-gold">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="color-gold">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Siguiente" class="color-gold">&rsaquo;</a>
                </li>
            @else
                <li class="disabled color-gold" aria-disabled="true" aria-label="Siguiente">
                    <span aria-hidden="true" class="color-gold">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
