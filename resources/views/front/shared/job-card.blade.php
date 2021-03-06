<a href="{{route('advert.show', ['slug' => $advert->slug])}}" tabindex="-1">
    <img class="img-fluid" src="{{$advert->image}}">
</a>
<div class="inner-slider" style="margin-bottom: 40px;">
    <div class="inner-wrapper">
        <div class="d-flex align-items-center">
            <span class="seller-image">
                <img class="img-fluid" src="{{$advert->user?->image}}" alt="{{$advert->user?->username}}" style="object-fit: cover;">
            </span>
            <span class="seller-name">
                <a style="height: 40px;margin-top: 8px;overflow: hidden;" href="{{route('advert.show', ['slug' => $advert->slug])}}" tabindex="-1">{{substr($advert->name, 0, 58)}}@if(strlen($advert->name) > 58)...@endif</a>
                <a href="{{route('user.show', ['user' => $advert->user?->username])}}">
                    <span class="level hint--top level-one-seller">{{$advert->user?->fullname}}</span>
                </a>
            </span>
        </div>
        <h3 style="height: 42px;overflow: hidden;">{{substr($advert->short_desc, 0, 68)}}@if(strlen($advert->short_desc) > 68)...@endif</h3>
        <div class="content-info">
            <div class="rating-wrapper">
                <span class="gig-rating text-body-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                        <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                        </path>
                    </svg>
                    {{$advert->user->rate}}
                    <span>({{$advert->user?->comments_count}})</span>
                </span>
            </div>
        </div>
        <div class="footer">
            <a href="{{route('advert.show', ['slug' => $advert->slug])}}">
                <button type="button" class="btn btn-outline-success">Bax</button>
            </a>
            <div class="price">
                <a href="javascript:void(0)" tabindex="-1"><span> {{$advert->price}} azn</span></a>
            </div>
        </div>
    </div>
</div>
