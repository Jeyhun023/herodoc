<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\Category;
use App\Models\User;
use App\Models\FreelancerForm;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $adverts = Advert::with(['user' => function($query){
            $query->withCount('comments');
        }])
        ->orderByDesc(
            User::select('rate')
                ->whereColumn('id', 'adverts.user_id')
                ->limit(1)
        )
        ->limit(8)->get();
        return view('front.pages.index', compact('adverts'));
    }

    public function getAdverts()
    {
        $adverts = Advert::with(['user' => function($query){
            $query->withCount('comments');
        }])
        ->orderByDesc(
            User::select('rate')
                ->whereColumn('id', 'adverts.user_id')
                ->limit(1)
        )
        ->paginate(8);
        $data = view('front.shared.adverts-slider', compact('adverts'))->render();   
       
        return response()->json($data, 200);
    }

    public function privacyandpolicy()
    {
        return view('front.pages.privacy_policy');
    }

    public function search()
    {
        $query = request()->input('query');
        $adverts = Advert::with(['user' => function($query){
                $query->withCount('comments');
            }])
            ->orderByDesc(
                User::select('rate')
                    ->whereColumn('id', 'adverts.user_id')
                    ->limit(1)
            )
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

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $query = $category->name;

        $adverts = Advert::with(['user' => function($query){
            $query->withCount('comments');
        }])->where('category_id', $category->id)
        ->orderByDesc(
            User::select('rate')
                ->whereColumn('id', 'adverts.user_id')
                ->limit(1)
        )->paginate(12);

        return view('front.pages.adverts', compact('query', 'adverts'));
    }

    public function tags($query)
    {
        $adverts = Advert::with(['user' => function($query){
                $query->withCount('comments');
            }])
            ->orderByDesc(
                User::select('rate')
                    ->whereColumn('id', 'adverts.user_id')
                    ->limit(1)
            )
            ->where('tags','LIKE','%'.$query.'%')
            ->orWhere('content','LIKE','%'.$query.'%')
            ->orWhere('name','LIKE','%'.$query.'%')
            ->paginate(12);
       
        return view('front.pages.adverts', compact('adverts','query'));
    }
}
