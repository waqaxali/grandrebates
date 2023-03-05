<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Auth;
class countrycontroller extends Controller
{
    function __construct(){
        $this->country= new Country;
    }
    public function countries(){
       $countries= $this->country::where('is_active',1)->orderBy('id','DESC')->paginate(config('constants.per_page'));
        return view('adminpanel.country.country',compact('countries'));
    }

    public  function add_country(Request $request)
    {
        return view('adminpanel.country.add_country');
    }

    public  function save_country(Request $request)
    {
        $request->validate([
                  'country_name'=>'required|unique:countries,country_name',
                  ],[
                    'country_name.required'=>'The country name must be unique',
                  ]);

                  $this->country->country_name=$request->country_name;
                  $this->country->is_active=1;
                  $this->country->user_id=Auth::user()->id;
                  $success=$this->country->save();
                  if( $success==true){
                    toast('Successfully save!','success')->timerProgressBar()->width('400px');
                    return redirect()->route('countries');
                  }

    }
    public  function edit_country(Request $request,$slug)
    {
        $country = $this->country::where('slug',$slug)->first();
        return view('adminpanel.country.edit_country',compact('country'));
    }
    public  function update_country(Request $request,$slug)
    {
        $update= $this->country::where('slug',$slug)->first();
        $update->country_name=$request->country_name;
        $success=$update->update();
        if( $success==true){
            toast('Successfully update!','success')->timerProgressBar()->width('400px');
            return redirect()->route('countries');
          }
    }
    public  function delete_country(Request $request,$slug)
    {
        $success= $this->country::where('slug',$slug)->delete();

        if( $success==true){
            toast('Successfully deleted!','success')->timerProgressBar()->width('400px');
            return redirect()->route('countries');
          }
    }
}
