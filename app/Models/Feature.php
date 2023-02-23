<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['is_active'];
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class,'featureable_item_id','id');
    }

    public function stores()
    {
        return $this->belongsTo(store::class,'featureable_item_id','id');
    }
    public function offers()
    {
        return $this->hasMany(Offer::class,'store_id','id');
    }

    public function feature_offers()
    {
        return $this->hasMany(Offer::class,'store_id','featureable_item_id');
    }
///for landingpage
    // public function feature_stores()
    // {
    //     return $this->belongsTo(store::class,'featureable_item_id','id')->where('status',config('constants.status.is_active'));
    // }
}
