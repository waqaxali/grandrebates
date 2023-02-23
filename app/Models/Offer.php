<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;



    public function stores()
    {
        return $this->belongsTo(Store::class,'store_id','id')->where('is_active',1);
    }

    public function features()
    {
        return $this->belongsTo(Feature::class,'store_id','id')->where('is_active',1);
    }
}
