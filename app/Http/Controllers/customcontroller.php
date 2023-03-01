<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\slider;
use Illuminate\Support\Facades\Gate;
class customcontroller extends Controller
{
    //

    public function index()
    {
        $home_feature_store=Feature::with('stores')->where('location','Home-Page-Featured-Store')->orderBy('id','desc')->limit(3)->get();
        $home_feature_deal=Feature::with('stores')->where('location','Home-Page-Top-Deals')->orderBy('id','desc')->limit(4)->get();
        //dd($home_store);
        if (Gate::allows('isAdmin')) {
            return view('home',compact('home_feature_store','home_feature_deal'));
        }
        else{
            $home_store=Feature::where('location','Home-Page-Featured-Store')->orderBy('id','desc')->limit(4)->get();
            return view('adminpanel/user/home',compact('home_feature_store','home_feature_deal'));
        }


    }

    public function subscription(){
        return view('subscription');
    }

    public function welcome(){
        $sliders=slider::orderBy('id','desc')->get();

        $home_feature_category=Feature::where('location','Home-Page-Featured-Category')->orderBy('id','desc')->get();
        $home_feature_store=Feature::with('stores')->where('location','Home-Page-Featured-Store')->orderBy('id','desc')->get();

        $home_feature_deal=Feature::with('stores')->where('location','Home-Page-Top-Deals')->orderBy('id','desc')->take(4)->get();

        return view('welcome',compact('home_feature_category','home_feature_store','home_feature_deal','sliders'));
    }




    public function anywhere(){
        return view('static.anywhere');
    }
    public function influencers(){
        return view('static.influencers');
    }
    public function about(){
        return view('static.about');
    }
    public function partners(){
        return view('static.partners');
    }
    public function terms(){
        return view('static.terms');
    }
}
