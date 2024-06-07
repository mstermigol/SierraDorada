@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled color-gold" aria-disabled="true" aria-label="Anterior"> <i class="left chevron icon color-gold"></i> </a>
        @else
            <a class="icon item color-gold" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Anterior"> <i class="left chevron icon color-gold"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled color-gold" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item active color-gold" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item color-gold" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item color-gold" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Siguiente"> <i class="right chevron icon color-gold"></i> </a>
        @else
            <a class="icon item disabled color-gold" aria-disabled="true" aria-label="Siguiente"> <i class="right chevron icon color-gold"></i> </a>
        @endif
    </div>
@endif
