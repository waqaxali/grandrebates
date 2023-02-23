<?php

if(!function_exists('phpslug')){
    function phpslug($string)
    {
        $slug = preg_replace('/[-\s]+/', '-', strtolower(trim($string)));
        return $slug;
    }
}
if(!function_exists('p')){
    function p($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if(!function_exists('cashback')){
    function cashback($total_cashback){
        $cashback = (20 / 100) * $total_cashback;
        return $cashback;
    }
}
if(!function_exists('all_network_options')){
    function all_network_options($selected_id=NULL){
        $all_network = App\Models\Network::orderBy('id', 'desc')->where('is_active', config('constants.is_active'))->get();

        $options='';
        $options .='<option  value="">Network : All</option>';
        foreach ($all_network as $network){
            $selected='';
           if($selected_id==$network->id)
           $selected='selected="selected"';
            $options .=' <option '.$selected.' value="'.$network->id.'" >'.$network->name.'</option>';

        }

        return $options ;
    }
}

if(!function_exists('all_store_options')){
    function all_store_options($selected_id=NULL){
        $all_store = App\Models\store::orderBy('id', 'desc')->where('is_active', config('constants.is_active'))->where('status',config('constants.status.is_active'))->get();

        $options='';
        $options .='<option  value="empty">Store : All</option>';
        foreach ($all_store as $store){
            $selected='';
           if($selected_id==$store->id)
           $selected='selected="selected"';
            $options .=' <option '.$selected.' value="'.$store->id.'" >'.$store->store_name.'</option>';

        }

        return $options ;
    }
}


if(!function_exists('random_time')){
    function random_time(){
       $random_time= rand(50,200);
        return $random_time;
    }
}
if(!function_exists('random_days')){
    function random_days(){
       $random_days= rand(1,7);
        return $random_days;
    }
}



if(!function_exists('date')){
    function date(){
        $mytime = Carbon\Carbon::now();
    //    $mytime->toDateTimeString();
        return  $$mytime->toDateTimeString();
    }
}


?>
