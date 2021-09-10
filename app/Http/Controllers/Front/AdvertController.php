<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\Order;

class AdvertController extends Controller
{
    public function index()
    {
        return view('front.pages.adverts');
    }

    public function show($slug)
    {
        $advert = Advert::where('slug', $slug)->with(['user' => function($query){
            $query->with('adverts');
            $query->withCount('comments');
            $query->with('comments.user');
        }])->firstOrFail();
        $orders_no = Order::whereIn('advert_id', $advert->user->adverts->pluck('id'))->where('status', 'finished')->count();
        $suggestions = Advert::where('category_id', $advert->category_id)->with(['user' => function($query){
            $query->withCount('comments');
        }])->inRandomOrder()->limit(8)->get();

        return view('front.pages.advert', compact('advert','orders_no','suggestions'));
    }
}
