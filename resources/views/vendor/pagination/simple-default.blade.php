@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled color-gold" aria-disabled="true"><span class="color-gold">@lang('pagination.previous')</span></li>
            @else
                <li class="color-gold"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="color-gold">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="color-gold"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="color-gold">@lang('pagination.next')</a></li>
            @else
                <li class="disabled color-gold" aria-disabled="true"><span class="color-gold">@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
