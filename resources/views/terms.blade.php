@extends('layouts.app')

@section('title', 'Terms & Conditions | A One Hospicare')
@section('meta_description', 'Read the terms and conditions for using our website and purchasing medical equipment from A One Hospicare.')

@section('content')
    <section class="page-banner"
        style="background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); padding: 80px 5%; text-align: center; color: white;">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px;">Terms & <span>Conditions</span></h1>
        <p style="opacity: 0.8; font-size: 1.1rem;">Clear and professional guidelines for our stakeholders and clients.</p>
    </section>

    <div class="legal-content" style="padding: 80px 8%; max-width: 1200px; margin: 0 auto;">
        <div
            style="background: white; padding: 50px; border-radius: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.02); border: 1px solid #f1f5f9;">
            <p style="font-size: 1.1rem; color: #475569; line-height: 1.8; margin-bottom: 40px;">
                Welcome to <strong>A One Hospicare</strong>. By accessing or purchasing from our website, you agree to
                comply with the following terms and conditions.
            </p>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">1. General</h3>
                <p style="color: #475569; line-height: 1.7;">A One Hospicare is engaged in the manufacturing and supply of
                    hospital furniture and medical equipment. These terms govern all transactions, services, and usage of
                    our website.</p>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">2. Product
                    Information</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">We strive to ensure all product details,
                    specifications, and images are accurate. However:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Minor variations in design, color, or finish may occur.</li>
                    <li>Product dimensions and features are subject to manufacturing tolerances.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">3. Pricing &
                    Payment</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">All prices are listed in INR unless stated otherwise.</li>
                    <li style="margin-bottom: 10px;">GST and other applicable taxes will be charged as per government
                        regulations.</li>
                    <li style="margin-bottom: 10px;">Full or partial advance payment may be required depending on the order.
                    </li>
                    <li>Payments must be made only through authorized company accounts.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">4. Order
                    Confirmation</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Orders are confirmed only after payment verification.</li>
                    <li>We reserve the right to cancel or refuse any order due to stock issues, pricing errors, or
                        unforeseen circumstances.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">5. Delivery &
                    Shipping</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Delivery timelines may vary based on location and product availability.
                    </li>
                    <li>A One Hospicare is not responsible for delays caused by logistics partners or external factors.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">6. Use of
                    Products</h3>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Products must be used strictly for their intended medical or hospital
                        purpose.</li>
                    <li>Improper use or modification voids any warranty or return eligibility.</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">7. Limitation
                    of Liability</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">A One Hospicare shall not be liable for:
                </p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Indirect or consequential damages</li>
                    <li style="margin-bottom: 10px;">Loss arising from misuse of products</li>
                    <li>Delays beyond our control</li>
                </ul>
            </div>

            <div>
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">8. Changes to
                    Terms</h3>
                <p style="color: #475569; line-height: 1.7;">We reserve the right to update these terms at any time without
                    prior notice.</p>
            </div>
        </div>
    </div>
@endsection