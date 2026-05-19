<x-mail::message>
@if($isAdmin)
# New Order Notification
An order has been placed for **{{ $order->customer_name }}**.

**Order Details:**
* Order Number: #{{ $order->order_number }}
* Total Amount: ₹{{ number_format($order->total_amount, 2) }}
* Payment Method: {{ $order->payment_method }}
* Contact: {{ $order->customer_email }} | {{ $order->customer_phone }}

<x-mail::button :url="config('app.url') . '/admin/orders/' . $order->id">
Review Order in Admin Dashboard
</x-mail::button>
@else
# Order Booking Confirmed!
Hello {{ $order->customer_name }},

Thank you for choosing **A One Hospicare**. Your order for specialized medical equipment has been received and is currently being processed.

**Summary of your order:**
* Order Number: #{{ $order->order_number }}
* Total Amount: ₹{{ number_format($order->total_amount, 2) }}
* Delivery Address: {{ $order->hospital_address }}, {{ $order->city }}

<x-mail::button :url="config('app.url') . '/profile/orders/' . $order->order_number">
Track My Order
</x-mail::button>

We will notify you once your equipment is dispatched.
@endif

Best Regards,<br>
A One Hospicare
</x-mail::message>
