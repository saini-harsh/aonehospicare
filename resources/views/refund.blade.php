@extends('layouts.app')

@section('title', 'Refund & Return Policy | A One Hospicare')
@section('meta_description', 'Information about our refund and return policy for hospital furniture and medical equipment purchased from A One Hospicare.')

@section('content')
    <section class="page-banner"
        style="background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); padding: 80px 5%; text-align: center; color: white;">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px;">Refund & <span>Return Policy</span></h1>
        <p style="opacity: 0.8; font-size: 1.1rem;">Ensuring customer satisfaction and standard procedures for returns.</p>
    </section>

    <div class="legal-content" style="padding: 80px 8%; max-width: 1200px; margin: 0 auto;">
        <div
            style="background: white; padding: 50px; border-radius: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.02); border: 1px solid #f1f5f9;">
            <p style="font-size: 1.1rem; color: #475569; line-height: 1.8; margin-bottom: 40px;">
                At <strong>A One Hospicare</strong>, customer satisfaction is important to us. Please read our refund and
                return policy carefully.
            </p>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">1. Refund
                    Policy (3 Days)</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Refund requests must be raised within <strong>3 days</strong> of
                        delivery.</li>
                    <li style="margin-bottom: 10px;">The product must be unused, undamaged, and in original condition.</li>
                    <li>Refunds will be processed after inspection and approval.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">2. Return
                    Policy</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">Returns are accepted as per our return
                    guidelines. In case of hospital beds or large equipment:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Return may be accepted even after use only under specific conditions
                        defined in our return policy.</li>
                    <li>Product must not be damaged due to misuse or mishandling.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">3.
                    Non-Returnable Items</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">The following are generally not eligible
                    for return:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Customized or made-to-order products</li>
                    <li style="margin-bottom: 10px;">Used items with visible damage or wear</li>
                    <li>Products not in original condition</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">4. Return
                    Process</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Contact our support team with order details</li>
                    <li style="margin-bottom: 10px;">Share images/videos (if required)</li>
                    <li>After approval, arrange return pickup or send to our facility</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">5. Refund
                    Processing Time</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Refunds are processed within <strong>5–10 business days</strong> after
                        approval.</li>
                    <li>Amount will be credited via original payment method or agreed mode.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">6. Shipping
                    Charges</h3>
                <p style="color: #475569; line-height: 1.7;">Shipping charges are non-refundable unless the return is due to
                    our error or defective product.</p>
            </div>

            <div>
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">7. Right to
                    Refuse</h3>
                <p style="color: #475569; line-height: 1.7;">A One Hospicare reserves the right to reject returns that do
                    not meet policy conditions.</p>
            </div>
        </div>
    </div>
@endsection