{{-- resources/views/pagination/custom.blade.php --}}

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="pagination-previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
                @lang('pagination.previous')
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" rel="prev"
                aria-label="@lang('pagination.previous')">
                @lang('pagination.previous')
            </a>
        @endif

        {{-- Page Numbers --}}
        <ul class="pagination-list flex">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="pagination-ellipsis">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span
                                    class="pagination-link is-current border border-gray-300 bg-gray-200 px-4 py-2 rounded-md">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="pagination-link border border-gray-300 bg-white px-4 py-2 rounded-md">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" rel="next"
                aria-label="@lang('pagination.next')">
                @lang('pagination.next')
            </a>
        @else
            <span class="pagination-next" aria-disabled="true" aria-label="@lang('pagination.next')">
                @lang('pagination.next')
            </span>
        @endif
    </nav>
@endif
