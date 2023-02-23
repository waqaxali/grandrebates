<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function stores()
    {
        return $this->hasMany(Store::class, 'category_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
    public function features()
    {
        return $this->hasMany(Feature::class, 'featureable_item_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'store_id', 'id');
    }

    public function deployments()
    {
        return $this->hasManyThrough(
            Offer::class,
            store::class,
            'category_id', // Foreign key on the environments table...
            'store_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }


}
