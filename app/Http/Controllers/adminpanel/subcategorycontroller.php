<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Models\store;
use App\Models\subcategory;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subcategorycontroller extends Controller
{
    public function __construct()
    {

        $this->subcategory = new subcategory;
        $this->store = new store;

    }
    public function subcategories()
    {
        $subcategories = $this->subcategory::with('categories')->orderBy('id', 'desc')->get();
        // $user_groups = DB::table('subcategories')
        // ->select('id', DB::raw("GROUP_CONCAT(tags SEPARATOR ',') as tags"))
        // ->groupBy('id')
        // ->get();
        // dd( $user_groups);

        return view('adminpanel.subcategory.subcategories', compact('subcategories'));
    }
    public function add_subcategory()
    {
        return view('adminpanel.subcategory.add_subcategory');
    }

    public function save_subcategory(Request $request)
    {
        $request->validate([
            'tags' => 'required',
        ], [
            'tags.required' => 'The tag field is required',
        ]);

        $tags = explode(',', $request->tags);
        $save_data = [];
        foreach ($tags as $tag) {
            $save_data[] = [

                'category_id' => $request->category_id,
                'tags' => $tag,
                'user_id' => Auth::user()->id,
            ];
        }

        $success = DB::table('subcategories')->insert($save_data);
        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('subcategories');
        }

    }

    public function edit_subcategory($id)
    {
        $current_subcategory = $this->subcategory::find($id);

        $category_selected_id = '';
        if (isset($current_subcategory->category_id) && $current_subcategory->category_id > 0) {
            $category_selected_id = $current_subcategory->category_id;
        }

        return view('adminpanel.subcategory.edit_subcategory', get_defined_vars());
    }

    public function update_subcategory(Request $request, $id)
    {

        // $tags = explode(',', $request->tags);
        //     $save_data=[];
        //     foreach ($tags as  $tag) {
        //         $save_data[]=[

        //             'category_id'=>$request->category_id,
        //             'tags'=>$tag,
        //             'user_id'=>Auth::user()->id,
        //         ];
        //     }
        $data = $this->subcategory::find($id);

        $data->category_id = $request->category_id;
        $data->tags = $request->tags;
        $data->user_id = Auth::user()->id;
        $success = $data->update();

        if ($success == true) {
            toast('Successfully updated!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('subcategories');
        }

    }

    public function delete_subcategory($id)
    {

        $success = $this->subcategory::find($id)->delete();

        if ($success == true) {
            toast('Successfully deleted!', 'success')->timerProgressBar()->width('400px');
            return redirect()->route('subcategories');
        }
    }
}
