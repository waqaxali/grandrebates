<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['categor_id'];
     //relationship with category
     public function categories()
     {
         return $this->belongsTo(category::class, 'category_id', 'id');
     }
}
