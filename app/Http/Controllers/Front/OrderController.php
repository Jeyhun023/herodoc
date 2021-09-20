<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Advert;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->with(['advert.user'])->paginate(15);
        return view('front.pages.orders', compact('orders'));
    }

    public function generateOrderNo()
    {
        $order_no = Str::random(5);

        if (Order::where('order_no', $order_no)->exists())
        {
            return $this->generateSlug();
        }

        return strtoupper($order_no);
    }

    public function store(Advert $advert)
    {
        $order_no = $this->generateOrderNo();
        Order::create([
            'advert_id' => $advert->id,
            'user_id' => auth()->id(),
            'order_no' => $order_no,
            'payment' => $advert->price
        ]);

        return redirect()->route('order')->with(['success' => true]);
    }
}
