<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class referral extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'referral_id',

    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'referrals', 'user_id', 'referral_id');
    }
}
