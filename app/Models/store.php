<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_name',
        'slug',
    ];


    public function offers()
    {
        return $this->hasMany(Offer::class,'store_id','id');
    }
    //
    public function networks()
    {
        return $this->belongsTo(Network::class,'network_id','id');
    }
    //
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function features()
    {
        return $this->hasOne(Feature::class,'featureable_item_id','id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_stores', 'user_id','store_id');
    }

    public function countries()
    {
        return $this->belongsTo(country::class,'category_id','id');
    }
}
