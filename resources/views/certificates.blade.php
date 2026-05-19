@extends('layouts.app')

@section('title', 'Certifications & Quality Standards | ISO 13485:2016 Certified')
@section('meta_description', 'A One Hospicare is ISO 13485:2016, CE, ROHS, and BIFMA certified. We maintain the highest quality standards for medical furniture and hospital equipment.')
@section('meta_keywords', 'ISO certified medical furniture, hospital equipment quality standards, CE certified hospital beds, BIFMA medical furniture, medical device manufacturing certification')

@section('content')
    <!-- Certificates Banner -->
    <section class="about-banner hero"
        style="min-height: 350px; background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); background-size: cover; background-position: center;">
        <div class="hero-content" style="text-align: center; margin: 0 auto;">
            <span class="tag" style="color: var(--secondary); font-weight: 700; letter-spacing: 2px;">TRUST & QUALITY</span>
            <h1 style="font-size: 3.5rem; margin-top: 20px;">ISO Certified <span>Hospital Furniture</span></h1>
            <p style="margin: 20px auto; opacity: 0.9; max-width: 700px;">Our medical furniture and equipment meet the
                highest international safety and manufacturing standards.</p>
        </div>
    </section>

    <!-- Accreditation Badges -->
    <section style="padding: 60px 5%; background: var(--white); border-bottom: 1px solid #eee;">
        <div style="display: flex; justify-content: center; align-items: center; gap: 60px; flex-wrap: wrap; opacity: 0.7;">
            <img src="{{ asset('assets/images/certs.png') }}" alt="Accreditation Badges"
                style="max-height: 80px; filter: grayscale(1);">
        </div>
    </section>

    <!-- Certificates Grid -->
    <section class="certificates-main" style="padding: 100px 5%; background: var(--bg-light);">
        <div class="category-grid"
            style="grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 40px; max-width: 1300px; margin: 0 auto;">

            <!-- ISO 13485 Embed -->
            <div class="cert-viewer-card"
                style="background: white; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: var(--shadow-md);">
                <div
                    style="padding: 15px 25px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; gap: 10px; background: #fff;">
                    <i data-lucide="check-circle" size="18" style="color: var(--primary);"></i>
                    <h4 style="color: var(--primary); font-size: 1rem; margin: 0; font-weight: 700;">ISO 13485:2016
                        Certified</h4>
                </div>
                <div style="height: 600px; padding: 10px; background: #f1f5f9;">
                    <iframe src="{{ asset('assets/images/ISO-9-14-45-13485-A-ONE-HOSPICARE.pdf') }}#toolbar=0" width="100%"
                        height="100%" style="border-radius: 8px; border: 1px solid #cbd5e0;"></iframe>
                </div>
            </div>

            <!-- CE RoHS BIFMA Embed -->
            <div class="cert-viewer-card"
                style="background: white; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: var(--shadow-md);">
                <div
                    style="padding: 15px 25px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; gap: 10px; background: #fff;">
                    <i data-lucide="check-circle" size="18" style="color: var(--primary);"></i>
                    <h4 style="color: var(--primary); font-size: 1rem; margin: 0; font-weight: 700;">CE, ROHS & BIFMA</h4>
                </div>
                <div style="height: 600px; padding: 10px; background: #f1f5f9;">
                    <iframe src="{{ asset('assets/images/CE-ROHD-BIFMA-A-ONE-HOSPICARE-1.pdf') }}#toolbar=0" width="100%"
                        height="100%" style="border-radius: 8px; border: 1px solid #cbd5e0;"></iframe>
                </div>
            </div>

            <div class="cert-viewer-card"
                style="background: white; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: var(--shadow-md);">
                <div
                    style="padding: 15px 25px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; gap: 10px; background: #fff;">
                    <i data-lucide="check-circle" size="18" style="color: var(--primary);"></i>
                    <h4 style="color: var(--primary); font-size: 1rem; margin: 0; font-weight: 700;">Product E-Catalogue
                    </h4>
                </div>
                <div style="height: 600px; padding: 10px; background: #f1f5f9;">
                    <iframe src="{{ asset('assets/images/AOne-Hospicare-E-Catalogue.pdf') }}#toolbar=0" width="100%"
                        height="100%" style="border-radius: 8px; border: 1px solid #cbd5e0;"></iframe>
                </div>
            </div>

        </div>
    </section>

    <!-- Why Certification Matters -->
    <section style="padding: 100px 5%; background: var(--white);">
        <div class="inquiry-container" style="align-items: flex-start; gap: 60px;">
            <div class="inquiry-info">
                <span class="tag">WHY IT MATTERS</span>
                <h2>Patient Safety is Built on Global Standards</h2>
                <p>Certification isn't just a document; it's a promise. At A One Hospicare, we undergo strict audits and
                    testing to ensure that every hospital bed, trolley, and medical gas panel we produce follows the highest
                    safety protocols.</p>
                <p>Our commitment to ISO and CE standards means you get equipment that is durable, safe, and clinically
                    optimized.</p>
            </div>
            <div class="advantage-box"
                style="background: var(--primary); color: white; padding: 50px; border-radius: 30px; box-shadow: var(--shadow-lg);">
                <h3 style="color: var(--secondary); margin-bottom: 30px;">Compliance Checklist</h3>
                <ul style="list-style: none;">
                    <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i data-lucide="check-circle" style="color: var(--secondary);"></i>
                        <span>Structural Durability Testing (BIFMA)</span>
                    </li>
                    <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i data-lucide="check-circle" style="color: var(--secondary);"></i>
                        <span>Environmental Lead-Free Compliance (RoHS)</span>
                    </li>
                    <li style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i data-lucide="check-circle" style="color: var(--secondary);"></i>
                        <span>European Safety Conformity (CE)</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 15px;">
                        <i data-lucide="check-circle" style="color: var(--secondary);"></i>
                        <span>Medical Device Quality Management (ISO)</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection