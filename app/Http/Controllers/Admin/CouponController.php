<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->paginate(20);
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:coupons',
            'discount' => 'required|numeric|min:0|max:100',
            'expiration_date' => 'required|date|after:today',
            'usage_limit' => 'required|integer|min:1',
        ]);

        Coupon::create($validatedData);

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon créé avec succès.');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.form', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'discount' => 'required|numeric|min:0|max:100',
            'expiration_date' => 'required|date|after:today',
            'usage_limit' => 'required|integer|min:1',
        ]);

        $coupon->update($validatedData);

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon mis à jour avec succès.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->update(['actif' => false]);
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon désactivé avec succès.');
    }
}
