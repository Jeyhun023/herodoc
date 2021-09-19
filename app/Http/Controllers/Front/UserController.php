<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use File;
use Hash;

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
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'username' => 'required'
        ]);
        $user = auth()->user();

        if ($request->hasFile("image")) {
            File::delete($user->image);
            $path = \App\Models\File::storeFile('front/images/user', $request->file("image"));
            $data['image'] = $path;
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
            'old_pass' => 'required',
            'new_pass' => 'required',
            'new_pass_r' => 'required',
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
}
