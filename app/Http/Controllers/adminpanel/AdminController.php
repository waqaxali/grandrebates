<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Models\referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function login()
    {

        return view('adminpanel/login');
    }

    public function auth(Request $req)
    {

        $req->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (Auth::attempt(['email' => $req['email'], 'password' => $req['password'], 'role' => '1'])) {

            return view('adminpanel/index');

        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function register_user(Request $request)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',

        ], [
            'email.required' => 'The email must be unique',
            'password.required' => 'The password field is required',
        ]);
        $username = explode('@', $request->email);
        $new_user = new User;

        $new_user->email = $request->email;
        $new_user->username = $username[0];
        $new_user->name = $username[0];
        $new_user->slug = phpslug($username[0]);
        $new_user->password = Hash::make($request->password);
        $success = $new_user->save();

        $new_user_id = $new_user->id;
        if (Session::get('username') != '') {
            $user = User::where('username', Session::get('username'))->first();
            $auth_id = $user->id;
            referral::create([
                'user_id' => $auth_id,
                'referral_id' => $new_user_id,
            ]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            }

        }
        elseif (!empty($request->hidden_store_id)) {
            $succes = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if ($success == true) {
                return redirect()->back();
            }

        } else {
            $succes = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if ($success == true) {
                return redirect()->route('home');
            }

        }

    }

    public function subscription()
    {
        return view('subscription');
    }
}
