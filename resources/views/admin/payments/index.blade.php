@extends('layouts.admin')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: var(--primary); font-weight: 800; margin: 0;">Institutional Payments</h2>
        <div style="background: white; padding: 10px 20px; border-radius: 12px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 10px;">
            <span style="font-size: 13px; color: #94a3b8; font-weight: 700;">TOTAL PAYMENTS: {{ $payments->count() }}</span>
        </div>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Order #</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td><strong style="color: var(--secondary);">{{ $payment->payment_id }}</strong></td>
                    <td>{{ $payment->order->order_number }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td><strong>₹{{ number_format($payment->amount, 2) }}</strong></td>
                    <td>
                        <span style="background: #ecfdf5; color: #059669; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 800; text-transform: uppercase;">
                            {{ $payment->status }}
                        </span>
                    </td>
                    <td>{{ $payment->created_at->format('d M, Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
