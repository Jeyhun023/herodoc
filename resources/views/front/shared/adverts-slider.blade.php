@foreach($adverts as $advert)
<div class="col-lg-3">
    @include('front.shared.job-card', ['advert' => $advert])
</div>
@endforeach