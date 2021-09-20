@extends('front.partials.app')
@section('content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Sifarişlərim</h2>
                @if($orders->isNotEmpty())
                <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                    <div class="tab-pane active" id="active">
                        <div class="table-responsive box-table mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Elan</th>
                                        <th>Sifariş nömrəsi</th>
                                        <th>Sifariş tarixi</th>
                                        <th>Məbləğ</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{route('advert.show', ['slug' => $order->advert->slug])}}" class="make-black">
                                                    <img class="order-proposal-image" src="{{$order->advert->user->image}}">
                                                    <p class="order-proposal-title">{{$order->advert->name}}</p>
                                                </a>
                                            </td>
                                            <td>{{$order->order_no}}</td>
                                            <td>{{$order->created_at->format('d.m.Y')}}</td>
                                            <td>{{$order->payment}} AZN</td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    @switch($order->status)
                                                        @case('waiting')
                                                            Gözləyir
                                                            @break
                                                        @case('loading')
                                                            Hazırlanır
                                                            @break
                                                        @case('finished')
                                                            Bitib
                                                            @break
                                                        @case('rejected')
                                                            Rədd edildi
                                                            @break
                                                        @default
                                                            Gözləyir
                                                    @endswitch
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else 
                    <div class="col-lg-12" 
                        style="background-image: url(/front/images/empty.png);background-repeat: no-repeat;
                        background-position: center;height: 350px;">
                        <h4 style="text-align:center">Heç bir sifarişiniz yoxdur</h4>
                    </div>
                @endif
            </div>
        </div>
    </div><br><br>
    @include('front.shared.pagination', ['paginator' => $orders])
</div>
@endsection