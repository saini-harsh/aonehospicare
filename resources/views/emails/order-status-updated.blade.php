<x-mail::message>
# Order Status Updated
Hello {{ $order->customer_name }},

Your order **#{{ $order->order_number }}** has a new status update.

**New Status:** {{ strtoupper($order->order_status) }}

@if($order->awb_code)
**Tracking Information:**
Your order has been dispatched! You can track your shipment using the AWB code below:
* **AWB Code:** `{{ $order->awb_code }}`
@endif

<x-mail::button :url="config('app.url') . '/profile/orders/' . $order->order_number">
View Order Progress
</x-mail::button>

If you have any questions regarding this update, please contact our support team.

Best Regards,<br>
A One Hospicare
</x-mail::message>
