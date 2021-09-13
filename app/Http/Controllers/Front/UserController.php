<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->with(['adverts.user' => function($query){
            $query->withCount('comments');
        }])->withCount('comments')->firstOrFail();
        $orders_no = Order::whereIn('advert_id', $user->adverts->pluck('id'))->where('status', 'finished')->count();
        return view('front.pages.profile', compact('user','orders_no'));
    }
}
