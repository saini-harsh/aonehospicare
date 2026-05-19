<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Coupon;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;
use App\Mail\PaymentConfirmedMail;
use App\Mail\PaymentFailedMail;

class OrderController extends Controller
{
    private $razorpayId;
    private $razorpayKey;

    public function __construct()
    {
        $this->razorpayId = config('services.razorpay.key');
        $this->razorpayKey = config('services.razorpay.secret');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'payment_method' => 'required'
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Cart is empty']);
        }

        $subtotal = 0;
        $gst = 0;
        foreach ($cart as $item) {
            $itemBaseTotal = $item['base_price'] * $item['quantity'];
            $subtotal += $itemBaseTotal;
            $gst += ($item['price'] * $item['quantity']) - $itemBaseTotal;
        }
        $total = $subtotal + $gst;

        $couponCode = null;
        $discountAmount = 0;
        if (session()->has('coupon')) {
            $sessionCoupon = session('coupon');
            $coupon = Coupon::where('code', $sessionCoupon['code'])
                ->where('status', 1)
                ->where('expiry_date', '>=', date('Y-m-d'))
                ->first();

            if ($coupon && $coupon->used < $coupon->limit) {
                $couponCode = $coupon->code;
                $discountAmount = $coupon->value;
                $total -= $discountAmount;
                if ($total < 0) $total = 0;
            }
        }

        $orderNumber = 'ORD-' . strtoupper(Str::random(10));

        // Validate Gateway Credentials
        $gateways = [
            'RAZORPAY' => ['services.razorpay.key', 'services.razorpay.secret'],
            'CCAVENUE' => ['services.ccavenue.merchant_id', 'services.ccavenue.working_key'],
            'PAYUMONEY' => ['services.payumoney.merchant_key', 'services.payumoney.merchant_salt'],
            'PHONEPE' => ['services.phonepe.merchant_id', 'services.phonepe.salt_key']
        ];

        if (array_key_exists($request->payment_method, $gateways)) {
            foreach ($gateways[$request->payment_method] as $configKey) {
                $val = config($configKey);
                if (!$val || str_contains($val, 'your_')) {
                    return response()->json([
                        'success' => false, 
                        'message' => 'Payment Gateway (' . $request->payment_method . ') is not configured correctly. Please check your .env credentials.'
                    ]);
                }
            }
        }

        $orderNumber = 'ORD-' . strtoupper(Str::random(10));

        // For all online gateways, store data in session first
        if (array_key_exists($request->payment_method, $gateways)) {
            session(['pending_order' => [
                'request' => $request->all(),
                'cart' => $cart,
                'subtotal' => $subtotal,
                'gst' => $gst,
                'total' => $total,
                'coupon_code' => $couponCode,
                'discount_amount' => $discountAmount,
                'order_number' => $orderNumber
            ]]);

            if ($request->payment_method == 'RAZORPAY') {
                try {
                    $api = new Api($this->razorpayId, $this->razorpayKey);
                    $razorOrder = $api->order->create([
                        'receipt' => $orderNumber,
                        'amount' => $total * 100,
                        'currency' => 'INR'
                    ]);

                    return response()->json([
                        'success' => true,
                        'payment_required' => true,
                        'razorpay_order_id' => $razorOrder['id'],
                        'amount' => $total * 100,
                        'order_number' => $orderNumber,
                        'customer_name' => $request->name,
                        'customer_email' => $request->email,
                        'customer_phone' => $request->phone,
                        'razorpay_key' => $this->razorpayId
                    ]);
                } catch (\Exception $e) {
                    return response()->json(['success' => false, 'message' => 'Razorpay Error: ' . $e->getMessage()]);
                }
            }

            // For other gateways, this is where you would generate the redirect form/URL
            // Since actual integration requires specific merchant keys/secrets, we stop here if they are invalid
            return response()->json([
                'success' => false,
                'message' => 'Integration for ' . $request->payment_method . ' is initialized, but live redirection requires valid Merchant Credentials which are currently missing or incorrect in .env'
            ]);
        }

        // Only reach here for non-gateway methods (e.g. if you added COD back or something else)
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => $orderNumber,
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'hospital_address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'coupon_code' => $couponCode,
                'discount_amount' => $discountAmount,
                'subtotal' => $subtotal,
                'gst_amount' => $gst,
                'total_amount' => $total,
                'payment_method' => $request->payment_method,
                'payment_status' => 'Pending',
                'order_status' => 'New',
                'notes' => $request->notes
            ]);

            if ($couponCode) {
                Coupon::where('code', $couponCode)->increment('used');
            }

            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'product_name' => $item['name'],
                    'product_image' => $item['image'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'total' => $item['price'] * $item['quantity']
                ]);
            }

            // Create Payment Record (Initially Pending)
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $request->payment_method,
                'amount' => $order->total_amount,
                'status' => 'Pending',
                'currency' => 'INR'
            ]);

            // Only send Order Placed Emails for COD immediately
            try {
                $adminEmail = config('mail.from.address');
                Mail::to($order->customer_email)->send(new OrderPlacedMail($order, false));
                Mail::to($adminEmail)->send(new OrderPlacedMail($order, true));
            } catch (\Exception $e) {
                // Log or ignore mail errors
            }

            // COD Flow
            session()->forget('cart');
            session()->forget('coupon');
            DB::commit();
            return response()->json([
                'success' => true,
                'payment_required' => false,
                'redirect_url' => route('order.success', ['order' => $order->order_number])
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function handlePayment(Request $request)
    {
        $input = $request->all();
        $api = new Api($this->razorpayId, $this->razorpayKey);

        try {
            $attributes = [
                'razorpay_order_id' => $input['razorpay_order_id'],
                'razorpay_payment_id' => $input['razorpay_payment_id'],
                'razorpay_signature' => $input['razorpay_signature']
            ];
            $api->utility->verifyPaymentSignature($attributes);

            $pendingOrder = session('pending_order');
            if (!$pendingOrder) {
                return response()->json(['success' => false, 'message' => 'Order session expired. Please contact support.']);
            }

            $orderData = $pendingOrder['request'];

            DB::beginTransaction();
            try {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'order_number' => $pendingOrder['order_number'],
                    'customer_name' => $orderData['name'],
                    'customer_email' => $orderData['email'],
                    'customer_phone' => $orderData['phone'],
                    'hospital_address' => $orderData['address'],
                    'city' => $orderData['city'],
                    'state' => $orderData['state'],
                    'pincode' => $orderData['pincode'],
                    'coupon_code' => $pendingOrder['coupon_code'],
                    'discount_amount' => $pendingOrder['discount_amount'],
                    'subtotal' => $pendingOrder['subtotal'],
                    'gst_amount' => $pendingOrder['gst'],
                    'total_amount' => $pendingOrder['total'],
                    'payment_method' => 'RAZORPAY',
                    'payment_status' => 'Paid',
                    'order_status' => 'New',
                    'notes' => $orderData['notes'] ?? null
                ]);

                if ($pendingOrder['coupon_code']) {
                    Coupon::where('code', $pendingOrder['coupon_code'])->increment('used');
                }

                foreach ($pendingOrder['cart'] as $id => $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $id,
                        'product_name' => $item['name'],
                        'product_image' => $item['image'],
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                        'total' => $item['price'] * $item['quantity']
                    ]);
                }

                Payment::create([
                    'order_id' => $order->id,
                    'payment_id' => $input['razorpay_payment_id'],
                    'razorpay_order_id' => $input['razorpay_order_id'],
                    'payment_method' => 'Razorpay',
                    'amount' => $order->total_amount,
                    'status' => 'Success',
                    'raw_response' => $input
                ]);

                DB::commit();

                // Send Confirmation Emails
                try {
                    $adminEmail = config('mail.from.address');
                    Mail::to($order->customer_email)->send(new PaymentConfirmedMail($order, false));
                    Mail::to($adminEmail)->send(new PaymentConfirmedMail($order, true));
                } catch (\Exception $e) {
                }

                session()->forget(['cart', 'coupon', 'pending_order']);
                return response()->json(['success' => true, 'redirect_url' => route('order.success', ['order' => $order->order_number])]);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Order creation failed: ' . $e->getMessage()]);
            }

        } catch (\Exception $e) {
            // Payment Verification Failed - Trigger Failure Emails
            try {
                $orderNumber = $request->order_number ?? '';
                if ($orderNumber) {
                    $order = Order::where('order_number', $orderNumber)->first();
                    if ($order) {
                        $adminEmail = config('mail.from.address');
                        Mail::to($order->customer_email)->send(new PaymentFailedMail($order, false, $e->getMessage()));
                        Mail::to($adminEmail)->send(new PaymentFailedMail($order, true, $e->getMessage()));
                    }
                }
            } catch (\Exception $mailEx) {
            }

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function handlePaymentFailed(Request $request)
    {
        try {
            $order = Order::where('order_number', $request->order_number)->first();
            if ($order) {
                $order->update(['payment_status' => 'Failed']);

                $adminEmail = config('mail.from.address');
                // Notify Customer
                Mail::to($order->customer_email)->send(new PaymentFailedMail($order, false, $request->error ?? 'Transaction cancelled by user'));
                // Notify Admin
                Mail::to($adminEmail)->send(new PaymentFailedMail($order, true, $request->error ?? 'Transaction cancelled by user'));
            } else {
                // Order doesn't exist yet, which is expected for failed Razorpay attempts now.
                // We could still notify admin/user here if we have session data, but for now we'll just log or ignore.
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function success($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->with('items')->firstOrFail();
        return view('order-success', compact('order'));
    }

    public function userOrders()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('profile.orders', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->with('items')->firstOrFail();
        // Ensure user can only see their own order
        if ($order->user_id != auth()->id()) {
            abort(403);
        }
        return view('profile.order-detail', compact('order'));
    }
}
