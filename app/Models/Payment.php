<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_date',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id',
        'code',
        'actif'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
