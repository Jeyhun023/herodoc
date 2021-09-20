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
                                <img src="{{$advert->user->image}}" class="profile-pict-img img-fluid" alt="" style="width: 32px;height: 32px;">
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
                               @include('front.shared.comment-card', ['comment' => $comment])
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
                                        <li class="feature included">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            İstifadə qaydası
                                        </li>
                                        <li class="feature included">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Müəlliflik hüquqları
                                        </li>
                                        <li class="feature included">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            100% geri ödəmə
                                        </li>
                                    </ul>
                                </article>
                                @if($advert->user->id != auth()->id())
                                    <form method="POST" action="{{route('order.store', ['advert' => $advert->id])}}" id="orderPost">
                                        @csrf
                                    </form>
                                    <a href="{{route('message.applyChat', ['user' => $advert->user->id])}}">
                                        <button>Müraciət et</button>
                                    </a>
                                    <div class="contact-seller-wrapper" style="box-shadow: unset;border-radius: unset;background-color: unset;padding: unset;">
                                        <a class="fit-button order" href="javascript:void(0)">Sifariş et</a>
                                    </div>
                                    <div class="row">
                                        <div class="mobileShow" style="width:50%;left: 0">
                                            <button type="button" class="btn btn-info order" style="border-radius:40px;background: linear-gradient(to right, #1B0A98 0%, #20B5B7 100%);">
                                                Sifariş et
                                            </button>
                                        </div>
                                        <div class="mobileShow" style="width:50%">
                                            <a href="{{route('message.applyChat', ['user' => $advert->user->id])}}">
                                                <button type="button" class="btn btn-success" style="border-radius:40px">
                                                    Müraciət et
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @endif
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

    </div>

    <div id="orderForm" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$advert->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Diqqət! Bu formu təsdiqlədiyiniz halda, əməkdaşlarımız sizinlə əlaqəyə keçəcək. Ödənişi bizə etdikdən sonra seçdiyiniz mütəxəssis işə başlayacaq. İş tamamlanmadığı halda, pulunuz tam halda sizə geri qaytarılacaq.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İmtina</button>
                    <button type="button" class="btn btn-primary orderSubmit">Təsdiq</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script>
    $(document).ready(function(){
        $(".order").click(function(){
            $("#orderForm").modal('show');
        });
        $(".orderSubmit").click(function(){
            $("#orderPost").submit();
        });
    });
</script>
@endpush
