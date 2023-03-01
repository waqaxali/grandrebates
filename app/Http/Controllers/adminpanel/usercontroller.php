<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Offer;
use App\Models\referral;
use App\Models\slider;
use App\Models\store;
use App\Models\User;
use Auth;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class usercontroller extends Controller
{
    public function __construct()
    {
        $this->store = new store;
        $this->user = new User;
        $this->feature = new Feature;
        $this->offers = new Offer;
        $this->referrals = new referral;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function users()
    {
        $users = $this->user::where('role', 1)->orderBy('id', 'desc')->get();
        //dd( $subcategories);

        return view('adminpanel.admins.users', compact('users'));
    }
    public function add_user()
    {
        return view('adminpanel.admins.add_user');
    }

    public function save_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'The email field is required',
            'username.required' => 'The username field is required',
            'password.required' => 'The password field is required',
        ]);

        $this->user->email = $request->email;
        $this->user->username = $request->username;

        $this->user->slug = phpslug($request->username);
        $this->user->password = Hash::make($request->password);
        $this->user->role = '1';

        $success = $this->user->save();

        if ($success == true) {
            toast('Successfully save!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('users');
        }

    }

    public function edit_user($id)
    {
        $current_user = $this->user::find($id);



        return view('adminpanel.admins.edit_user', get_defined_vars());
    }

    public function update_admin(Request $request, $id)
    {


        $data = $this->user::find($id);

        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $success = $data->update();

        if ($success == true) {
            toast('Successfully updated!', 'success')->timerProgressBar()->width('400px');

            return redirect()->route('users');
        }

    }

    public function delete_user($id)
    {
        if($id!=1){
            $success = $this->user::find($id)->delete();

            if ($success == true) {
                toast('Successfully deleted!', 'success')->timerProgressBar()->width('400px');
                return redirect()->route('users');
            }
        }
        else{
            toast('Super admin can'.'t be deleted!', 'danger')->timerProgressBar()->width('400px');
                return redirect()->route('users');
        }


    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function earnings()
    {
        return view('adminpanel.user.earnings');
    }

    public function codes(Request $request, $id, $type = null)
    {
        $date = Carbon::now()->toDateString();

        if ($type == null) {
            $store = $this->store::find($id);
            ///with offers find data
            $offers = $this->offers::where('store_id', $store->id)->get();

        }
        if ($type == 'category') {

            // $stores = $this->store::with('features')->get();
            // $stores = $this->store::whereHas('features', function ($query) use ($id) {
            //     $query->where('id', $id);
            // })->get();

            // $store = $stores[0];
            // $offers=$this->offers::where('store_id',$store->id)->get();
            // dd($stores);
        }
        return view('adminpanel.user.codes', compact('store', 'offers', 'date'));

    }
    public function view_codes(Request $request, $id, $type = null)
    {
        $date = Carbon::now()->toDateString();
        if ($type == 'feature_store') {

            $features = $this->feature::with('stores')->where('id', $id)->get();

            $feature = $features[0];

            $offers = $this->offers::where('store_id', $feature->stores->id)->get();
            //dd($dd);
        } elseif ($type == 'feature_deal') {

            $features = $this->feature::with('stores')->where('id', $id)->get();

            $feature = $features[0];

            $offers = $this->offers::where('store_id', $feature->stores->id)->get();
            // dd($dd);

        } else {}

        return view('adminpanel.user.view_codes', compact('feature', 'offers', 'date'));

    }

    public function saves()
    {
        $id = Auth::user()->id;
        $users = $this->user::with('stores')->where('id', Auth::user()->id)->get();
        // foreach($users as $u){
        //     dd($u->name);
        // }

        return view('adminpanel.user.saves', compact('users'));
    }

    public function settings()
    {

        return view('adminpanel.user.settings');
    }
    public function change_password()
    {
        $users = $this->user::with('referrals')->where('id', Auth::user()->id)->get();
        $user = $users[0];
        return view('adminpanel.user.change_password', compact('user'));
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password'],
        ]);
        #Match The Old Password
        #Match The Old Password
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            toast('Something went wrong!', 'error')->timerProgressBar()->width('400px');
            return redirect()->route('change_password');
        }

        // #Update the new Password
        $success = $this->user::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        if ($success == true) {
            toast('Successfully change password!', 'success')->timerProgressBar()->width('400px');
            return redirect()->route('settings');
        }
    }

    public function update_user(Request $request)
    {
        $image = '';
        if ($request->file('avatar')) {
            $image = logo_resize($request->file('avatar'));
        }
        $success = $this->user::whereId(auth()->user()->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'avatar' => $image,
            'phone' => $request->phone,
        ]);

        if ($success == true) {
            toast('Successfully update!', 'success')->timerProgressBar()->width('400px');
            return redirect()->route('settings');
        }
    }

    public function track_store_ajaxcall(Request $request)
    {
        //  dd($request->like);
        if ($request->like == 0) {
            $user = $this->user::find(Auth::user()->id);
            $success = $user->stores()->syncWithoutDetaching([$user->id => $request->id]);
            return response()->json(['success' => 'success']);
        } else {
            $user = $this->user::find(Auth::user()->id);
            $success = $user->stores()->detach($request->id);
            return response()->json(['success' => 'success']);
        }
    }

    public function reffereduser($username)
    {
        Session::put('username', $username);
        $sliders = slider::orderBy('id', 'desc')->get();
        $home_feature_category = Feature::where('location', 'Home-Page-Featured-Category')->orderBy('id', 'desc')->get();
        $home_feature_store = Feature::with('stores')->with('stores')->where('location', 'Home-Page-Featured-Store')->orderBy('id', 'desc')->get();

        $home_feature_deal = Feature::with('stores')->where('location', 'Home-Page-Top-Deals')->orderBy('id', 'desc')->take(4)->get();

        return view('welcome', compact('home_feature_category', 'home_feature_store', 'home_feature_deal', 'sliders'));
    }
    public function welcome()
    {
        // $welcome_category = Feature::where('location', 'welcome_page_category')->orderBy('id', 'desc')->get();
        // $welcome_store = Feature::where('location', 'welcome_page_store')->orderBy('id', 'desc')->get();
        // $welcome_deal = Feature::where('location', 'welcome_page_deal')->orderBy('id', 'desc')->take(4)->get();

        return view('welcome', compact('welcome_category', 'welcome_store', 'welcome_deal'));
    }

    public function track_featured_store_ajaxcall(Request $request)
    {
        $features = $this->feature::with('feature_offers')->where('is_active', 1)->where('location', $request->location)->get();

        return response()->json([
            'features' => json_encode($features),

        ]);

    }

    public function referrals()
    {

        $referral = $this->referrals::where('user_id', Auth::user()->id)->pluck('referral_id');

        $users = $this->user::whereIn('id', $referral)->get();

        return view('adminpanel.user.referrals', compact('users'));

    }
}
