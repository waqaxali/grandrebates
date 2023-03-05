<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Offer;
use App\Models\store;
use App\Models\subcategory;
use App\Models\storesubcategory;
use Auth;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function __construct()
    {

        $this->category = new Category;
        $this->store = new store;
        $this->feature = new Feature;
        $this->offers = new Offer;
        $this->subcategories = new subcategory;
        $this->storesubcategories = new storesubcategory;
    }
    public function all_category()
    {
        // $all_category = $this->category::orderBy('id', 'DESC')->get();
        // return view('adminpanel.category.all_category', compact('all_category'));

        return view('adminpanel.category.all_category');
    }

    public function add_category()
    {
        return view('adminpanel.category.add_category');
    }
    public function edit_category(Request $request, $id)
    {
        $current_category = $this->category::find($id);
        return view('adminpanel.category.edit_category', compact('current_category'));
    }
    public function save_category(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            // 'location'=>'required',
            ],[
                'name.required'=>'The name field is required',
            // 'location.required'=>'The location field is required',
            ]);

        $this->category->name = $request->name;
        $this->category->description = $request->description;
        $this->category->description_bottom = $request->description_bottom;
        $this->category->category_type = $request->category_type;
        $this->category->slug = phpslug($request->category_type);
        $this->category->user_id = Auth::user()->id;
        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $this->category->featured_image = $filename;
        }
        if ($request->file('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $this->category->cover_image = $filename;
        }
        $success = $this->category->save();
        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('all_category');
        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_category');
        }
    }

    public function update_category(Request $request, $id)
    {

        $update = $this->category->find($id);
        $update->name = $request->name;
        $update->description = $request->description;
        $update->description_bottom = $request->description_bottom;
        // $update->slug_suffix=$request->slug_suffix;

        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $update->featured_image = $filename;
        }
        if ($request->file('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $update->cover_image = $filename;
        }
        $success = $update->update();
        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('all_category');
        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_category');
        }
    }
    public function delete_category($id)
    {
        $success = $this->category::where('id', $id)->delete();
        if ($success == true) {

            return redirect()->route('all_category');
        }
    }

    public function categories(Request $request,$id)
    {

        $stores='';
        $all_feature = $this->feature::whereHas('categories', function ($query) use ($id) {
            $query->where('id', $id);
        })->where('location', 'Home-Page-Featured-Category')->orderBy('id', 'desc')->take(3)->get();

        $stores = $this->store::whereHas('categories', function ($query) use ($id) {
            $query->where('id', $id);
        })->where('status',config('constants.status.is_active'))->get();

        $subcategories = $this->subcategories::where('category_id',$id)->get();

        if(isset($request->hidden_category_id)){


          $store_id= storesubcategory::where('category_id',$request->hidden_category_id)->where('subcategory_id',$request->subcategory_id)->pluck('store_id')->toArray();

            $stores=$this->store::whereIn('id',$store_id)->where('status',config('constants.status.is_active'))->get();
             //dd($stores);
        }


        return view('adminpanel.user.categories', get_defined_vars());
    }

    public function track_store_category_ajaxcall(Request $request)
    {
        $all_category = $this->category::with('offers')->where('slug', $request->slug)->get();
        return response()->json(['categories' => json_encode($all_category)]);
    }
}
