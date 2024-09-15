<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount',
        'expiration_date',
        'usage_limit',
        'actif'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_coupons')->withPivot('discount_amount');
    }
}
