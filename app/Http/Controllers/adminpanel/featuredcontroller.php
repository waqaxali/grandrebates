<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\store;
use Auth;
use Illuminate\Http\Request;

class featuredcontroller extends Controller
{
    public function __construct()
    {

        $this->featured = new Feature;
        $this->store = new store;
        $this->category = new Category;
    }
    public function all_featured()
    {
        // $all_featured = $this->featured::where('is_active', 1)->orderBy('id', 'DESC')->get();
        // return view('adminpanel.featured.all_featured', compact('all_featured'));

          return view('adminpanel.featured.all_featured');
    }

    public function add_featured()
    {
        return view('adminpanel.featured.add_featured');
    }
    public function save_featured(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'location'=>'required',
            ]);
        if ($request->location == 'Home-Page-Featured-Store') {
            $this->featured->featuredable_type = 'store';
        }
        if ($request->location == 'Home-Page-Featured-Category') {
            $this->featured->featuredable_type = 'category';
        }
        if ($request->location == 'Home-Page-Top-Deals') {
            $this->featured->featuredable_type = 'deal';
        }
        if ($request->location == 'Home-Page-Slider') {
            $this->featured->featuredable_type = 'slider';
        }

        $this->featured->location = $request->location;
        $this->featured->featureable_item_id = $request->featureable_item_id ? $request->featureable_item_id : '';
        $this->featured->title = $request->title;
        $this->featured->user_id = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $this->featured->image = $filename;
        }
        $success = $this->featured->save();
        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('all_featured');
        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_featured');
        }

    }

    public function edit_featured($id)
    {
        $current_feature = $this->featured::find($id);
        return view('adminpanel.featured.edit_featured', compact('current_feature'));
    }

    public function update_featured(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'location'=>'required',
            ]);
        if ($request->location == 'Home-Page-Featured-Store') {
            $this->featured->featuredable_type = 'store';
        }
        if ($request->location == 'Home-Page-Featured-Category') {
            $this->featured->featuredable_type = 'category';
        }
        if ($request->location == 'Home-Page-Top-Deals') {
            $this->featured->featuredable_type = 'deal';
        }
        if ($request->location == 'Home-Page-Slider') {
            $this->featured->featuredable_type = 'slider';
        }
        $update = $this->featured::find($id);
        $update->location = $request->location;

        $update->featureable_item_id = $request->featureable_item_id ? $request->featureable_item_id : '';
        $update->title = $request->title;
        $update->slug = phpslug($request->title);
        $update->user_id = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $update->image = $filename;
        }
        $success = $update->save();
        if ($success == true) {
            toast('Successfully update!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('all_featured');
        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_featured');
        }

    }
    public function ajaxcall(Request $request)
    {
        if ($request->select_type == 'Home-Page-Featured-Store') {
            $data = $this->store::select('id','store_name')->orderBy('id', 'desc')->where('is_active', config('constants.is_active'))->where('status',config('constants.status.is_active'))->get();
            return response()->json($data);
        }
       if ($request->select_type == 'Home-Page-Featured-Category') {
            $data = $this->category::select('id','name')->where('category_type', 'store')->orderBy('id', 'desc')->get();
            return response()->json($data);
       }
        if ($request->select_type == 'Home-Page-Top-Deals') {
            $data = $this->store::select('id','store_name')->orderBy('id', 'desc')->where('is_active', 1)->where('status',config('constants.status.is_active'))->get();
            return response()->json($data);
        }

        if ($request->select_type == 'Home-Page-Slider') {

            $data = $this->store::select('id','store_name')->orderBy('id', 'desc')->where('is_active', 1)->where('status',config('constants.status.is_active'))->get();

            return response()->json($data);
        }



    }

    public function delete_featured($id)
    {


        $success = $this->featured::find($id)->update([
            'is_active' => 2,
        ]);
        if ($success == true) {
            toast('Successfully deleted!', 'success')->timerProgressBar()->width('400px');
            return redirect()->route('all_featured');
        }
    }
}
