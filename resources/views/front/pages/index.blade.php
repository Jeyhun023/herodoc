@extends('front.partials.app', ['title' => 'Ana səhifə - Herodoc', 'description' => 'Sizi xaricdə təhsil ekspertləri ilə ən sürətli şəkildə birləşdirən ideal təhsil platforması'])
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
                        <li><a href="{{ route('search', 'query=motivasiya') }}" class="text-body-2">motivasiya</a></li>
                        <li><a href="{{ route('search', 'query=referans') }}" class="text-body-2">referans</a></li>
                        <li><a href="{{ route('search', 'query=müraciət') }}" class="text-body-2">müraciət</a></li>
                        <li><a href="{{ route('search', 'query=təqaüd') }}" class="text-body-2">təqaüd</a></li>
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
        <div class="owl-carousel">
            <div style="background-color:white"> <img src="/front/images/flag/united_kingdom.png" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/germany.jpg" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/poland.png" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/italy.png" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/turkey.jpg" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/usa.jpg" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/hungary.png" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/korea.png" style="width:80px"> </div>
            <div style="background-color:white"> <img src="/front/images/flag/china.jpg" style="width:80px"> </div>
        </div>
    </div>
    <div class="container" style="margin-top: 30px">
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
@push('css')
<link rel="stylesheet" href="/front/css/owl.carousel.min.css">
<link rel="stylesheet" href="/front/css/owl.theme.default.min.css">
@endpush
@push('js')
<script src="/front/js/owl.carousel.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:4,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true
        });
        $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[2000])
        })
        $('.stop').on('click',function(){
            owl.trigger('stop.owl.autoplay')
        })
    });
</script>
@endpush