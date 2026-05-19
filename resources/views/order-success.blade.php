@extends('layouts.app')

@section('title', 'Order Success | A One Hospicare')

@section('content')
<div style="padding: 100px 5%; background: #f8fafc; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 60px; border-radius: 30px; box-shadow: var(--shadow-lg);">
        <div style="width: 100px; height: 100px; background: #f0fdf4; color: #059669; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px;">
            <i data-lucide="check-circle" size="60"></i>
        </div>
        
        <h1 style="color: var(--primary); font-size: 2.5rem; font-weight: 900; margin-bottom: 10px;">Order Confirmed!</h1>
        <p style="color: #64748b; font-size: 1.1rem; margin-bottom: 40px;">Thank you for your institutional order. We have received your procurement request and are initiating the manufacturing process.</p>
        
        <div style="background: #f8fafc; border-radius: 20px; padding: 30px; text-align: left; margin-bottom: 40px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid #e2e8f0; padding-bottom: 15px;">
                <div>
                    <span style="display: block; font-size: 12px; color: #94a3b8; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Order Number</span>
                    <span style="font-weight: 800; color: var(--primary); font-size: 1.2rem;">{{ $order->order_number }}</span>
                </div>
                <div style="text-align: right;">
                    <span style="display: block; font-size: 12px; color: #94a3b8; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Payment Method</span>
                    <span style="font-weight: 800; color: var(--primary);">{{ $order->payment_method }}</span>
                </div>
            </div>

            <div style="margin-bottom: 0;">
                <h4 style="color: var(--primary); margin-bottom: 15px;">Selected Clinical Equipment:</h4>
                @foreach($order->items as $item)
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 14px;">
                    <span style="color: #64748b;">{{ $item->product_name }} x {{ $item->quantity }}</span>
                    <span style="font-weight: 700; color: var(--primary);">₹{{ number_format($item->total, 2) }}</span>
                </div>
                @endforeach
                <div style="border-top: 1px solid #e2e8f0; margin-top: 15px; padding-top: 15px; display: flex; justify-content: space-between;">
                    <span style="font-weight: 800; color: var(--primary);">Total Amount (Incl. GST)</span>
                    <span style="font-weight: 900; color: var(--primary); font-size: 1.3rem;">₹{{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>
        </div>

        <div style="display: flex; gap: 20px; justify-content: center;">
            <a href="/profile/orders" class="btn btn-primary" style="padding: 15px 40px; border-radius: 12px; text-decoration: none;">View My Orders</a>
            <a href="/products" class="btn btn-outline" style="padding: 15px 40px; border-radius: 12px; text-decoration: none; color: var(--primary);">Continue Shopping</a>
        </div>
    </div>
</div>
@endsection
