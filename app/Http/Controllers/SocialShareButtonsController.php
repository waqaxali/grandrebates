<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;
use Jorenvh\Share\ShareFacade as Share;
class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
       // $username = explode('@', Auth::user()->email);


        $shareComponent = \Share::page(

            config('app.url').'/reffereduser'.'/'.Auth::user()->username,

        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp();


        return view('share', compact('shareComponent'));
    }
    public function reffered_users($username)
    {
      dd($username);
    }
}
