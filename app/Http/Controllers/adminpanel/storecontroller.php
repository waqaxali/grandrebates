<?php

namespace App\Http\Controllers\adminpanel;

use App\Exports\StoresExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Network;
use App\Models\Offer;
use App\Models\store;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class storecontroller extends Controller
{
    public function __construct()
    {
        $this->store = new store;
        $this->country = new Country;
        $this->network = new Network;
        $this->category = new Category;
        $this->offers = new Offer;
    }

    public function all_store(Request $request)
    {
        $change_excel_button_route = 'change';

        $all_store = $this->store::with('networks', 'categories', 'countries', 'offers')


            ->orderBy('id', 'DESC')
            ->get();
        //get select id of network in all_store_view
        $network_selected_id = '';
        if (isset($request->network_id) && $request->network_id > 0) {
            $network_selected_id = $request->network_id;
        }

//download excel sheet of stores
        if ($request->hidden_excel_export == 'hidden_excel_export') {
            return $this->fileExport($all_store);
        }

        return view('adminpanel.all_store', get_defined_vars());
    }
    public function add_store(Request $request)
    {
       // $date = Carbon::now();
        $all_category = $this->category::where('category_type', 'store')->get();
        $all_country = $this->country::all();


        return view('adminpanel.add_store', get_defined_vars());
    }

    public function save_store(Request $request)
    {
        $request->validate([

            'store_name' => 'required|unique:stores,store_name',

        ]);

        $this->store->user_id = Auth::user()->id;

        $this->store->store_name = $request->store_name;
        $this->store->slug = phpslug($request->store_name);
        $this->network_type = $request->network_type;
        // $this->store->use_network = $request->use_network;
        // $this->store->use_skimlinks = $request->use_skimlinks;
        // $this->store->use_viglink = $request->use_viglink;
        $this->store->cashback_commission = $request->cashback_commission;
        $this->store->network_cashback = $request->network_cashback;
        $this->store->network_commission = $request->network_commission;
        $this->store->network_flat_switch = $request->network_flat_switch;
        $this->store->network_flat_rate = $request->network_flat_rate;
        $this->store->skimlinks_min = $request->skimlinks_min;
        $this->store->skimlinks_flat_rate = $request->skimlinks_flat_rate;

        $this->store->status = $request->status;
        $this->store->homepage_url = $request->homepage_url;
        $this->store->affliated_url = $request->affliated_url;
        $this->store->show_store_description = $request->show_store_description;
        $this->store->store_main_description = $request->store_main_description;
        $this->store->description_about_section = $request->description_about_section;

        $this->store->custom_cashback_title = $request->custom_cashback_title;
        $this->store->custom_cashback_subtitle = $request->custom_cashback_subtitle;
        $this->store->custom_commission_title = $request->custom_commission_title;
        $this->store->custom_commission_subtitle = $request->custom_commission_subtitle;
        // $this->store->show_serp = $request->show_serp;
        $this->store->scrap_promocodes = $request->scrap_promocodes;
        $this->store->show_amazon = $request->show_amazon;
        $this->store->country_id = $request->country_id;
        $this->store->category_id = $request->category_id;
        $this->store->network_id = $request->network_id;

        $this->store->instagram_url = $request->instagram_url;
        $this->store->pinterest_url = $request->pinterest_url;
        $this->store->youtube_url = $request->youtube_url;
        $this->store->facebook_url = $request->facebook_url;
        $this->store->twitter_url = $request->twitter_url;

        //when migration refresh again remove this
        $this->store->is_active = '1';

        $this->store->custom_h1 = $request->custom_h1;
        $this->store->slug_suffix = phpslug($request->slug_suffix);
        $this->store->referral_slug = $request->referral_slug;
        $this->store->custom_meta_title = phpslug($request->custom_meta_title);
        $this->store->custom_meta_description = $request->custom_meta_description;
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $this->store->logo = $filename;
        }
        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $this->store->featured_image = $filename;
        }
     //  dd ($request->network_type);
       $success = $this->store->save();

        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->back();
        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_store');
        }

    }
    public function edit_store(Request $request, $slug, $store_name = null)
    {
         $date = Carbon::now();
        $all_category = $this->category::where('category_type', 'store')->get();
        $all_country = $this->country::all();
        $all_network = $this->network::all();
        $current_store = $this->store::where('slug', $slug)->first();
        if ($store_name == null) {
            return view('adminpanel.edit_store', get_defined_vars());

        } else {
            return view('adminpanel.edit_store', compact('current_store', 'all_network', 'all_country', 'all_category', 'store_name'));
        }

    }

    public function update_store(Request $request, $slug)
    {

        $update = $this->store->where('slug', $slug)->first();
        $update->store_name = $request->store_name;
        $update->slug = phpslug($request->store_name);
         $update->network_type = $request->network_type;
        // $update->use_network = $request->use_network;
        // $update->use_skimlinks = $request->use_skimlinks;
        // $update->use_viglink = $request->use_viglink;
        $update->cashback_commission = $request->cashback_commission;
        $update->network_cashback = $request->network_cashback;
        $update->network_commission = $request->network_commission;
        $update->network_flat_switch = $request->network_flat_switch;
        $update->network_flat_rate = $request->network_flat_rate;
        $update->skimlinks_min = $request->skimlinks_min;
        $update->skimlinks_flat_rate = $request->skimlinks_flat_rate;
        $update->network_id = $request->network_id;
        $update->status = $request->status;
        $update->homepage_url = $request->homepage_url;
        $update->affliated_url = $request->affliated_url;
        $update->show_store_description = $request->show_store_description;
        $update->store_main_description = $request->store_main_description;
        $update->description_about_section = $request->description_about_section;

        $update->custom_cashback_title = $request->custom_cashback_title;
        $update->custom_cashback_subtitle = $request->custom_cashback_subtitle;
        $update->custom_commission_title = $request->custom_commission_title;
        $update->custom_commission_subtitle = $request->custom_commission_subtitle;

        // $update->show_serp = $request->show_serp;
        $update->scrap_promocodes = $request->scrap_promocodes;
        $update->show_amazon = $request->show_amazon;
        $update->country_id = $request->country_id;
        $update->category_id = $request->category_id;

        $update->instagram_url = $request->instagram_url;
        $update->pinterest_url = $request->pinterest_url;
        $update->youtube_url = $request->youtube_url;
        $update->facebook_url = $request->facebook_url;
        $update->twitter_url = $request->twitter_url;

        $update->custom_h1 = $request->custom_h1;
        $update->slug_suffix = phpslug($request->slug_suffix);
        $update->referral_slug = $request->referral_slug;
        $update->custom_meta_title = phpslug($request->custom_meta_title);
        $update->custom_meta_description = $request->custom_meta_description;
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $update->logo = $filename;
        }
        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');
            $filename = date('YmdHi') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $update->featured_image = $filename;
        }
        // dd($request);
        $success = $update->update();
        if ($success == true) {

            toast('Successfully update record!', 'success')->timerProgressBar()->width('400px');
            if (isset($request->hidden_store)) {
                return redirect()->route('all_offers', $request->hidden_store);
            } else {
                return redirect()->back();
            }

        } else {
            toast('Oops Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('edit_store');
        }
    }
    public function delete_store($slug)
    {
        $success = $this->store::where('slug', $slug)->delete();
        if ($success == true) {

            return redirect()->route('all_store');
        }
    }

    public function stores()
    {
        $all_category = $this->category::where('category_type', 'store')->orderBy('id', 'DESC')->get();
        $all_store = $this->store::with('networks', 'categories')->where('status', config('constants.status.is_active'))->orderBy('id', 'DESC')->paginate(25);
        return view('adminpanel.user.stores', compact('all_store', 'all_category'));
    }

    public function save_store_notes(Request $request)
    {

        $success = $this->store::where('id', $request->store_id)->update([
            'store_notes' => $request->notes,
        ]);

    }

    public function search_store(Request $request, ){
        $where_clause = [];

        if ($request->missing_data != 'empty') {

            if ($request->missing_data == 'affliated_url') {
                $where_clause[] = ['affliated_url', '=', NULL];
            } elseif ($request->missing_data == 'logo') {
                $where_clause[] = ['logo', '=', NULL];
            } elseif ($request->missing_data == 'homepage_url') {
                $where_clause[] = ['homepage_url', '=', NULL];
            }
        }

       // p($request->all());

        if ($request->network_type != '') {

            $where_clause[] = ['network_type', '=',$request->network_type];
        }
        if ($request->network_id > 0) {
            $where_clause[] = ['network_id', '=',$request->network_id];
        }

        //$is_active=['status', '=',1];
        if ($request->status !='') {
            $is_active = ['status', '=',$request->status];
            $where_clause[]=$is_active;
        }

//p($where_clause); die;
     $all_store = $this->store::with('networks', 'categories', 'countries', 'offers')
        ->where($where_clause)
        ->get();

        if ($request->hidden_excel_export == 'hidden_excel_export') {

            // p($all_store);
            return $this->fileExport($all_store);
        }

        $network_selected_id = '';
        if (isset($request->network_id) && $request->network_id > 0) {
            $network_selected_id = $request->network_id;
        }

        return view('adminpanel.all_store', get_defined_vars());


    }


    public function fileExport($stores)
    {
        // $stores = $this->store::with('networks', 'categories', 'countries', 'offers')->get();
        $export_file = [];
        $count = 1;
        foreach ($stores as $store) {
            if ($store->status == config('constants.status.is_active')) {
                $status = 'Active';
            } else {
                $status = 'Deactive(Pause)';
            }

            $export_file[] = [
                '#' => $count++,
                'Network' => $store->networks->name,
                'Store Name' => $store->store_name,
                'Category' => $store->categories->name,
                'Country' => $store->country_id,
                'Offers' => count($store->offers),
                'Status' => $status,

            ];
        }
        // p($stores);
        return Excel::download(new StoresExport($export_file), 'users-collection.xlsx');

    }

    public function autocomplete_search(Request $request)
    {

        $store_name = $request->store_name;
        // select('id','store_name','logo','use_network','use_skimlinks',
        // 'cashback_commission','network_cashback','network_commission','network_flat_switch','network_flat_rate','skimlinks_min','skimlinks_flat_rate')
        if (isset($store_name) && !empty($store_name)) {
            $stores = store::select('id','store_name','logo')->with('offers')
                ->where('store_name', 'LIKE', '%' . $store_name . '%')
                ->where('status', config('constants.status.is_active'))

                ->take(3)
                ->get();
        }

        return response()->json(['stores' => $stores]);
    }

}
