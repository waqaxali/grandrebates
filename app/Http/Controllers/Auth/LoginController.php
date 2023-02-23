<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Url;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//login with google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user= Socialite::driver('google')->stateless()->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }



//login with facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user= Socialite::driver('facebook')->stateless()->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }

//login with github
public function redirectToGithub()
{
    return Socialite::driver('github')->redirect();
}
public function handleGithubCallback()
{
    $user= Socialite::driver('github')->stateless()->user();
    $this->_registerOrLoginUser($user);
    return redirect()->route('home');
}


    protected function _registerOrLoginUser($data){
        $user=User::where('email',$data->email)->first();
        if(!$user){
           // dd($data);
            $user=new User();
            $user->name=$data->name?$data->name:'';
            $user->email=$data->email;
            $user->provider_id=$data->id;
            $user->role='2';
            $user->password=encrypt('1234');
           $user->save();
        }
        Auth::login($user);
    }


    public function auth(Request $req){

             $req->validate([
            'email'=>'required|email',
             'password'=>'required',

       ]);


       if(Auth::attempt(['email' => $req['email'], 'password' => $req['password']])){
           return redirect()->route('home');
       }






}
}
