@extends('front.partials.app')
@section('content')
<div class="main-page best-selling">
    <div class="view_slider recommended pt-5">
        <div class="container">
            <div class="sorting-div d-flex align-items-center justify-content-between">
                <p class="mb-2">{{$adverts->total()}} nəticə</p>
            </div>
            <h3>{{$query}}</h3>
        </div>
        <div class="container">
            <div class="row">
                @foreach($adverts as $advert)
                    <div class="col-md-3">
                        @include('front.shared.job-card', ['advert' => $advert])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if ($adverts->hasPages())
        <div class="footer-pagination text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if (!$adverts->onFirstPage())
                        <li class="page-item">
                            <a class="page-link disabled" href="{{ $adverts->appends(request()->input())->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $adverts->lastPage(); $i++)
                        <li class="page-item {{ ($adverts->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $adverts->appends(request()->input())->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    @if ($adverts->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $adverts->appends(request()->input())->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif

    {{-- <div class="footer-pagination text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>

                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>

                    </a>
                </li>
            </ul>
        </nav>
    </div> --}}
</div>
@endsection