@extends('layouts.app')

@section('title', 'Privacy Policy | A One Hospicare')
@section('meta_description', 'Read our privacy policy to understand how we collect, use, and protect your personal information at A One Hospicare.')

@section('content')
    <section class="page-banner"
        style="background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); padding: 80px 5%; text-align: center; color: white;">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px;">Privacy <span>Policy</span></h1>
        <p style="opacity: 0.8; font-size: 1.1rem;">Your data security and professional trust are our top priorities.</p>
    </section>

    <div class="legal-content" style="padding: 80px 8%; max-width: 1200px; margin: 0 auto;">
        <div
            style="background: white; padding: 50px; border-radius: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.02); border: 1px solid #f1f5f9;">
            <p style="font-size: 1.1rem; color: #475569; line-height: 1.8; margin-bottom: 40px;">
                At <strong>A One Hospicare</strong>, we respect your privacy and are committed to protecting your personal
                information.
            </p>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">1. Information
                    We Collect</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">We may collect:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Name, phone number, email address</li>
                    <li style="margin-bottom: 10px;">Billing and shipping details</li>
                    <li>Business or clinic information (if applicable)</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">2. How We Use
                    Your Information</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">Your data is used to:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Process orders and payments</li>
                    <li style="margin-bottom: 10px;">Provide customer support</li>
                    <li style="margin-bottom: 10px;">Improve our services</li>
                    <li>Send updates related to your orders</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">3. Data
                    Protection</h3>
                <p style="color: #475569; line-height: 1.7;">We implement appropriate security measures to protect your
                    data. However, no online transmission is 100% secure.</p>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">4. Sharing of
                    Information</h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">We do not sell or rent your personal
                    information. Data may be shared only with:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Delivery partners</li>
                    <li style="margin-bottom: 10px;">Payment processors</li>
                    <li>Legal authorities (if required)</li>
                </ul>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">5. Cookies</h3>
                <p style="color: #475569; line-height: 1.7;">Our website may use cookies to enhance user experience and
                    track performance.</p>
            </div>

            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">6. Your Rights
                </h3>
                <p style="color: #475569; line-height: 1.7; margin-bottom: 15px;">You may request to:</p>
                <ul style="color: #475569; line-height: 1.7; padding-left: 20px;">
                    <li style="margin-bottom: 10px;">Access your data</li>
                    <li style="margin-bottom: 10px;">Correct inaccurate information</li>
                    <li>Delete your personal data (subject to legal obligations)</li>
                </ul>
            </div>

            <div>
                <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 800; margin-bottom: 20px;">7. Updates to
                    Policy</h3>
                <p style="color: #475569; line-height: 1.7;">We may update this Privacy Policy periodically.</p>
            </div>
        </div>
    </div>
@endsection