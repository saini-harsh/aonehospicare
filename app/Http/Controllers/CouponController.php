<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:coupons',
            'value' => 'required|numeric',
            'expiry_date' => 'required|date',
            'limit' => 'required|integer',
        ]);

        Coupon::create($request->all());

        return redirect('/admin/coupons')->with('success', 'Coupon created successfully');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:coupons,code,' . $id,
            'value' => 'required|numeric',
            'expiry_date' => 'required|date',
            'limit' => 'required|integer',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());

        return redirect('/admin/coupons')->with('success', 'Coupon updated successfully');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect('/admin/coupons')->with('success', 'Coupon deleted successfully');
    }

    // Checkout validation
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)
            ->where('status', 1)
            ->where('expiry_date', '>=', date('Y-m-d'))
            ->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon code']);
        }

        if ($coupon->used >= $coupon->limit) {
            return response()->json(['success' => false, 'message' => 'Coupon usage limit reached']);
        }

        // Store coupon in session
        session(['coupon' => [
            'code' => $coupon->code,
            'value' => $coupon->value,
        ]]);

        return response()->json([
            'success' => true,
            'message' => 'Coupon applied successfully',
            'discount' => $coupon->value,
            'code' => $coupon->code
        ]);
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
        return response()->json(['success' => true, 'message' => 'Coupon removed successfully']);
    }
}
