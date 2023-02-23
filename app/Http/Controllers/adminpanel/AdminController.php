<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class AdminController extends Controller
{
    public function login(){

        return view('adminpanel/login');
    }

    public function auth(Request $req){

        $req->validate([
            'email'=>'required|email',
             'password'=>'required',

       ]);

       if(Auth::attempt(['email' => $req['email'], 'password' => $req['password'],'role' => '1'])){

           return view('adminpanel/index');


       }else{
           return redirect()->route('admin.login')->with('fail','Incorrect credentials');
       }
    }


    public function subscription(){
        return view('subscription');
    }
}
