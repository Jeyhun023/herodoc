@extends('front.partials.app')
@section('content')
<section class="py-5 homepage-search-block position-relative">
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-7">
                <div class="homepage-search-title">
                    <h1 class="mb-3 text-shadow text-gray-900 font-weight-bold">
                        Axtardığın xidməti tap
                    </h1>
                    <h5 class="mb-5 text-shadow text-gray-800 font-weight-normal">
                        Herodoc - hər an ehtiyacın olan köməkçin
                    </h5>
                </div>
                <div class="homepage-search-form">
                    <form class="form-noborder" action="{{ route('search') }}">
                        <div class="form-row">
                            <div class="col-lg-7 col-md-7 col-sm-12 form-group">
                                <input type="text" placeholder="Xidmət axtar..." name="query"
                                    class="form-control border-0 form-control-lg shadow-sm">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                <button type="submit"
                                    class="btn btn-success btn-block btn-lg btn-gradient shadow-sm"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="popular">
                    <span class="text-body-2">Axtarışlar</span>
                    <ul>
                        <li><a href="#" class="text-body-2">motivasiya</a></li>
                        <li><a href="#" class="text-body-2">referans</a></li>
                        <li><a href="#" class="text-body-2">müraciət</a></li>
                        <li><a href="#" class="text-body-2">təqaüd imkanları</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <img class="img-fluid" src="/front/images/banner.svg" alt="">
            </div>
        </div>
    </div>
</section>

<div class="freelance-projects bg-white py-5">
    <div class="container">
        <div class="view_slider recommended">
            <div class="col-lg-12">
                <h3>Sonuncu elanlar</h3>
                <div class="row">
                    @foreach($adverts as $advert)
                        <div class="col-lg-3">
                            @include('front.shared.job-card', ['advert' => $advert])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection