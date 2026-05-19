@extends('layouts.app')

@section('title', 'Checkout | Secure Payment - A One Hospicare')
@section('meta_description', 'Complete your order securely at A One Hospicare. Enter your shipping and payment details to finalize your purchase of medical equipment.')

@push('styles')
    <style>
        .checkout-container {
            padding: 60px 8%;
            background: #f8fafc;
            min-height: 100vh;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 50px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .checkout-section {
            background: white;
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 30px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.02);
        }

        .step-indicator {
            display: flex;
            gap: 40px;
            margin-bottom: 50px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #94a3b8;
            font-weight: 700;
            font-size: 14px;
        }

        .step.active {
            color: var(--primary);
        }

        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .step.active .step-number {
            background: var(--primary);
            color: white;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px 20px;
            border: 1.5px solid #eef2f6;
            border-radius: 12px;
            font-size: 15px;
            transition: var(--transition);
            background: #fdfdfd;
        }

        .form-group input:focus {
            border-color: var(--primary);
            outline: none;
            background: white;
            box-shadow: 0 0 0 4px rgba(0, 77, 64, 0.05);
        }

        .payment-option {
            border: 2px solid #eef2f6;
            padding: 25px;
            border-radius: 20px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 15px;
        }

        .payment-option:hover {
            border-color: var(--secondary);
        }

        .payment-option.active {
            border-color: var(--primary);
            background: rgba(0, 77, 64, 0.02);
        }

        .payment-radio {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-option.active .payment-radio {
            border-color: var(--primary);
        }

        .payment-option.active .payment-radio::after {
            content: '';
            width: 10px;
            height: 10px;
            background: var(--primary);
            border-radius: 50%;
        }

        @media (max-width: 992px) {
            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .checkout-sidebar {
                order: -1;
            }

            /* Subtotal at top for mobile */
        }

        @media (max-width: 768px) {
            .checkout-container {
                padding: 40px 15px;
            }

            .checkout-section {
                padding: 25px;
                border-radius: 20px;
            }

            .step-indicator {
                gap: 15px;
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 30px;
            }

            .step-indicator>div[style*="border-bottom"] {
                display: none;
            }

            /* Hide dashed lines on mobile */
            .step {
                font-size: 13px;
            }

            .checkout-container h1 {
                font-size: 2rem;
                margin-bottom: 30px;
            }

            .payment-option {
                padding: 15px;
                gap: 12px;
            }

            .payment-option i {
                display: none;
            }

            /* Hide icons to save space */
            .btn-primary {
                height: 55px !important;
            }
        }

        /* Quantity Controls for Checkout */
        .checkout-qty-control {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border-radius: 8px;
            padding: 2px;
            width: fit-content;
        }

        .checkout-qty-btn {
            width: 24px;
            height: 24px;
            border: none;
            background: transparent;
            cursor: pointer;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .checkout-qty-btn:hover {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 4px;
        }

        .checkout-qty-val {
            width: 30px;
            text-align: center;
            font-weight: 700;
            font-size: 13px;
            color: var(--primary);
        }
    </style>
@endpush

@section('content')
    <div class="checkout-container">
        <div style="max-width: 1400px; margin: 0 auto;">
            <h1 style="color: var(--primary); font-weight: 900; font-size: 2.8rem; margin-bottom: 40px;">Complete Your Order
            </h1>

            <div class="step-indicator">
                <div class="step active">
                    <div class="step-number">1</div>
                    <span>Shipping & Institution</span>
                </div>
                <div style="width: 50px; border-bottom: 2px dashed #e2e8f0; margin-bottom: 15px;"></div>
                <div class="step">
                    <div class="step-number">2</div>
                    <span>Payment Method</span>
                </div>
                <div style="width: 50px; border-bottom: 2px dashed #e2e8f0; margin-bottom: 15px;"></div>
                <div class="step">
                    <div class="step-number">3</div>
                    <span>Confirmation</span>
                </div>
            </div>

            <div class="checkout-layout">
                <!-- Left: Forms -->
                <div class="checkout-main">
                    <form id="checkoutForm">
                        <div class="checkout-section">
                            <h3
                                style="color: var(--primary); font-weight: 800; margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
                                <i data-lucide="building-2"></i> Institution & Shipping Details
                            </h3>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Hospital / Institution Name</label>
                                    <input type="text" name="institution" placeholder="e.g. City General Hospital"
                                        value="{{ auth()->user()->institution ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Name</label>
                                    <input type="text" name="name" placeholder="John Doe"
                                        value="{{ auth()->user()->name ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" placeholder="+91 00000 00000"
                                        value="{{ auth()->user()->phone ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" placeholder="procurement@hospital.com"
                                        value="{{ auth()->user()->email ?? '' }}" required>
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: 10px;">
                                <label>Street Address</label>
                                <input type="text" name="address" placeholder="Plot No, Industrial Area, Sector..."
                                    value="{{ auth()->user()->address ?? '' }}" required style="margin-bottom: 15px;">
                                <input type="text" name="address_line2"
                                    placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Indore"
                                        value="{{ auth()->user()->city ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>State / Region</label>
                                    <input type="text" name="state" placeholder="e.g. Madhya Pradesh"
                                        value="{{ auth()->user()->state ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Pincode / ZIP</label>
                                    <input type="text" name="pincode" placeholder="452010"
                                        value="{{ auth()->user()->pincode ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>GST Number (Optional)</label>
                                    <input type="text" name="gst_number" placeholder="23XXXXX0000X1ZX"
                                        value="{{ auth()->user()->gst_number ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="checkout-section">
                            <h3
                                style="color: var(--primary); font-weight: 800; margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
                                <i data-lucide="credit-card"></i> Select Payment Method
                            </h3>

                            <input type="hidden" name="payment_method" id="selectedPaymentMethod" value="RAZORPAY">

                            <div class="payment-option active" onclick="selectPayment('RAZORPAY', this)">
                                <div class="payment-radio"></div>
                                <div style="flex: 1;">
                                    <h4 style="color: var(--primary); margin: 0 0 5px; font-weight: 700;">Razorpay Secure
                                        (Card/UPI/NetBanking)</h4>
                                    <p style="margin: 0; font-size: 13px; color: #64748b;">Instant secure payment via
                                        Razorpay gateway.</p>
                                </div>
                                <i data-lucide="shield-check" style="color: #059669;"></i>
                            </div>

                            <div class="payment-option" onclick="selectPayment('CCAVENUE', this)">
                                <div class="payment-radio"></div>
                                <div style="flex: 1;">
                                    <h4 style="color: var(--primary); margin: 0 0 5px; font-weight: 700;">CCAvenue</h4>
                                    <p style="margin: 0; font-size: 13px; color: #64748b;">Enterprise-grade secure payment gateway.</p>
                                </div>
                                <i data-lucide="credit-card" style="color: var(--primary);"></i>
                            </div>

                            <div class="payment-option" onclick="selectPayment('PAYUMONEY', this)">
                                <div class="payment-radio"></div>
                                <div style="flex: 1;">
                                    <h4 style="color: var(--primary); margin: 0 0 5px; font-weight: 700;">PayUMoney</h4>
                                    <p style="margin: 0; font-size: 13px; color: #64748b;">Secure and fast payments via PayU.</p>
                                </div>
                                <i data-lucide="shield" style="color: var(--primary);"></i>
                            </div>

                            <div class="payment-option" onclick="selectPayment('PHONEPE', this)">
                                <div class="payment-radio"></div>
                                <div style="flex: 1;">
                                    <h4 style="color: var(--primary); margin: 0 0 5px; font-weight: 700;">PhonePe</h4>
                                    <p style="margin: 0; font-size: 13px; color: #64748b;">UPI and Wallet payments via PhonePe.</p>
                                </div>
                                <i data-lucide="smartphone" style="color: var(--primary);"></i>
                            </div>

                        </div>

                        <div class="form-group" style="margin-bottom: 40px;">
                            <label style="display: flex; align-items: center; gap: 12px; cursor: pointer;">
                                <input type="checkbox" id="termsAgreed" checked
                                    style="width: 18px; height: 18px; accent-color: var(--primary);">
                                <span style="text-transform: none; font-size: 14px; color: #64748b;">I agree to the <a
                                        href="#" style="color: var(--primary);">Terms & Conditions</a> and <a href="#"
                                        style="color: var(--primary);">Refund Policy</a>.</span>
                            </label>
                        </div>
                    </form>
                </div>

                <!-- Right: Order Summary Sticky -->
                <div class="checkout-sidebar">
                    <div class="checkout-section" style="position: sticky; top: 120px; padding: 30px;">
                        <h3 style="color: var(--primary); font-weight: 800; margin-bottom: 25px; font-size: 1.4rem;">Order
                            Review</h3>

                        @php
                            $cart = session('cart', []);
                            $subtotal = 0;
                            $gst = 0;
                            foreach ($cart as $item) {
                                $itemBaseTotal = $item['base_price'] * $item['quantity'];
                                $subtotal += $itemBaseTotal;
                                $gst += ($item['price'] * $item['quantity']) - $itemBaseTotal;
                            }
                            $total = $subtotal + $gst;
                            $discount = 0;
                            if (session()->has('coupon')) {
                                $discount = session('coupon')['value'];
                                $total -= $discount;
                            }
                        @endphp

                        <div class="review-items" style="margin-bottom: 25px; max-height: 300px; overflow-y: auto;">
                            @foreach($cart as $id => $item)
                                <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                                    <div
                                        style="width: 60px; height: 60px; background: #f8fafc; border-radius: 10px; display: flex; align-items: center; justify-content: center; padding: 10px; flex-shrink: 0;">
                                        <img src="{{ asset('storage/' . $item['image']) }}"
                                            style="max-width: 100%; height: auto;">
                                    </div>
                                    <div style="flex: 1;">
                                        <h5
                                            style="color: var(--primary); margin: 0 0 5px; font-weight: 700; font-size: 0.9rem; line-height: 1.2;">
                                            {{ $item['name'] }}
                                        </h5>
                                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 5px;">
                                            <div class="checkout-qty-control">
                                                <button type="button" class="checkout-qty-btn minus" data-id="{{ $id }}"><i data-lucide="minus" size="12"></i></button>
                                                <span class="checkout-qty-val" id="qty-{{ $id }}">{{ $item['quantity'] }}</span>
                                                <button type="button" class="checkout-qty-btn plus" data-id="{{ $id }}"><i data-lucide="plus" size="12"></i></button>
                                            </div>
                                            <span
                                                style="color: var(--primary); font-weight: 700; font-size: 13px;">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Promo Code Field -->
                        <div style="margin-bottom: 25px; background: #f8fafc; padding: 20px; border-radius: 15px; border: 1px dashed #cbd5e0;">
                            <label style="display: block; font-size: 12px; font-weight: 800; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Have a Promo Code?</label>
                            <div style="display: flex; gap: 10px;">
                                <input type="text" id="couponCodeInput" placeholder="Enter code" 
                                    style="flex: 1; padding: 10px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px;"
                                    {{ session()->has('coupon') ? 'disabled' : '' }} value="{{ session('coupon')['code'] ?? '' }}">
                                <button type="button" id="applyCouponBtn" class="btn btn-primary" 
                                    style="padding: 10px 20px; border-radius: 10px; font-weight: 700; font-size: 13px; height: auto;"
                                    {{ session()->has('coupon') ? 'style=display:none' : '' }}>APPLY</button>
                                <button type="button" id="removeCouponBtn" class="btn btn-outline" 
                                    style="padding: 10px 20px; border-radius: 10px; font-weight: 700; font-size: 13px; height: auto; border-color: #ef4444; color: #ef4444; {{ session()->has('coupon') ? '' : 'display:none' }}">REMOVE</button>
                            </div>
                            <div id="couponMessage" style="font-size: 12px; margin-top: 8px; font-weight: 600;"></div>
                        </div>

                        <div style="border-top: 1px solid #f1f5f9; padding-top: 20px; margin-bottom: 25px;">
                            <div
                                style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
                                <span style="color: #64748b; font-weight: 600;">Subtotal</span>
                                <span
                                    style="color: var(--primary); font-weight: 700;">₹{{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
                                <span style="color: #64748b; font-weight: 600;">GST Amount</span>
                                <span style="color: var(--primary); font-weight: 700;">₹{{ number_format($gst, 2) }}</span>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
                                <span style="color: #64748b; font-weight: 600;">Shipping</span>
                                <span style="color: #059669; font-weight: 800;">FREE</span>
                            </div>
                            <div id="discountRow" style="display: {{ session()->has('coupon') ? 'flex' : 'none' }}; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
                                <span style="color: #ef4444; font-weight: 600;">Discount</span>
                                <span style="color: #ef4444; font-weight: 700;">-₹<span id="discountAmountDisplay">{{ number_format($discount, 2) }}</span></span>
                            </div>
                        </div>

                        <div style="border-top: 2px dashed #e2e8f0; padding-top: 20px; margin-bottom: 30px;">
                            <div style="display: flex; justify-content: space-between;">
                                <span style="font-size: 1.1rem; color: var(--primary); font-weight: 800;">Final Order Total</span>
                                <span
                                    style="font-size: 1.5rem; color: var(--primary); font-weight: 900;">₹<span id="finalTotalDisplay">{{ number_format($total, 2) }}</span></span>
                            </div>
                        </div>

                        <button type="button" id="placeOrderBtn" class="btn btn-primary"
                            style="width: 100%; height: 60px; border-radius: 15px; font-weight: 800; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 25px rgba(0, 77, 64, 0.2);">
                            Order Now
                        </button>

                        <div
                            style="margin-top: 25px; text-align: center; border: 1px solid #eef2f6; border-radius: 12px; padding: 15px; background: #fffdf9;">
                            <p style="font-size: 12px; color: #92400e; margin: 0; font-weight: 600;">
                                <i data-lucide="truck" size="14" style="vertical-align: middle; margin-right: 5px;"></i>
                                Order will ship within 7-10 business days after confirmation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            function selectPayment(method, element) {
                document.getElementById('selectedPaymentMethod').value = method;
                document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('active'));
                element.classList.add('active');
            }

            const checkoutForm = document.getElementById('checkoutForm');
            const placeOrderBtn = document.getElementById('placeOrderBtn');

            const applyCouponBtn = document.getElementById('applyCouponBtn');
            const removeCouponBtn = document.getElementById('removeCouponBtn');
            const couponCodeInput = document.getElementById('couponCodeInput');
            const couponMessage = document.getElementById('couponMessage');
            const discountRow = document.getElementById('discountRow');
            const discountAmountDisplay = document.getElementById('discountAmountDisplay');
            const finalTotalDisplay = document.getElementById('finalTotalDisplay');

            if (applyCouponBtn) {
                applyCouponBtn.addEventListener('click', function() {
                    const code = couponCodeInput.value.trim();
                    if (!code) {
                        couponMessage.innerText = 'Please enter a coupon code';
                        couponMessage.style.color = '#ef4444';
                        return;
                    }

                    applyCouponBtn.disabled = true;
                    applyCouponBtn.innerText = '...';

                    fetch('{{ route("coupon.apply") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ code: code })
                    })
                    .then(res => res.json())
                    .then(data => {
                        applyCouponBtn.disabled = false;
                        applyCouponBtn.innerText = 'APPLY';

                        if (data.success) {
                            couponMessage.innerText = data.message;
                            couponMessage.style.color = '#059669';
                            couponCodeInput.disabled = true;
                            applyCouponBtn.style.display = 'none';
                            removeCouponBtn.style.display = 'block';
                            
                            // Update UI
                            discountRow.style.display = 'flex';
                            discountAmountDisplay.innerText = data.discount.toLocaleString('en-IN', { minimumFractionDigits: 2 });
                            
                            const currentTotal = parseFloat(finalTotalDisplay.innerText.replace(/,/g, ''));
                            const newTotal = currentTotal - data.discount;
                            finalTotalDisplay.innerText = newTotal.toLocaleString('en-IN', { minimumFractionDigits: 2 });
                        } else {
                            couponMessage.innerText = data.message;
                            couponMessage.style.color = '#ef4444';
                        }
                    });
                });
            }

            if (removeCouponBtn) {
                removeCouponBtn.addEventListener('click', function() {
                    removeCouponBtn.disabled = true;

                    fetch('{{ route("coupon.remove") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        removeCouponBtn.disabled = false;
                        if (data.success) {
                            location.reload(); // Simplest way to reset everything correctly
                        }
                    });
                });
            }

            if (placeOrderBtn) {
                placeOrderBtn.addEventListener('click', function (e) {
                    e.preventDefault();

                    if (!document.getElementById('termsAgreed').checked) {
                        alert('Please agree to terms and conditions');
                        return;
                    }

                    placeOrderBtn.disabled = true;
                    placeOrderBtn.innerText = 'PROCESSING...';

                    const formData = new FormData(checkoutForm);
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('payment_method', document.getElementById('selectedPaymentMethod').value);

                    fetch('{{ route("order.place") }}', {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                if (data.payment_required) {
                                    const options = {
                                        "key": data.razorpay_key,
                                        "amount": data.amount,
                                        "currency": "INR",
                                        "name": "A One Hospicare",
                                        "description": "Payment for " + data.order_number,
                                        "order_id": data.razorpay_order_id,
                                        "handler": function (response) {
                                            // Send payment details to server
                                            fetch('{{ route("payment.callback") }}', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                                body: JSON.stringify({
                                                    razorpay_payment_id: response.razorpay_payment_id,
                                                    razorpay_order_id: response.razorpay_order_id,
                                                    razorpay_signature: response.razorpay_signature,
                                                    order_number: data.order_number
                                                })
                                            })
                                                .then(res => res.json())
                                                .then(resData => {
                                                    if (resData.success) {
                                                        window.location.href = resData.redirect_url;
                                                        } else {
                                                            alert('Payment verification failed: ' + resData.message);
                                                            placeOrderBtn.disabled = false;
                                                            placeOrderBtn.innerText = 'ORDER NOW';
                                                        }
                                                    });
                                            },
                                            "modal": {
                                                "ondismiss": function () {
                                                    // Handle payment cancellation
                                                    fetch('{{ route("payment.failed") }}', {
                                                        method: 'POST',
                                                        headers: {
                                                            'Content-Type': 'application/json',
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        },
                                                        body: JSON.stringify({
                                                            order_number: data.order_number,
                                                            error: 'Transaction cancelled by user'
                                                        })
                                                    });
                                                    placeOrderBtn.disabled = false;
                                                    placeOrderBtn.innerText = 'ORDER NOW';
                                                }
                                            },
                                            "prefill": {
                                                "name": data.customer_name,
                                                "email": data.customer_email,
                                                "contact": data.customer_phone
                                            },
                                            "theme": {
                                                "color": "#004D40"
                                            }
                                        };
                                        const rzp1 = new Razorpay(options);
                                        rzp1.on('payment.failed', function (response) {
                                            fetch('{{ route("payment.failed") }}', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                                body: JSON.stringify({
                                                    order_number: data.order_number,
                                                    error: response.error.description
                                                })
                                            });
                                        });
                                        rzp1.open();
                                    } else {
                                        window.location.href = data.redirect_url;
                                    }
                                } else {
                                    alert(data.message);
                                    placeOrderBtn.disabled = false;
                                    placeOrderBtn.innerText = 'ORDER NOW';
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert('An unexpected error occurred. Please try again.');
                                placeOrderBtn.disabled = false;
                                placeOrderBtn.innerText = 'ORDER NOW';
                            });
                });
            }

            // Quantity Update Logic
            document.querySelectorAll('.checkout-qty-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const isPlus = this.classList.contains('plus');
                    const qtyElement = document.getElementById(`qty-${id}`);
                    let currentQty = parseInt(qtyElement.innerText);

                    if (isPlus) {
                        currentQty++;
                    } else if (currentQty > 1) {
                        currentQty--;
                    } else {
                        if(confirm('Remove this item from cart?')) {
                            updateCartQuantity(id, 0);
                        }
                        return;
                    }

                    updateCartQuantity(id, currentQty);
                });
            });

            function updateCartQuantity(id, quantity) {
                const url = quantity === 0 ? '{{ route("cart.remove") }}' : '{{ route("cart.update") }}';
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id, quantity: quantity })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
            }
        </script>
    @endpush
    </div>
    </div>
    </div>
@endsection