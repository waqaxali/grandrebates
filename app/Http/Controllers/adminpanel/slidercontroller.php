<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use Auth;
class slidercontroller extends Controller
{

    public function __construct()
    {

        $this->slider = new slider;

    }
    public function sliders()
    {
        $sliders=$this->slider::orderBy('id','desc')->get();

          return view('adminpanel.slider.sliders',compact('sliders'));
    }
    public function add_slider()
    {
          return view('adminpanel.slider.add_slider');
    }

    public function save_slider(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'name'=>'required',
            'description'=>'required',
            'url'=>'required',
            ]);
        $this->slider->url = $request->url;
        $this->slider->title = $request->title;
        $this->slider->name = $request->name;
        $this->slider->slug = phpslug($request->name);
        $this->slider->description = $request->description;
        $this->slider->user_id = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $this->slider->image = $filename;
        }
        $success = $this->slider->save();
        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->back();
        }

    }

    public function edit_slider($id)
    {
        $current_slider = $this->slider::find($id);
        return view('adminpanel.slider.edit_slider', compact('current_slider'));
    }

    public function update_slider(Request $request, $id)
    {

        $update = $this->slider::find($id);
        $update->url = $request->url;
        $update->title = $request->title;
        $update->name = $request->name;
        $this->slider->slug = phpslug($request->name);
        $update->description = $request->description;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $update->image = $filename;
        }
        $success = $update->save();
        if ($success == true) {
            toast('Successfully update!', 'success')->timerProgressBar()->width('400px');

            return redirect()->back();
        }

    }

    public function delete_slider($id)
    {


        $success = $this->slider::find($id)->delete();

        if ($success == true) {
            toast('Successfully deleted!', 'success')->timerProgressBar()->width('400px');
            return redirect()->route('sliders');
        }
    }
}
