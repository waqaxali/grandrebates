<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\referral;
use App\Models\User;
use App\Models\store;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $username = explode('@', $data['email']);
           $new_user= User::create([

                'email' => $data['email'],
                'username' => $username[0],
                'name' => $username[0],
                'slug' => phpslug($username[0]),
                'password' => Hash::make($data['password']),
            ]);

            $new_user_id = $new_user->id;
         if (Session::get('username') != '') {
                $user = User::where('username', Session::get('username'))->first();
                $auth_id = $user->id;
                referral::create([
                    'user_id' => $auth_id,
                    'referral_id' => $new_user_id,
                ]);
           // return $new_user;

        }
        // elseif(!empty($data['hidden_store_id'])){
        //    $store= store::find($id);
        //     return redirect()->route('codes',compact('store'));
        // }
        else{
            //return $new_user;
        }
        return back()->with($new_user);

    }

}
