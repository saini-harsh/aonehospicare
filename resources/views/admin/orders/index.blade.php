@extends('layouts.admin')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: var(--primary); font-weight: 800; margin: 0;">Institutional Orders</h2>
        <div style="display: flex; gap: 15px;">
            <div style="background: white; padding: 10px 20px; border-radius: 12px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 13px; color: #94a3b8; font-weight: 700;">TOTAL: {{ $orders->count() }}</span>
            </div>
        </div>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>AWB / Tracking</th>
                    <th>Order Status</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td><strong>{{ $order->order_number }}</strong></td>
                    <td>
                        <div style="font-weight: 700; color: var(--primary);">{{ $order->customer_name }}</div>
                        <div style="font-size: 12px; color: #94a3b8;">{{ $order->customer_email }}</div>
                    </td>
                    <td>{{ $order->customer_phone }}</td>
                    <td><strong>₹{{ number_format($order->total_amount, 2) }}</strong></td>
                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                    <td>
                        @if($order->awb_code)
                        <div style="display: flex; align-items: center; gap: 8px; color: var(--primary);">
                            <i data-lucide="truck" size="14"></i>
                            <span style="font-family: monospace; font-weight: 700;">{{ $order->awb_code }}</span>
                        </div>
                        @else
                        <span style="color: #94a3b8; font-size: 11px; font-weight: 700;">PENDING</span>
                        @endif
                    </td>
                    <td>
                        <span style="padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 800; text-transform: uppercase;
                            {{ $order->order_status == 'Delivered' ? 'background: #ecfdf5; color: #059669;' : 'background: #fffbeb; color: #d97706;' }}">
                            {{ $order->order_status }}
                        </span>
                    </td>
                    <td>
                        <span style="font-size: 11px; font-weight: 800; color: {{ $order->payment_status == 'Paid' ? '#059669' : '#dc2626' }}">
                            {{ strtoupper($order->payment_status) }}
                        </span>
                    </td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline" style="padding: 5px 10px; border-radius: 8px;">
                            <i data-lucide="eye" size="16"></i>
                        </a>
                        <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="padding: 5px 10px; border-radius: 8px; color: #dc2626; border-color: #fee2e2; background: #fef2f2;">
                                <i data-lucide="trash-2" size="16"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
