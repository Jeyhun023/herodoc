@extends('front.partials.app')
@section('content')
    <div class="main-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 left">
                    <h2>{{$advert->name}}</h2>
                    <div id="overview" class="seller-overview d-flex align-items-center">
                        <div class="user-profile-image d-flex">
                            <label class="profile-pict" for="profile_image">
                                <img src="{{$advert->user->image}}" class="profile-pict-img img-fluid" alt="">
                            </label>
                            <div class="profile-name">
                                <span class="user-status">
                                    <a href="{{route('user.show', ['user'=>$advert->user->username])}}" class="seller-link">{{$advert->user->fullname}}</a>
                                </span>
                            </div>
                        </div>
                        <div class="user-info d-flex">
                            <span class="user-info-rating d-flex">
                                <div class="star-rating-s15-wrapper">
                                    @for($x = 1; $x<=5; $x++)
                                        <span class="gig-rating text-body-2" @if($x <= $advert->user->rate) style="color: #ffbf00;" @endif>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                </path>
                                            </svg>
                                        </span>
                                    @endfor
                                </div>
                                <span class="total-rating-out-five" style="margin-top: 4px;">{{$advert->user->rate}}.0</span>
                            </span>
                            <span class="orders-in-queue">Görülən iş: {{$orders_no}}</span>
                        </div>
                    </div>
                    <div class="slider mt-4">
                        <img class="img-fluid" src="{{$advert->image}}" />
                    </div>
                    <div id="description" class="description">
                        <p>{{$advert->content}}</p>
                    </div>
                    <ul class="metadata"></ul>

                    <div id="reviews" class="review-section">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="m-0"> {{$advert->user->comments_count}} Komment </h4>
                        </div>
                    </div>
                    <div class="review-list">
                        <ul>
                            @foreach($advert->user->comments as $comment)
                                <li>
                                    <div class="d-flex">
                                        <div class="left">
                                            <span>
                                                <img src="{{$comment->user->image}}" class="profile-pict-img img-fluid" alt="">
                                            </span>
                                        </div>
                                        <div class="right">
                                            <h4>
                                                {{$comment->user->username}}
                                                <span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15"
                                                        height="15">
                                                        <path fill="currentColor"
                                                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                        </path>
                                                    </svg>
                                                    {{$comment->rate}}.0
                                                </span>
                                            </h4>
                                            <div class="review-description">
                                                <p>{{$comment->content}}</p>
                                            </div>
                                            <span class="publish py-3 d-inline-block w-100">{{$comment->created_at->format('d.m.Y')}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <h3 id="aboutSeller">Müəllif haqqında</h3>
                    <div class="profile-card">
                        <div class="user-profile-image d-flex">
                            <label class="profile-pict" for="profile_image">
                                <img src="{{$advert->user->image}}" class="profile-pict-img img-fluid" alt="">
                            </label>
                            <div class="right">
                                <div class="profile-name">
                                    <span class="user-status">
                                        <a href="{{route('user.show', ['user'=>$advert->user->username])}}" class="seller-link">{{$advert->user->username}}</a>
                                    </span>
                                    <div class="seller-level">{{$advert->user->jobname}}</div>
                                </div>
                                <div class="user-info">
                                    <span class="user-info-rating d-flex align-items-center">
                                        <div class="star-rating-s15-wrapper">
                                            @for($x = 1; $x<=5; $x++)
                                                <span class="gig-rating text-body-2" @if($x <= $advert->user->rate) style="color: #ffbf00;" @endif>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                                        <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            @endfor
                                        </div>
                                        <span class="total-rating-out-five"  style="margin-top: 4px;">{{$advert->user->rate}}.0</span>
                                        <span class="total-rating" style="margin-top: 4px;">({{$advert->user->comments_count}} komment)</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="stats-desc">
                            <ul class="user-stats">
                                <li>Şəhər<strong>{{$advert->user->city}}</strong></li>
                                <li>Qeydiyyat<strong>{{$advert->user->created_at->format('d.m.Y')}}</strong></li>
                                <li>Ortalama cavab vaxtı<strong>20 dəqiqə</strong></li>
                            </ul>
                            <article class="seller-desc">
                                <div class="inner">{!!$advert->user->description!!}</div>
                            </article>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4 right" style="z-index:5">
                    <div class="sticky">
                        <div class="tab-content">
                            <div id="basic" class="tab-pane fade show active">
                                <div class="header">
                                    <h3><b class="title">Qiymət</b><span class="price">{{$advert->price}} AZN</span>
                                    </h3>
                                    <p>{{$advert->short_desc}}</p>
                                </div>
                                <article>
                                    <div class="d-flex">
                                        <b class="delivery"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$advert->delivery}}</b>
                                        <b class="delivery ml-3"><i class="fa fa-refresh" aria-hidden="true"></i> 3 Reviziya</b>
                                    </div>
                                    <ul class="features">
                                        <li class="feature included"><i class="fa fa-check" aria-hidden="true"></i>Source
                                            Fayllar
                                        </li>
                                        <li class="feature included"><i class="fa fa-check"
                                                aria-hidden="true"></i>
                                            İstifadə qaydası
                                        </li>
                                        <li class="feature included"><i class="fa fa-check" aria-hidden="true"></i>10
                                            Müəllif hüquqları
                                        </li>
                                    </ul>
                                </article>
                                <button>Müraciət et</button>
                                <div class="mobileShow">
                                    <button type="button" style="border-radius:40px" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Müraciət et
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="freelance-projects bg-white py-5" style="z-index:1">
            <div class="container">
                <div class="view_slider recommended">
                    <div class="col-lg-12">
                        <h3>Tövsiyyə olunanlar</h3>
                        <div class="row">
                            @foreach($suggestions as $suggest)
                                <div class="col-lg-6">
                                    @include('front.shared.job-card', ['advert' => $suggest])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

