@extends('layouts.admin')

@section('admin_content')
    <div style="margin-bottom: 30px;">
        <a href="{{ route('admin.orders') }}" style="color: var(--primary); text-decoration: none; font-weight: 700; font-size: 14px; display: inline-flex; align-items: center; gap: 5px; margin-bottom: 15px;">
            <i data-lucide="arrow-left" size="14"></i> Back to Orders
        </a>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="color: var(--primary); font-weight: 800; margin: 0;">Order Details: {{ $order->order_number }}</h2>
            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" style="display: flex; gap: 15px; align-items: center;">
                @csrf
                <div style="display: flex; align-items: center; gap: 10px; background: white; padding: 5px 15px; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <i data-lucide="truck" size="16" style="color: #94a3b8;"></i>
                    <input type="text" name="awb_code" value="{{ $order->awb_code }}" placeholder="AWB Tracking Code" style="border: none; outline: none; font-weight: 600; font-size: 14px; width: 180px;">
                </div>
                <select name="status" style="padding: 10px 15px; border-radius: 10px; border: 1px solid #e2e8f0; font-weight: 600; outline: none;">
                    <option value="New" {{ $order->order_status == 'New' ? 'selected' : '' }}>New</option>
                    <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Shipped" {{ $order->order_status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px; border-radius: 10px;">Update Manifest</button>
            </form>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <!-- Customer Info -->
            <div class="admin-card">
                <h4 style="color: var(--primary); margin-bottom: 20px; border-bottom: 1px solid #f8fafc; padding-bottom: 15px;">Customer & Logistics</h4>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <span style="display: block; font-size: 11px; color: #94a3b8; font-weight: 700; text-transform: uppercase;">Shipping Address</span>
                        <div style="font-size: 14px; color: #64748b; margin-top: 10px; line-height: 1.6;">
                            <strong>{{ $order->customer_name }}</strong><br>
                            {{ $order->hospital_address }}<br>
                            {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}<br>
                            Phone: {{ $order->customer_phone }}<br>
                            Email: {{ $order->customer_email }}
                        </div>
                    </div>
                    <div>
                        <span style="display: block; font-size: 11px; color: #94a3b8; font-weight: 700; text-transform: uppercase;">Payment Details</span>
                        <div style="font-size: 14px; color: #64748b; margin-top: 10px;">
                            Method: {{ $order->payment_method }}<br>
                            Status: <span style="font-weight: 800; color: {{ $order->payment_status == 'Paid' ? '#059669' : '#dc2626' }}">{{ strtoupper($order->payment_status) }}</span><br>
                            @if($order->payment)
                            Transaction ID: {{ $order->payment->payment_id }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="admin-card">
                <h4 style="color: var(--primary); margin-bottom: 20px; border-bottom: 1px solid #f8fafc; padding-bottom: 15px;">Order Manifest</h4>
                <table style="width: 100%;">
                    <thead>
                        <tr style="text-align: left; font-size: 12px; color: #94a3b8;">
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr style="border-bottom: 1px solid #f8fafc;">
                            <td style="padding: 15px 0;">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <div style="width: 50px; height: 50px; background: #f8fafc; border-radius: 8px; padding: 5px;">
                                        <img src="{{ asset('storage/' . $item->product_image) }}" style="width: 100%; height: 100%; object-fit: contain;">
                                    </div>
                                    <span style="font-weight: 700; color: var(--primary);">{{ $item->product_name }}</span>
                                </div>
                            </td>
                            <td>₹{{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td><strong>₹{{ number_format($item->total, 2) }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <div class="admin-card" style="position: sticky; top: 100px;">
                <h4 style="color: var(--primary); margin-bottom: 20px; border-bottom: 1px solid #f8fafc; padding-bottom: 15px;">Order Summary</h4>
                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <div style="display: flex; justify-content: space-between; font-size: 14px;">
                        <span style="color: #64748b;">Subtotal</span>
                        <span style="font-weight: 700;">₹{{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 14px;">
                        <span style="color: #64748b;">GST (12%)</span>
                        <span style="font-weight: 700;">₹{{ number_format($order->gst_amount, 2) }}</span>
                    </div>
                    @if($order->coupon_code)
                    <div style="display: flex; justify-content: space-between; font-size: 14px;">
                        <span style="color: #64748b;">Discount ({{ $order->coupon_code }})</span>
                        <span style="font-weight: 700; color: #ef4444;">-₹{{ number_format($order->discount_amount, 2) }}</span>
                    </div>
                    @endif
                    <div style="display: flex; justify-content: space-between; border-top: 1px dashed #e2e8f0; padding-top: 15px; margin-top: 5px;">
                        <span style="font-weight: 800; color: var(--primary); font-size: 1.1rem;">Grand Total</span>
                        <span style="font-weight: 900; color: var(--primary); font-size: 1.5rem;">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
