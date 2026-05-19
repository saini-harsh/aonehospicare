<x-mail::message>
@if($isAdmin)
# Payment Received
Payment has been successfully verified for order #{{ $order->order_number }}.

**Payment Details:**
* Transaction Amount: ₹{{ number_format($order->total_amount, 2) }}
* Customer: {{ $order->customer_name }}
* Date: {{ now()->format('d M, Y H:i') }}

<x-mail::button :url="config('app.url') . '/admin/orders/' . $order->id">
View Order Details
</x-mail::button>
@else
# Payment Successful!
Hello {{ $order->customer_name }},

We have successfully received your payment for order **#{{ $order->order_number }}**. Your order is now confirmed and scheduled for preparation.

**Payment Summary:**
* Amount Paid: ₹{{ number_format($order->total_amount, 2) }}
* Payment Status: Paid
* Order Status: Confirmed

<x-mail::button :url="config('app.url') . '/profile/orders/' . $order->order_number">
View Invoice
</x-mail::button>

Thank you for your business!
@endif

Best Regards,<br>
A One Hospicare
</x-mail::message>
