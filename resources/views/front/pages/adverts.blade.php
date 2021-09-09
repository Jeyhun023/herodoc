@extends('front.partials.app')
@section('content')
<div class="main-page best-selling">
    <div class="view_slider recommended pt-5">
        <div class="container">
            <div class="sorting-div d-flex align-items-center justify-content-between">
                <p class="mb-2">463 nəticə</p>
            </div>
            <h3>Services In Web &amp; Mobile Design</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('front.shared.job-card')
                </div>
            </div>
        </div>
    </div>
    <div class="footer-pagination text-center">
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
    </div>
</div>
@endsection