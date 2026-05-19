<x-mail::message>
@if($isAdmin)
# Payment Failed Notification
A payment attempt has failed for order **#{{ $order->order_number }}**.

**Details:**
* Customer: {{ $order->customer_name }}
* Failed Amount: ₹{{ number_format($order->total_amount, 2) }}
@if($errorMessage)
* Error: {{ $errorMessage }}
@endif

<x-mail::button :url="config('app.url') . '/admin/orders/' . $order->id">
View Order Details
</x-mail::button>
@else
# Payment Unsuccessful
Hello {{ $order->customer_name }},

We were unable to process your payment for order **#{{ $order->order_number }}**. Don't worry, your items are still reserved in our system for a limited time.

**Possible reasons for failure:**
* Transaction cancelled by user
* Insufficient funds or card limits
* Incorrect payment details
* Bank server issues

<x-mail::button :url="config('app.url') . '/checkout'">
Retry Payment
</x-mail::button>

If you continue to face issues, please reply to this email or contact our support team.

Best Regards,<br>
A One Hospicare
@endif
</x-mail::message>
