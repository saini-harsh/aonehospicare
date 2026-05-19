@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="/admin/coupons" style="color: var(--primary); text-decoration: none; font-size: 14px; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <i data-lucide="arrow-left" size="14"></i> BACK TO COUPONS
        </a>
        <h2 style="color: var(--primary); font-weight: 800;">Edit Coupon</h2>
        <p style="color: #64748b; font-size: 14px;">Update the details for "{{ $coupon->name }}".</p>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        <form action="/admin/coupons/{{ $coupon->id }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                <div class="form-group" style="grid-column: span 2;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Coupon Name</label>
                    <input type="text" name="name" value="{{ $coupon->name }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Coupon Code</label>
                    <input type="text" name="code" value="{{ $coupon->code }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Discount Amount (₹)</label>
                    <input type="number" name="value" value="{{ $coupon->value }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Expiry Date</label>
                    <input type="date" name="expiry_date" value="{{ $coupon->expiry_date }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Usage Limit</label>
                    <input type="number" name="limit" value="{{ $coupon->limit }}" required style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px;">
                </div>

                <div class="form-group">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Status</label>
                    <select name="status" style="width: 100%; padding: 15px 20px; border: 2px solid #eef2f6; border-radius: 12px; font-size: 15px; background: white;">
                        <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div style="grid-column: span 2; padding-top: 20px; border-top: 1px solid #f1f5f9; display: flex; gap: 15px;">
                    <button type="submit" class="btn btn-primary" style="padding: 15px 40px; border-radius: 12px; font-weight: 800;">UPDATE COUPON</button>
                    <a href="/admin/coupons" class="btn btn-outline" style="padding: 15px 40px; border-radius: 12px; font-weight: 800; border-color: #cbd5e0; color: #64748b; text-decoration: none; display: inline-flex; align-items: center;">CANCEL</a>
                </div>
            </div>
        </form>
    </div>
@endsection
