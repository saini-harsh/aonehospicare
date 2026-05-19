@extends('layouts.app')

@section('title', 'My Orders | A One Hospicare')

@section('content')
<div style="padding: 100px 5%; background: #f8fafc;">
    <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 300px 1fr; gap: 40px;">
        
        <!-- Profile Sidebar -->
        <aside>
            <div style="background: white; border-radius: 25px; padding: 30px; box-shadow: var(--shadow-sm); position: sticky; top: 120px;">
                <div style="text-align: center; margin-bottom: 30px;">
                    <div style="width: 80px; height: 80px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 800; margin: 0 auto 15px;">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <h3 style="color: var(--primary); font-weight: 800; margin: 0;">{{ auth()->user()->name }}</h3>
                    <p style="color: #64748b; font-size: 13px;">Institutional Partner</p>
                </div>
                
                <nav style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="/profile" style="display: flex; align-items: center; gap: 12px; padding: 15px 20px; text-decoration: none; color: #64748b; border-radius: 12px; font-weight: 600; transition: 0.3s;">
                        <i data-lucide="user" size="18"></i> Profile Settings
                    </a>
                    <a href="/profile/orders" style="display: flex; align-items: center; gap: 12px; padding: 15px 20px; text-decoration: none; color: var(--primary); background: #f0fdf4; border-radius: 12px; font-weight: 800;">
                        <i data-lucide="shopping-bag" size="18"></i> Order History
                    </a>
                    <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" style="display: flex; align-items: center; gap: 12px; padding: 15px 20px; text-decoration: none; color: #ef4444; border-radius: 12px; font-weight: 600;">
                        <i data-lucide="log-out" size="18"></i> Logout
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Orders List -->
        <main>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h1 style="color: var(--primary); font-weight: 900; margin: 0;">Procurement History</h1>
                <span style="background: #f1f5f9; color: var(--primary); padding: 5px 15px; border-radius: 20px; font-weight: 700; font-size: 14px;">{{ $orders->count() }} Orders Found</span>
            </div>

            @forelse($orders as $order)
            <div style="background: white; border-radius: 25px; padding: 30px; box-shadow: var(--shadow-sm); margin-bottom: 25px; border: 1px solid #f1f5f9;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; border-bottom: 1px solid #f8fafc; padding-bottom: 20px;">
                    <div>
                        <span style="display: block; font-size: 12px; color: #94a3b8; font-weight: 700; text-transform: uppercase;">Order #{{ $order->order_number }}</span>
                        <span style="font-weight: 600; font-size: 14px; color: #64748b;">Placed on {{ $order->created_at->format('d M, Y') }}</span>
                    </div>
                    <div style="text-align: right;">
                        <span style="display: inline-block; padding: 6px 15px; border-radius: 50px; font-size: 12px; font-weight: 800; text-transform: uppercase; 
                            {{ $order->order_status == 'Delivered' ? 'background: #f0fdf4; color: #166534;' : 'background: #fffbeb; color: #92400e;' }}">
                            {{ $order->order_status }}
                        </span>
                        <span style="display: block; font-size: 12px; color: #94a3b8; margin-top: 5px; font-weight: 700;">PAYMENT: {{ strtoupper($order->payment_status) }}</span>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr auto; gap: 40px; align-items: center;">
                    <div style="display: flex; gap: 10px; overflow-x: auto;">
                        @foreach($order->items as $item)
                        <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 10px; border: 1px solid #eef2f6; padding: 8px; flex-shrink: 0;" title="{{ $item->product_name }}">
                            <img src="{{ asset('storage/' . $item->product_image) }}" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        @endforeach
                        @if($order->items->count() > 4)
                        <div style="width: 60px; height: 60px; background: #f1f5f9; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: var(--primary); font-size: 14px;">
                            +{{ $order->items->count() - 4 }}
                        </div>
                        @endif
                    </div>
                    <div style="text-align: right;">
                        <span style="display: block; font-size: 13px; color: #94a3b8; margin-bottom: 5px;">Institutional Total</span>
                        <span style="display: block; font-size: 1.4rem; color: var(--primary); font-weight: 900;">₹{{ number_format($order->total_amount, 2) }}</span>
                        <a href="/profile/orders/{{ $order->order_number }}" style="display: inline-block; margin-top: 15px; color: var(--primary); font-weight: 700; font-size: 14px; text-decoration: none;">
                            View Details <i data-lucide="chevron-right" size="14" style="vertical-align: middle;"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 100px 0; background: white; border-radius: 25px; box-shadow: var(--shadow-sm);">
                <i data-lucide="package-search" size="64" style="color: #cbd5e0; margin-bottom: 20px;"></i>
                <h3 style="color: var(--primary);">No Orders Yet</h3>
                <p style="color: #64748b;">Your institutional procurement history will appear here.</p>
                <a href="/products" class="btn btn-primary" style="margin-top: 30px; display: inline-block; text-decoration: none;">Start Procurement</a>
            </div>
            @endforelse
        </main>
    </div>
</div>
@endsection
