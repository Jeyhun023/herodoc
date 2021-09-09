<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function index()
    {
        return view('front.pages.adverts');
    }

    public function show()
    {
        return view('front.pages.advert');
    }
}
