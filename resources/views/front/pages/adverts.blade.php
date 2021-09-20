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
    @include('front.shared.pagination', ['paginator' => $adverts])
</div>
@endsection