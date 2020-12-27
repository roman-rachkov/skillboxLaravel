@if ($paginator->hasPages())
    <nav class="blog-pagination">
        @if ($paginator->onFirstPage())
            <span class="btn btn-outline-secondary disabled">@lang('pagination.previous')</span>
        @else
            <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}"
               rel="prev">@lang('pagination.previous')</a>
        @endif
        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}"
               rel="next">@lang('pagination.next')</a>
        @else
            <span class="btn btn-outline-secondary disabled">@lang('pagination.next')</span>
        @endif
    </nav>
@endif
