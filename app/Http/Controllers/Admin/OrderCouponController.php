<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderCoupon;
use Illuminate\Http\Request;

class OrderCouponController extends Controller
{
    public function index()
    {
        $orderCoupons = OrderCoupon::with(['order', 'coupon'])->latest()->paginate(20);
        return view('admin.order_coupons.index', compact('orderCoupons'));
    }

    public function show(OrderCoupon $orderCoupon)
    {
        return view('admin.order_coupons.show', compact('orderCoupon'));
    }

    public function destroy(OrderCoupon $orderCoupon)
    {
        $orderCoupon->update(['actif' => false]);
        return redirect()->route('admin.order_coupons.index')->with('success', 'Coupon de commande désactivé avec succès.');
    }
}
