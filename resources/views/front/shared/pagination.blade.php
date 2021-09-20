@if ($paginator->hasPages())
<div class="footer-pagination text-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link disabled" href="{{ $paginator->appends(request()->input())->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                    </a>
                </li>
            @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->appends(request()->input())->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->appends(request()->input())->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endif