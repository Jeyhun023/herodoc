<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Advert;
use App\Models\Category;
use File;
use Hash;
use Illuminate\Support\Str;

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
    
    public function account()
    {
        $user = auth()->user();
        return view('front.pages.account', compact('user'));
    }

    public function save(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'image' => ['sometimes', 'nullable', 'image', 'mimetypes:image/*', 'mimes:png,jpeg,jpg', 'max:2000'],
            'fullname' => 'required',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'username' => 'required|string|max:255|regex:/(^([a-zA-Z]+)(\d+)?$)/u|unique:users,username,'.$user->id,
        ]);

        if ($request->hasFile("image")) {
            File::delete($user->image);
            $path = \App\Models\File::storeFile('front/images/user', $request->file("image"));
            $data['image'] = '/'.$path;
        }else{
            $data['image'] = $request->old_image;
        }

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->image = $data['image'];
        $user->save();

        return redirect()->back()->with(['save' => "Məlumatlarınız dəyişdirildi"]);
    }

    public function pass(Request $request)
    {
        $request->validate([
            'old_pass' => 'required', 'string', 'min:6',
            'new_pass' => 'required', 'string', 'min:6',
            'new_pass_r' => 'required', 'string', 'min:6',
        ]);
        $user = auth()->user();
        if ($request->new_pass != $request->new_pass_r) {
            return redirect()->back()->with(['new_pass_r' => ['Şifrələr uyğun gəlmir']]);
        }
        if (!Hash::check($request->old_pass, $user->password)) {
            return redirect()->back()->with(['old_pass' => ['Köhnə şifrə düz deyil']]);
        }

        $user->password = bcrypt($request->new_pass);
        $user->save();
        return redirect()->back()->with(['pass_succ' => "Şifrəniz dəyişdirildi"]);
    }
     
    public function adverts()
    {
        if(auth()->user()->isFreelance == "no"){
            abort(404);
        }
        $adverts = Advert::where('user_id', auth()->id())->with('category')->get();
        return view('front.pages.user_adverts', compact('adverts'));
    }

    public function advertCreate()
    {
        if(auth()->user()->isFreelance == "no"){
            abort(404);
        }
        $categories = Category::where(['status' => true,'parent_id' => null])
            ->with('subcat')
            ->orderBy('sort', 'ASC')
            ->get();
        return view('front.pages.user_adverts_create', compact('categories'));
    }

    public function generateSlug($name, $number = 0)
    {
        $slug = Str::slug($name);
        $slug .= ($number > 0) ? $number : "";
        if (Advert::query()->where('slug', $slug)->exists()) {
            $number++;
            return $this->generateSlug($name, $number);
        }
        return $slug;
    }

    public function advertStore(Request $request)
    {
        if(auth()->user()->isFreelance == "no"){
            abort(404);
        }
        $request->validate([
            'image' => ['required', 'image', 'mimetypes:image/*', 'mimes:png,jpeg,jpg', 'max:5000'],
            'name' => 'required',
            'price' => 'required',
            'delivery' => 'required',
            'category_id' => 'required',
            'short_desc' => 'required',
            'content' => 'required',
        ]);

        if ($request->hasFile("image")) {
            $path = \App\Models\File::storeFile('front/images/list', $request->file("image"), [800, 615]);
            $image = '/'.$path;
        }

        $advert = Advert::create([
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => $this->generateSlug($request->name),
            'image' => $image,
            'price' => $request->price,
            'delivery' => $request->delivery,
            'short_desc' => $request->short_desc,
            'content' => $request->content,
        ]);
       
        return redirect()->route('advert.show', ['slug' => $advert->slug]);
    }
}
