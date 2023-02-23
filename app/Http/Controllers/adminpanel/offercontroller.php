<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\store;
use Auth;
use Illuminate\Http\Request;
use Carbon;
class offercontroller extends Controller
{
    public function __construct()
    {

        $this->offer = new Offer;
        $this->store = new store;

    }
    public function search_offers(Request $request){
        $date = Carbon::now()->toDateString();
        $deal = '';
        $coupen = '';
        $store = '';
        $path = '';

            $stores=$this->store::select('id','store_name')->where('status',config('constants.status.is_active'))->get();

            if(($request->type=='empty')){

                $all_offers = $this->offer::with('stores')

                ->where('store_id',$request->store_id)
                ->get();


            }
            elseif(($request->store_id=='empty')){

                $all_offers = $this->offer::with('stores')
                ->where('kind',$request->type)

                ->get();


            }
            else{
                $all_offers = $this->offer::with('stores')
                ->where('kind',$request->type)
                ->where('store_id',$request->store_id)
                ->get();


            }
            return view('adminpanel.offers.all_offers', get_defined_vars());
// return view('adminpanel.offers.all_offers', compact('all_offers', 'deal', 'coupen', 'store', 'path','stores','date'));
// return view('adminpanel.offers.all_offers', compact('all_offers', 'deal', 'coupen', 'store', 'path','stores','date'));


    }

    public function all_offers(Request $request,$slug = null)

    {
      
        $deal = '';
        $coupen = '';
        $store = '';
        $path = '';
        $stores=$this->store::select('id','store_name')->where('status',config('constants.status.is_active'))->get();

        if ($slug != null) {
            $path = 'single_store_offers';
            $store = $this->store::select('id', 'store_name', 'store_notes', 'homepage_url', 'slug')->where('slug', $slug)->first();
            $coupen = $this->offer::select('id')->where('store_id', $store->id)->where('is_active', 1)->where('kind', 'coupon')->get();
            $deal = $this->offer::select('id')->where('store_id', $store->id)->where('is_active', 1)->where('kind', 'deal')->get();

            $all_offers = $this->offer::where('store_id', $store->id)->where('is_active', 1)->get();

        } else {
//->where('end_date', '>=', get_date()->toDateString())
            $all_offers = $this->offer::with('stores')->get();

        }
        return view('adminpanel.offers.all_offers', get_defined_vars());
        // return view('adminpanel.offers.all_offers', compact('all_offers', 'deal', 'coupen', 'store', 'path','stores','date'));

    }

    public function add_offer($store_slug = null)
    {
        $all_store = $this->store::orderBy('id', 'desc')

            ->where('status', config('constants.status.is_active'))
            ->get();
        if ($store_slug == null) {
            return view('adminpanel.offers.add_offers', compact('all_store'));
        } else {
            return view('adminpanel.offers.add_offers', compact('all_store', 'store_slug'));
        }

    }

    public function save_offer(Request $request)
    {
        $request->validate([

            'kind' => 'required',
            'title' => 'required|unique:offers,title',
            'code' => 'required',
            'end_date' => 'required',

        ]);
        if (isset($request->hidden_store_slug)) {
            $store = $this->store::where('slug', $request->hidden_store_slug)->first();
            $this->offer->store_id = $store->id;
        } else {
            $this->offer->store_id = $request->store_id;
        }

        $this->offer->kind = $request->kind;
        $this->offer->short_title = $request->short_title;
        $this->offer->title = $request->title;
        $this->offer->slug = phpslug($request->title);
        $this->offer->description = $request->description;
        $this->offer->imported_desciption = $request->imported_desciption;
        $this->offer->code = $request->code;
        $this->offer->end_date = $request->end_date;
        $this->offer->user_id = Auth::user()->id;
        $success = $this->offer->save();
        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');
            if (isset($request->hidden_store_slug)) {
                return redirect()->route('all_offers', $request->hidden_store_slug);
            } else {
                return redirect()->route('all_offers');
            }

        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_offer');
        }

    }
    public function edit_offer(Request $request, $slug, $store_slug = null)
    {

        $all_store = $this->store::orderBy('id', 'desc')->where('status',config('constants.status.is_active'))->get();
        $current_offer = $this->offer::where('slug', $slug)->first();
        if ($store_slug == null) {
            return view('adminpanel.offers.edit_offers', compact('current_offer', 'all_store'));
        } else {

            return view('adminpanel.offers.edit_offers', compact('current_offer', 'all_store', 'store_slug'));
        }

    }

    public function update_offer(Request $request, $slug)
    {
        $update = $this->offer->where('slug', $slug)->first();
        $update->store_id = $request->store_id;
        $update->kind = $request->kind;
        $update->short_title = $request->short_title;
        $update->title = $request->title;
        $update->slug = phpslug($request->title);
        $update->description = $request->description;
        $update->imported_desciption = $request->imported_desciption;
        $update->code = $request->code;
        $update->end_date = $request->end_date;
        $update->user_id = Auth::user()->id;
        $success = $update->update();
        if ($success == true) {
            toast('Successfully update!', 'success')->timerProgressBar()->width('400px');

            if (isset($request->hidden_store_slug)) {
                return redirect()->route('all_offers', $request->hidden_store_slug);
            } else {
                return redirect()->route('all_offers');
            }

        } else {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('add_offer');
        }

    }
    public function delete_offer(Request $request, $slug)
    {

        $success = $this->offer::where('slug', $slug)->delete();
        if ($success == true) {

            return redirect()->route('all_offers');
        }

    }
}
