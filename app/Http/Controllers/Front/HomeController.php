<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advert;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $adverts = Advert::with(['user' => function($query){
            $query->withCount('comments');
        }])->orderBy('id', 'DESC')->limit(8)->get();
        return view('front.pages.index', compact('adverts'));
    }
}
