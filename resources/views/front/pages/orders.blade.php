@extends('front.partials.app', ['title' => 'Sifarişlər - Herodoc', 'description' => 'Sifariş etdiyiniz elanları bu səhifədən izləyə və komment yaza bilərsiniz'])
@section('content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Sifarişlərim</h2>
                @if(session()->has('success'))
                    <p style="color:green">Təbriklər! Kommentiniz yoxlanıldıqdan sonra paylaşılacaq</p>
                @endif
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
                                        <th>Alətlər</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{route('advert.show', ['slug' => $order->advert->slug])}}" class="make-black">
                                                    <img class="order-proposal-image" src="{{$order->advert->user->image}}">
                                                    <p class="order-proposal-title" id="proposal-name-{{$order->id}}">{{$order->advert->name}}</p>
                                                </a>
                                            </td>
                                            <td>{{$order->order_no}}</td>
                                            <td>{{$order->created_at->format('d.m.Y')}}</td>
                                            <td>{{$order->payment}} AZN</td>
                                            <td>
                                                @switch($order->status)
                                                    @case('waiting')
                                                        <button type="button" class="btn btn-info order" style="border-radius:7px;background: linear-gradient(to right, #1B0A98 0%, #20B5B7 100%);">
                                                            Gözləyir
                                                        </button>
                                                        @break
                                                    @case('loading')
                                                        <button type="button" class="btn btn-info order" style="border-radius:7px;background: linear-gradient(to right, #FC8A00 0%, #DBE50E 100%);">
                                                            Hazırlanır
                                                        </button>
                                                        @break
                                                    @case('finished')
                                                        <button type="button" class="btn btn-info order" style="border-radius:7px;background: linear-gradient(to right, #81F0AF 0%, #24FF01 100%);">
                                                            Bitib
                                                        </button>
                                                        @break
                                                    @case('rejected')
                                                        <button type="button" class="btn btn-info order" style="border-radius:7px;background: linear-gradient(to right, #F58652 0%, #FC0000 100%);">
                                                            Rədd edildi
                                                        </button>
                                                        @break
                                                    @default
                                                        <button type="button" class="btn btn-info order" style="border-radius:7px;background: linear-gradient(to right, #1B0A98 0%, #20B5B7 100%);">
                                                            Gözləyir
                                                        </button>
                                                @endswitch
                                            </td>
                                            <td><button class="btn btn-sm btn-success comment" data-id="{{$order->id}}"><i class="fa fa-comment" aria-hidden="true"></i></button></td>
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

<div id="commentForm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{route('order.comment')}}" method="POST" id="commentPost">
                    @csrf 
                    <input type="hidden" name="order_id" id="order_id">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" checked/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="7"
                        placeholder="Komment..."></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İmtina</button>
                <button type="button" class="btn btn-primary commentSubmit">Təsdiq</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function(){
        $(".comment").click(function(){
            $(".modal-title").html($("#proposal-name-"+$(this).data('id')).html());
            $("#order_id").val( $(this).data('id') );
            $("#commentForm").modal('show');
        });
        $(".commentSubmit").click(function(){
            $("#commentPost").submit();
        });
    });
</script>
@endpush
@push('css')
<style>
*{
   margin: 0;
   padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>