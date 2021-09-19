<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\FreelancerForm;

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

    public function search()
    {
        $query = request()->input('query');
        $adverts = Advert::with(['user' => function($query){
                $query->withCount('comments');
            }])
            ->orderBy('id', 'DESC')
            ->where('name','LIKE','%'.$query.'%')
            ->orWhere('content','LIKE','%'.$query.'%')
            ->paginate(12);

        return view('front.pages.adverts', compact('adverts','query'));
    }

    public function freelancerForm()
    { 
        return view('front.pages.becomefreelancer' );
    }

    public function freelancerFormPost(Request $request)
    { 
        $validated = $request->validate([
            'fullname' => 'required',
            'education_level' => 'required',
            'education' => 'required',
            'skills' => 'required',
            'content' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        FreelancerForm::create($validated);

        return redirect()->back()->with(['success' => true]);
    }
}
