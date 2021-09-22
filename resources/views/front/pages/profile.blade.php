@extends('front.partials.app', ['title' => $user->fullname.' - Herodoc', 'description' => 'İstifadəçini haqqında bütün məlumatları əldə edə, elanları ilə tanış ola və yazılmış kommentləri oxuya bilərsiniz'])
@section('content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 left">
                <div class="profile_info">
                    <div class="seller-card">
                        <div>
                            <div class="user-online-indicator is-online " data-user-id="1152855" 
                                @if(!$user->isOnline())
                                    style="border: 1px solid grey;color:grey"
                                @endif
                            >
                                @if($user->isOnline())
                                    <i class="fa fa-circle"></i>online
                                @else 
                                    <i class="fa fa-circle"></i>offline
                                @endif
                            </div>
                        </div>
                        <div>
                            @if($user->isFreelance == "yes")
                                <a href="javascript:void(0)" class="ambassadors-badge">Freelance</a>
                            @endif
                        </div>
                        <div class="user-profile-info">
                            <div>
                                <div class="user-profile-image">
                                    <label class="user-pict">
                                        <img src="{{$user->image}}" class="img-fluid user-pict-img"
                                            alt="{{$user->username}}">
                                        <a href="#"
                                            class="user-badge-round user-badge-round-med locale-en-us top-rated-seller"></a></label>
                                </div>
                            </div>
                            <div class="user-profile-label">
                                <div class="username-line">
                                    <a href="javascript:void(0)" class="seller-link">{{$user->fullname}}</a>
                                </div>
                                @if($user->isFreelance == "yes")
                                    <div class="oneliner-wrapper">
                                        <small class="oneliner">{{$user->jobname}}</small>
                                        <div class="ratings-wrapper">
                                            <p class="rating-text"><strong>{{$user->rate}}.0</strong> ({{$user->comments_count}} komment)</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="buttons-wrapper">
                            <a href="{{route('message.applyChat', ['user' => $user->id])}}"
                                class="btn-lrg-standard btn-contact-me js-contact-me js-open-popup-join">Müraciət et</a>
                        </div>
                        @if($user->isFreelance == "yes")
                            <div class="user-stats-desc">
                                <ul class="user-stats">
                                    <li class="location">Şəhər<strong>{{$user->city}}</strong></li>
                                    <li class="member-since">Qeydiyyat tarixi<strong>{{$user->created_at->format('d.m.Y')}}</strong></li>
                                    <li class="response-time">Cavab müddəti<strong>40 dəqiqə</strong></li>
                                    <li class="recent-delivery">Görülən iş<strong>{{$orders_no}}</strong></li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                @if($user->isFreelance == "yes")
                    <div class="seller-profile">
                        <div class="description">
                            <h3>Haqqında</h3>
                            <p>{{$user->description}}</p>
                        </div>
                        <div class="languages">
                            <h3>Dillər</h3>
                            <ul>
                                @foreach(explode(',', $user->languages) as $language)
                                    <li>{{$language}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="skills">
                            <h3>Bacarıqlar</h3>
                            <ul>
                                @foreach(explode(',', $user->skills) as $skil)
                                    <li><a href="javascript:void(0)">{{$skil}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="education-list list">
                            <h3>Təhsil</h3>
                            <ul>
                                <li>
                                    <p>{{$user->education}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            @if($user->isFreelance == "yes")
                <div class="col-lg-8 right">
                    <h2>Elanlar</h2>
                    <div class="recommended">
                        <div class="row">
                            @foreach($user->adverts as $advert)
                                <div class="col-md-4">
                                    @include('front.shared.job-card', ['advert' => $advert])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="review-section">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="m-0">Kommentlər <small><span class="star-rating-s15"></span><span><span
                                            class="total-rating-out-five header-average-rating"
                                            data-impression-collected="true">{{$user->rate}}</span></span><span><span
                                            class="total-rating header-total-rating"
                                            data-impression-collected="true">({{$user->comments_count}})</span></span></small> </h4>
                        </div>
                    </div>
                    <div class="review-list">
                        <ul>
                            @foreach($user->comments as $comment)
                                @include('front.shared.comment-card', ['comment' => $comment])
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else 
            
            <div class="col-lg-8 right" 
                style="background-image: url(/front/images/empty.png);background-repeat: no-repeat;
                background-position: center;height: 350px;">
                <h4 style="text-align:center">{{$user->username}} heç bir elana malik deyil.</h4>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection