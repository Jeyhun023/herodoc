<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Carbon\Carbon;
use App\Models\PasswordReset;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Notifications\Auth\PasswordResetToken;
use App\Notifications\Auth\PasswordResetSuccess;
use App\Http\Requests\PasswordResetRequest;
use Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function tokenRequest(Request $request)
    { 
        $request->validate([
            'email' => 'required|string|max:255|exists:users,email',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        try {
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $request->email,
                'token' => Str::random(128)
            ]);

            $user->notify((new PasswordResetToken($passwordReset->token))->onQueue("high"));
            
            return redirect()->back()->with('status' , trans('passwords.sent'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error' , 'Xəta baş verdi!');
        }
    }

    public function showResetForm($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->with('user')
            ->first();
            
        if(!$passwordReset){
            return redirect()->back()->with('error', trans('passwords.token'));
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(180)->isPast()) {
            $passwordReset->delete();
            return redirect()->back()->with('error', trans('passwords.token'));
        }
        
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => $passwordReset->user->email]);
    }

    public function reset(PasswordResetRequest $request)
    {
        $passwordReset = PasswordReset::where([
            'token' => $request->token,
            'email'=> $request->email
        ])->firstOrFail();
        $user = User::where('email', $request->email)->first();

        if (!$passwordReset) {
            return redirect()->back()->with('error', trans('passwords.token'));
        }

        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', trans('passwords.pass_conf'));
        }

        try {
            $user->password = bcrypt($request->password);
            $user->save();
            $passwordReset->delete();
            $user->notify((new PasswordResetSuccess($passwordReset))->onQueue("medium"));

            Auth::login($user);
            return redirect()->route('index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error' , 'Xəta baş verdi!');
        }

    }
}
