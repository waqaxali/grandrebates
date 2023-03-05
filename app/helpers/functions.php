<?php

if (!function_exists('phpslug')) {
    function phpslug($string)
    {
        $slug = preg_replace('/[-\s]+/', '-', strtolower(trim($string)));
        return $slug;
    }
}
if (!function_exists('p')) {
    function p($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('cashback')) {
    function cashback($total_cashback)
    {
        $cashback = (20 / 100) * $total_cashback;
        return $cashback;
    }
}
if (!function_exists('all_network_options')) {
    function all_network_options($selected_id = null)
    {
        $all_network = App\Models\Network::orderBy('id', 'desc')->where('is_active', config('constants.is_active'))->get();

        $options = '';
        // $options .='<option  value="">Select Network</option>';
        foreach ($all_network as $network) {
            $selected = '';
            if ($selected_id == $network->id) {
                $selected = 'selected="selected"';
            }

            $options .= ' <option ' . $selected . ' value="' . $network->id . '" >' . $network->name . '</option>';

        }

        return $options;
    }
}

if (!function_exists('all_store_options')) {
    function all_store_options($selected_id = null)
    {
        $all_store = App\Models\store::orderBy('id', 'desc')->where('status', config('constants.status.is_active'))->get();

        $options = '';
        $options .= '<option  value="empty">Select Store</option>';
        foreach ($all_store as $store) {
            $selected = '';
            if ($selected_id == $store->id) {
                $selected = 'selected="selected"';
            }

            $options .= ' <option ' . $selected . ' value="' . $store->id . '" >' . $store->store_name . '</option>';

        }

        return $options;
    }
}
if (!function_exists('all_category_options')) {
    function all_category_options($selected_id = null)
    {
        $categories=App\Models\category::where('category_type','store')->orderBy('id', 'desc')->get();
        $options='';
        // $options .= '<option  value="empty">Select category</option>';

        foreach($categories as $category){
            $selected='';
            if($selected_id==$category->id){
                $selected='selected';
            }

            $options.='<option '.$selected.' value="'.$category->id.'">'.$category->name.'</option>';

        }
return $options;
    }
}
if (!function_exists('random_time')) {
    function random_time()
    {
        $random_time = rand(50, 200);
        return $random_time;
    }
}
if (!function_exists('random_days')) {
    function random_days()
    {
        $random_days = rand(1, 7);
        return $random_days;
    }
}

if (!function_exists('get_date')) {
    function get_date()
    {
        $mytime = Carbon\Carbon::now();
       // $mytime->toDateString();
        return $mytime;
    }
}

if (!function_exists('cashback_calculate')) {
    function cashback_calculate($store, $premium=false)
    {

        $cashback = 0;

        if ($store->network_type == config('constants.network_type.network') && $store->cashback_commission == config('constants.stores.commission') && $store->network_flat_switch == config('constants.stores.network_flat_switch_active')) {
            $cashback = $store->network_flat_rate;
        } elseif ($store->network_type == config('constants.network_type.network') && $store->cashback_commission == config('constants.stores.commission') && $store->network_flat_switch == config('constants.stores.network_flat_switch_dactive')) {
            $cashback = cashback($store->network_cashback);
        } elseif ($store->network_type == config('constants.network_type.skimlinks') && $store->cashback_commission == config('constants.stores.commission') && $store->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_active')) {
            $cashback = $store->skimlinks_min;
        } elseif ($store->network_type == config('constants.network_type.skimlinks') && $store->cashback_commission == config('constants.stores.commission') && $store->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_dactive')) {
            $cashback = cashback($store->skimlinks_min);
        }
        if($premium)
        return $cashback*2;
        return $cashback;

    }
}

if (!function_exists('count_offers')) {
    function count_offers($id)
    {

        $offers = App\Models\offer::where('store_id', $id)->where('end_date', '>=', get_date()->toDateString())->get();
        $count = count($offers);
        return $count;
    }
}
if (!function_exists('logo_resize')) {
    function logo_resize($name)
    {
        $image=$name;

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $img = Image::make($image->path());
       $img->resize(400, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);


        return $input['imagename'];
    }
}
if (!function_exists('save_stores')) {
    function save_stores()
    {
        $save_stores=App\Models\users_store::where('user_id',Auth::user()->id)->pluck('store_id')->toArray();
        return $save_stores;
    }
}


if (!function_exists('get_subcategory')) {
    function get_subcategory($id)
    {

        $subcategory_id= App\Models\storesubcategory::where('store_id',$id)->pluck('subcategory_id')->toArray();
        $store_id= App\Models\storesubcategory::whereIn('subcategory_id',$subcategory_id)->pluck('store_id')->toArray();

            $stores=App\Models\store::whereIn('id',$store_id)->where('status',config('constants.status.is_active'))->get();
        return $stores;
    }
}


