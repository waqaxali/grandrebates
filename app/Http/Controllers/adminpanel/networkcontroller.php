<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Network;
use Auth;
class networkcontroller extends Controller
{
    function __construct(){
        $this->network= new Network;
    }
    public function networks(){
       $networks= $this->network::orderBy('id','DESC')->paginate(config('constants.per_page'));
        return view('adminpanel.network.network',compact('networks'));
    }

    public  function add_network(Request $request)
    {
        return view('adminpanel.network.add_network');
    }

    public  function save_network(Request $request)
    {
        $request->validate([
                  'name'=>'required|unique:networks,name',
                  ]);

                  $this->network->name=$request->name;
                  $this->network->slug=phpslug($request->name);
                  $this->network->is_active=1;
                  $this->network->user_id=Auth::user()->id;
                  $success=$this->network->save();
                  if( $success==true){
                    toast('Successfully save!','success')->timerProgressBar()->width('400px');
                    return redirect()->route('networks');
                  }

    }
    public  function edit_network(Request $request,$slug)
    {
        $network = $this->network::where('slug',$slug)->first();
        return view('adminpanel.network.edit_network',compact('network'));
    }
    public  function update_network(Request $request,$slug)
    {
        $update= $this->network::where('slug',$slug)->first();
        $update->name=$request->name;
        $this->network->slug=phpslug($request->name);
        $success=$update->update();
        if( $success==true){
            toast('Successfully update!','success')->timerProgressBar()->width('400px');
            return redirect()->route('networks');
          }
    }
    public  function delete_network(Request $request,$slug)
    {
        $success= $this->network::where('slug',$slug)->delete();
        if( $success==true){


            return redirect()->route('networks');
          }
    }
}
