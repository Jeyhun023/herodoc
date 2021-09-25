@extends('front.partials.app', ['title' => 'Mənim elanlarım - Herodoc', 'description' => 'Sizə məxsus olan elanları görə bilərsiniz'])
@section('content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                    <h2 class="mb-0 p-0">Mənim elanlarım</h2>
                    <a class="btn btn-sm btn-success ml-auto" href="{{route('account.adverts.create')}}">Yeni elan</a>
                </div>
                <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                    <div class="tab-pane active" id="active">
                        <div class="table-responsive box-table mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Elan</th>
                                        <th>Kateqoriya</th>
                                        <th>Məbləğ</th>
                                        <th>Tarix</th>
                                        <th>Alətlər</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adverts as $advert)
                                    <tr>
                                        <td>
                                            <a href="{{route('advert.show', ['slug' => $advert->slug])}}" class="make-black">
                                                <img class="order-proposal-image" src="{{$advert->image}}">
                                                <p class="order-proposal-title">{{$advert->name}}</p>
                                            </a>
                                        </td>
                                        <td>{{$advert->category->name}}</td>
                                        <td>{{$advert->price}} AZN</td>
                                        <td>{{$advert->created_at->format('m.d.Y')}}</td>
                                        <td><button class="btn btn-sm btn-success">Progress</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection