@if ($paginator->hasPages())
  <nav class="d-flex justify-items-center justify-content-between">
    <div class="d-flex justify-content-between flex-fill d-sm-none">
      <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
          <li class="page-item disabled" aria-disabled="true">
            <span class="page-link color-gold">Anterior</span>
          </li>
        @else
          <li class="page-item">
            <a class="page-link color-gold" href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
          </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          <li class="page-item">
            <a class="page-link color-gold" href="{{ $paginator->nextPageUrl() }}" rel="next">Siguiente</a>
          </li>
        @else
          <li class="page-item disabled" aria-disabled="true">
            <span class="page-link color-gold">Siguiente</span>
          </li>
        @endif
      </ul>
    </div>

    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
      <div>
        <p class="small text-muted">
          @lang('app.pagination.showing')
          <span class="fw-semibold color-gold">{{ $paginator->firstItem() }}</span>
          @lang('app.pagination.to')
          <span class="fw-semibold color-gold">{{ $paginator->lastItem() }}</span>
          @lang('app.pagination.of')
          <span class="fw-semibold color-gold">{{ $paginator->total() }}</span>
          @lang('app.pagination.results')
        </p>
      </div>

      <div>
        <ul class="pagination">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="Anterior">
              <span class="page-link color-gold" aria-hidden="true">&lsaquo;</span>
            </li>
          @else
            <li class="page-item">
              <a class="page-link color-gold" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="Anterior">&lsaquo;</a>
            </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
              <li class="page-item disabled" aria-disabled="true"><span class="page-link color-gold">{{ $element }}</span>
              </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
              @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                  <li class="page-item active" aria-current="page"><span class="page-link color-gold">{{ $page }}</span>
                  </li>
                @else
                  {{-- Limit the number of pages displayed --}}
                  @if ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                    <li class="page-item"><a class="page-link color-gold" href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endif
              @endforeach
            @endif
          @endforeach


          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
            <li class="page-item">
              <a class="page-link color-gold" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="Siguiente">&rsaquo;</a>
            </li>
          @else
            <li class="page-item disabled" aria-disabled="true" aria-label="Siguiente">
              <span class="page-link color-gold" aria-hidden="true">&rsaquo;</span>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
@endif
