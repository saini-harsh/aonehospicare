@extends('layouts.admin')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="color: var(--primary); font-weight: 800;">Promo Codes</h2>
            <p style="color: #64748b; font-size: 14px;">Manage your discount coupons and promo codes.</p>
        </div>
        <a href="/admin/coupons/create" class="btn btn-primary" style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="plus-circle" size="18"></i> Add New Coupon
        </a>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Expiry Date</th>
                    <th>Limit</th>
                    <th>Used</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->name }}</td>
                    <td><code style="background: #f1f5f9; padding: 4px 8px; border-radius: 5px; font-size: 12px; color: #475569;">{{ $coupon->code }}</code></td>
                    <td>₹{{ number_format($coupon->value, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($coupon->expiry_date)->format('d M, Y') }}</td>
                    <td>{{ $coupon->limit }}</td>
                    <td>{{ $coupon->used }}</td>
                    <td>
                        @if($coupon->status)
                            <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Active</span>
                        @else
                            <span style="background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div style="display: flex; gap: 15px;">
                            <a href="/admin/coupons/{{ $coupon->id }}/edit" style="color: var(--primary);"><i data-lucide="edit-3" size="18"></i></a>
                            <a href="/admin/coupons/{{ $coupon->id }}/delete" style="color: #ef4444;" onclick="return confirm('Delete this coupon?')"><i data-lucide="trash-2" size="18"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($coupons->isEmpty())
                <tr>
                    <td colspan="8" style="text-align: center; padding: 50px; color: #94a3b8;">
                        <i data-lucide="ticket" size="40" style="margin-bottom: 20px;"></i>
                        <p>No coupons found. Create your first promo code to boost sales.</p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
