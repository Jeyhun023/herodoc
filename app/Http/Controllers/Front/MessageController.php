<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('front.pages.messages');
    }

    public function show()
    {
        return view('front.pages.message');
    }
}
