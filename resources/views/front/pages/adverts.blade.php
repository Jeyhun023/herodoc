@extends('front.partials.app', ['title' => $query.' - Herodoc', 'description' => 'Axtardığınız məlumata nəticələri görə bilərsiniz'])
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
                @forelse($adverts ?: [] as $advert)
                    <div class="col-md-3">
                        @include('front.shared.job-card', ['advert' => $advert])
                    </div>
                @empty 
                <div class="col-lg-12" 
                    style="background-image: url(/front/images/empty.png);background-repeat: no-repeat;
                    background-position: center;height: 350px;">
                    <h4 style="text-align:center">Heçbir nəticə tapılmadı</h4>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    @include('front.shared.pagination', ['paginator' => $adverts])
</div>
@endsection