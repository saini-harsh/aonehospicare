@extends('layouts.admin')

@section('admin_content')
    <div class="stats-grid">
        <div class="stat-item">
            <div class="stat-icon" style="background: rgba(0, 77, 64, 0.1); color: var(--primary);">
                <i data-lucide="shopping-bag" size="28"></i>
            </div>
            <div class="stat-info">
                <h5>Total Orders</h5>
                <h2>{{ $orderCount }}</h2>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon" style="background: rgba(45, 212, 191, 0.1); color: var(--secondary);">
                <i data-lucide="credit-card" size="28"></i>
            </div>
            <div class="stat-info">
                <h5>Total Payments</h5>
                <h2>{{ $paymentCount }}</h2>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                <i data-lucide="users" size="28"></i>
            </div>
            <div class="stat-info">
                <h5>Registered Partners</h5>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
                <i data-lucide="list-check" size="28"></i>
            </div>
            <div class="stat-info">
                <h5>Total Inquiries</h5>
                <h2>{{ $inquiryCount }}</h2>
            </div>
        </div>
    </div>

    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="color: var(--primary); font-weight: 800;">Recent Procurement Orders</h3>
            <a href="{{ route('admin.orders') }}" class="btn btn-outline" style="padding: 10px 20px; font-size: 13px; text-decoration: none;">View All Orders</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                <tr>
                    <td><strong>{{ $order->order_number }}</strong></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <span style="padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase;
                            {{ $order->order_status == 'Delivered' ? 'background: #ecfdf5; color: #059669;' : 'background: #fffbeb; color: #d97706;' }}">
                            {{ $order->order_status }}
                        </span>
                    </td>
                    <td>
                        <span style="font-size: 11px; font-weight: 800; color: {{ $order->payment_status == 'Paid' ? '#059669' : '#dc2626' }}">
                            {{ strtoupper($order->payment_status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" style="color: var(--primary);"><i data-lucide="eye" size="18"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 30px;">No recent orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
