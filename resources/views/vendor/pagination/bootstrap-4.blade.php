@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-primary m-b-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                        rel="prev">&laquo;</a></li>
            @endif

            {{-- First 5 pages --}}
            @for ($i = 1; $i <= 4 && $i <= $paginator->lastPage(); $i++)
                <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Dots if more pages exist after 5 --}}
            @if ($paginator->lastPage() > 6)
                <li class="page-item disabled"><span class="page-link">...</span></li>
                {{-- Last page --}}
                <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'active' : '' }}">
                    <a class="page-link"
                        href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                        rel="next">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
