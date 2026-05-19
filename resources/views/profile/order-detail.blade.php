@extends('layouts.app')

@section('title', 'Order Details | A One Hospicare')

@section('content')
<div style="padding: 100px 5%; background: #f8fafc;">
    <div style="max-width: 1000px; margin: 0 auto;">
        <div style="margin-bottom: 30px; display: flex; justify-content: space-between; align-items: flex-end;">
            <div>
                <a href="/profile/orders" style="color: var(--primary); text-decoration: none; font-weight: 700; font-size: 14px; display: inline-flex; align-items: center; gap: 5px; margin-bottom: 15px;">
                    <i data-lucide="arrow-left" size="14"></i> Back to History
                </a>
                <h1 style="color: var(--primary); font-weight: 900; margin: 0;">Order Details: {{ $order->order_number }}</h1>
            </div>
            <div style="text-align: right;">
                <button onclick="window.print()" class="btn btn-outline" style="padding: 10px 20px; border-radius: 10px;">
                    <i data-lucide="printer" size="16" style="vertical-align: middle; margin-right: 5px;"></i> Download Invoice
                </button>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            <!-- Left: Order Items & Shipping -->
            <div style="display: flex; flex-direction: column; gap: 30px;">
                <!-- Shipping Info -->
                <div style="background: white; border-radius: 25px; padding: 30px; box-shadow: var(--shadow-sm);">
                    <h3 style="color: var(--primary); margin-bottom: 25px; border-bottom: 1px solid #f8fafc; padding-bottom: 15px; font-weight: 800;">
                        <i data-lucide="truck" size="20" style="vertical-align: middle; margin-right: 10px;"></i> Institutional Logistics
                    </h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                        <div>
                            <span style="display: block; font-size: 12px; color: #94a3b8; font-weight: 700; text-transform: uppercase; margin-bottom: 10px;">Hospital / Delivery Address</span>
                            <div style="color: #64748b; font-size: 14px; line-height: 1.6;">
                                <strong>{{ $order->customer_name }}</strong><br>
                                {{ $order->hospital_address }}<br>
                                {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}<br>
                                Phone: {{ $order->customer_phone }}<br>
                                Email: {{ $order->customer_email }}
                            </div>
                        </div>
                        <div>
                            <span style="display: block; font-size: 12px; color: #94a3b8; font-weight: 700; text-transform: uppercase; margin-bottom: 10px;">Order Status</span>
                            <div style="margin-bottom: 20px;">
                                <span style="display: inline-block; padding: 8px 20px; border-radius: 50px; font-weight: 800; font-size: 12px; text-transform: uppercase; background: #f0fdf4; color: #166534;">
                                    {{ $order->order_status }}
                                </span>
                            </div>
                            <span style="display: block; font-size: 12px; color: #94a3b8; font-weight: 700; text-transform: uppercase; margin-bottom: 10px;">Payment Information</span>
                            <div style="color: #64748b; font-size: 14px;">
                                Method: {{ $order->payment_method }}<br>
                                Status: <span style="color: {{ $order->payment_status == 'Paid' ? '#059669' : '#dc2626' }}; font-weight: 700;">{{ strtoupper($order->payment_status) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div style="background: white; border-radius: 25px; padding: 30px; box-shadow: var(--shadow-sm);">
                    <h3 style="color: var(--primary); margin-bottom: 25px; border-bottom: 1px solid #f8fafc; padding-bottom: 15px; font-weight: 800;">
                        <i data-lucide="package" size="20" style="vertical-align: middle; margin-right: 10px;"></i> Inventory Manifest
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        @foreach($order->items as $item)
                        <div style="display: flex; gap: 20px; align-items: center; border-bottom: 1px solid #f8fafc; padding-bottom: 20px;">
                            <div style="width: 80px; height: 80px; background: #f8fafc; border-radius: 12px; padding: 10px; flex-shrink: 0;">
                                <img src="{{ asset('storage/' . $item->product_image) }}" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                            <div style="flex: 1;">
                                <h4 style="color: var(--primary); margin: 0 0 5px; font-weight: 700;">{{ $item->product_name }}</h4>
                                <span style="font-size: 13px; color: #94a3b8;">Unit Price: ₹{{ number_format($item->price, 2) }}</span>
                            </div>
                            <div style="text-align: right;">
                                <span style="display: block; color: #64748b; font-weight: 700;">Qty: {{ $item->quantity }}</span>
                                <span style="display: block; color: var(--primary); font-weight: 900; font-size: 1.1rem;">₹{{ number_format($item->total, 2) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right: Order Summary -->
            <aside>
                <div style="background: white; border-radius: 25px; padding: 30px; box-shadow: var(--shadow-sm); position: sticky; top: 120px;">
                    <h3 style="color: var(--primary); margin-bottom: 25px; font-weight: 800;">Procurement Summary</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 25px;">
                        <div style="display: flex; justify-content: space-between; font-size: 14px;">
                            <span style="color: #64748b; font-weight: 600;">Subtotal</span>
                            <span style="color: var(--primary); font-weight: 700;">₹{{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 14px;">
                            <span style="color: #64748b; font-weight: 600;">GST (12%)</span>
                            <span style="color: var(--primary); font-weight: 700;">₹{{ number_format($order->gst_amount, 2) }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 14px;">
                            <span style="color: #64748b; font-weight: 600;">Shipping</span>
                            <span style="color: #059669; font-weight: 700;">Calculated</span>
                        </div>
                        <div style="border-top: 1px dashed #e2e8f0; margin-top: 10px; padding-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-weight: 800; color: var(--primary); font-size: 1.1rem;">Total Amount</span>
                            <span style="font-weight: 900; color: var(--primary); font-size: 1.6rem;">₹{{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>

                    <div style="background: #f0fdf4; border-radius: 15px; padding: 15px; border: 1px solid #dcfce7; text-align: center;">
                        <p style="margin: 0; font-size: 12px; color: #166534; font-weight: 600;">
                            <i data-lucide="shield-check" size="14" style="vertical-align: middle; margin-right: 5px;"></i> This is a digitally verified institutional invoice.
                        </p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
