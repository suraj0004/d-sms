<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $getInfo = Socialite::driver('google')->user();
        $finduser = User::where('email', $getInfo->email)->first();
        if($finduser){
            return redirect('/');
        }
        $user = $this->createUser($getInfo, 'google');
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $getInfo = Socialite::driver('facebook')->user();
        $finduser = User::where('email', $getInfo->email)->first();
        if($finduser){
            return redirect('/');
        }
        $user = $this->createUser($getInfo, 'facebook');
        Auth::login($user);
        return redirect('/dashboard');
    }
    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'password' => md5(mt_rand(10000,999999)),
            ]);
        }
        return $user;
    }
}
