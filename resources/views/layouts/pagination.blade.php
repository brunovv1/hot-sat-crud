@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a href="#" disabled>&laquo;</a>
        @else
            <a class="active-page" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <a class="{{ $paginator->currentPage() == $i ? 'active-page' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
        @endfor

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        @else
            <a href="#" disabled>&laquo;</a>
        @endif
    </div>
@endif
