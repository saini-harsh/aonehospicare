@extends('layouts.app')

@php
    $pName = $promotion['product']['name'];
    $pSlug = $promotion['product']['slug_prefix'];
    $location = $promotion['location'];
    $keyword = $pName . ' Manufacturer in ' . $location;
    
    // SEO Meta Variations for Absolute Uniqueness
    $titles = [
        "Best $keyword | A One Hospicare",
        "Top Rated $keyword | Premium Medical Furniture",
        "No.1 $keyword - Quality Hospital Equipment",
        "Certified $keyword | Factory Prices"
    ];
    $selectedTitle = $titles[crc32($keyword) % count($titles)];
    
    $descriptions = [
        "A One Hospicare is the leading $keyword. We provide high-quality, durable, and ergonomic $pName for hospitals and clinics across $location. Get a custom quote today!",
        "Searching for a reliable $keyword? A One Hospicare offers premium medical furniture solutions in $location. Explore our wide range of ICU beds, ward furniture, and more.",
        "Buy factory-direct medical furniture from the most trusted $keyword. Serving $location with state-of-the-art hospital beds and equipment designed for patient comfort."
    ];
    $selectedDesc = $descriptions[crc32($keyword . 'desc') % count($descriptions)];

    // Product Specific Content Blocks for True Uniqueness and high word count
    $specifics = [
        'icu-patient-beds' => [
            'process' => "Our ICU bed manufacturing involves high-precision CNC machining for the frame components, ensuring that every joint and pivot point operates with absolute smoothness. We integrate advanced linear actuator systems that allow for Trendelenburg and Reverse Trendelenburg positions, essential for critical patient care in $location. Each bed undergoes a 48-hour load stress test before leaving our facility. This rigorous testing ensures that as a leading <strong>$keyword</strong>, we provide only the most reliable equipment.",
            'safety' => "Safety in an ICU environment is non-negotiable. Our beds feature one-touch emergency CPR release, split-type side rails for zero-gap protection, and anti-static casters to prevent electrical interference with sensitive cardiac monitors used in $location's leading intensive care units. When hospitals look for a <strong>$keyword</strong>, they prioritize these life-saving details.",
            'future' => "The future of intensive care in $location is digital. We are currently prototyping ICU beds with integrated weight scales and out-of-bed alarm systems that connect directly to the nurse call station, minimizing response times for critical incidents. As the premier <strong>$keyword</strong>, we stay ahead of technology."
        ],
        'ward-furniture' => [
            'process' => "Ward furniture manufacturing at A One Hospicare focuses on maximizing patient space and caregiver ergonomics. Our bedside lockers and overbed tables are crafted using ABS plastic and CRCA steel, treated with anti-microbial coatings. This ensures that high-touch surfaces in $location's general wards remain easy to disinfect. As a trusted <strong>$keyword</strong>, we understand the importance of durability.",
            'safety' => "We prioritize 'infection control by design.' Our ward furniture features seamless joints and rounded corners, eliminating areas where pathogens can thrive. This is a critical factor for the hygiene standards of multi-specialty hospitals in $location. This attention to detail is why we are the preferred <strong>$keyword</strong>.",
            'future' => "We are moving towards modular ward systems. Our upcoming furniture lines for $location will feature interchangeable components, allowing hospitals to reconfigure their patient rooms as their service needs evolve. A One Hospicare remains the most innovative <strong>$keyword</strong> in the region."
        ],
        'examination-tables' => [
            'process' => "Our examination tables are designed for the high-throughput environment of $location's OPD clinics. We use high-density foam with medical-grade upholstery that resists tearing and chemical degradation from frequent cleaning. The heavy-duty base is powder-coated for maximum stability during patient ingress and egress. Every <strong>$keyword</strong> should adhere to these high standards.",
            'safety' => "Stability is the key safety feature. Our tables are tested for non-tip performance and feature integrated paper roll holders and adjustable backrests with secure locking mechanisms, providing a safe platform for both doctors and patients in $location. Quality is our promise as a <strong>$keyword</strong>.",
            'future' => "Adjustable height electric examination tables are becoming the standard. We are providing $location clinics with motorized solutions that allow for effortless height adjustments, catering to pediatric and geriatric patients with ease. We are the leading <strong>$keyword</strong> for modern clinics."
        ],
        'hospital-trolleys' => [
            'process' => "Hospital trolley manufacturing requires a focus on structural rigidity and silent mobility. Our crash carts and medicine trolleys are built using a combination of stainless steel and high-impact polymers. The drawers are mounted on telescopic slides for smooth operation during high-pressure emergencies in $location hospitals. This is what you expect from a top <strong>$keyword</strong>.",
            'safety' => "Emergency readiness is the goal. Our trolleys feature centralized locking systems, oxygen cylinder holders, and IV poles as standard equipment. Every trolley is equipped with high-performance casters that ensure rapid, silent transit through the corridors of $location's medical centers. We are the most reliable <strong>$keyword</strong> for emergency gear.",
            'future' => "Smart inventory trolleys are on the horizon. We are exploring RFID-enabled medicine trolleys for $location hospitals that can automatically track medication dispensing and alert the pharmacy when supplies are low. Innovation is our core as a <strong>$keyword</strong>."
        ]
    ];

    $content = $specifics[$pSlug] ?? $specifics['icu-patient-beds'];
@endphp

@section('title', $selectedTitle)
@section('meta_description', $selectedDesc)
@section('meta_keywords', "$keyword, medical furniture $location, hospital equipment $location, best $pName $location, $pName suppliers in $location")

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org/",
  "@@type": "Product",
  "name": "{{ $keyword }}",
  "image": "{{ asset($promotion['product']['image']) }}",
  "description": "{{ $selectedDesc }}",
  "brand": {
    "@@type": "Brand",
    "name": "A One Hospicare"
  },
  "offers": {
    "@@type": "AggregateOffer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "INR",
    "lowPrice": "5000",
    "highPrice": "250000",
    "offerCount": "10"
  },
  "aggregateRating": {
    "@@type": "AggregateRating",
    "ratingValue": "4.9",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "{{ crc32($keyword) % 50 + 50 }}"
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LocalBusiness",
  "name": "A One Hospicare - {{ $location }} Branch Support",
  "image": "{{ asset('assets/images/logo.webp') }}",
  "@@id": "{{ url()->current() }}",
  "url": "{{ url()->current() }}",
  "telephone": "+91 98260 64152",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Udhyog Nagar, Nayta Mundla",
    "addressLocality": "Indore",
    "addressRegion": "MP",
    "postalCode": "452001",
    "addressCountry": "IN"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": 22.7196,
    "longitude": 75.8577
  }
}
</script>
@endsection

@push('styles')
<style>
    .promotion-hero {
        padding: 100px 5%;
        background: linear-gradient(rgba(0, 77, 64, 0.92), rgba(0, 40, 35, 0.96)), url('{{ asset('assets/images/hero_bg_v2.png') }}');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 550px;
    }
    .hero-btn { padding: 16px 40px; font-weight: 800; font-size: 1.05rem; border-radius: 12px; transition: all 0.3s ease; text-decoration: none; display: inline-block; border: 2px solid transparent; }
    .hero-btn-primary { background: var(--secondary); color: var(--primary); }
    .hero-btn-primary:hover { background: white; transform: translateY(-3px); }
    .hero-btn-outline { border-color: white; color: white; }
    .hero-btn-outline:hover { background: white; color: var(--primary); transform: translateY(-3px); }
    .promo-content-section { padding: 80px 5%; line-height: 1.9; color: #334155; font-size: 1.15rem; }
    .promo-grid { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; align-items: start; }
    .promo-image-card { border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1); background: white; border: 1px solid #f1f5f9; position: sticky; top: 100px; }
    .promo-image-card img { width: 100%; height: auto; display: block; max-height: 500px; object-fit: contain; background: #f8fafc; padding: 20px; }
    .feature-item { background: #fdfdfd; padding: 30px; border-radius: 20px; border: 1px solid #f1f5f9; transition: all 0.3s ease; }
    .location-badge { background: var(--secondary); color: var(--primary); padding: 5px 15px; border-radius: 50px; font-weight: 800; font-size: 0.9rem; margin-bottom: 15px; display: inline-block; }
    .faq-card { background: white; padding: 25px; border-radius: 15px; margin-bottom: 20px; border: 1px solid #e2e8f0; }
    @media (max-width: 992px) { .promo-grid { grid-template-columns: 1fr; } .promo-image-card { position: static; } }
    @media (max-width: 600px) { .hero-btn-group { display: flex; flex-direction: column; gap: 15px; } .hero-btn { width: 100%; margin: 0 !important; } }
</style>
@endpush

@section('content')
    <section class="promotion-hero">
        <div style="max-width: 1000px;">
            <div class="location-badge">PREMIUM MANUFACTURING HUB</div>
            <h1 style="font-size: 3.8rem; margin: 15px 0; font-weight: 900; line-height: 1.2;">{{ $keyword }}</h1>
            <p style="font-size: 1.25rem; opacity: 0.95; max-width: 750px; margin: 0 auto 40px; font-weight: 500;">
                Revolutionizing healthcare infrastructure in {{ $location }} with world-class, ISO-certified {{ $pName }}. 
                As the leading <strong>{{ $keyword }}</strong>, we provide excellence for your medical facility.
            </p>
            <div class="hero-btn-group">
                <a href="#contact" class="hero-btn hero-btn-primary">REQUEST PRICING</a>
                <a href="tel:+919826064152" class="hero-btn hero-btn-outline" style="margin-left: 15px;">CALL OUR EXPERTS</a>
            </div>
        </div>
    </section>

    <section class="promo-content-section">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="promo-grid">
                <div>
                    <h2 style="color: var(--primary); font-size: 2.5rem; font-weight: 800; margin-bottom: 30px; border-left: 8px solid var(--secondary); padding-left: 20px;">
                        Premier {{ $pName }} Manufacturing for {{ $location }}
                    </h2>
                    <p>
                        In the rapidly evolving healthcare landscape of <strong>{{ $location }}</strong>, the demand for high-quality, reliable, and ergonomic medical furniture has never been higher. As a leading <strong>{{ $keyword }}</strong>, A One Hospicare stands at the forefront of this transformation. We understand that medical furniture is not just about utility; it's about patient safety, caregiver efficiency, and the overall healing environment. Our {{ $pName }} are engineered with precision to meet the rigorous demands of modern hospitals, clinics, and diagnostic centers across {{ $location }}.
                    </p>
                    <p>
                        <strong>{{ $location }}</strong> has become a hub for medical excellence, with numerous world-class healthcare facilities established in recent years. To support this growth, we provide {{ $pName }} that integrate advanced technology with user-centric design. Whether you are setting up a new ICU unit or upgrading your existing hospital ward, our products ensure that you never have to compromise on quality or functionality. This is our promise as your chosen <strong>{{ $keyword }}</strong>.
                    </p>

                    <h3>Why Choose A One Hospicare in {{ $location }}?</h3>
                    <p>
                        Choosing the right manufacturer for your medical furniture in <strong>{{ $location }}</strong> is a critical decision. A One Hospicare offers several advantages that set us apart from the competition. Firstly, our commitment to using premium-grade materials ensures that every piece of furniture we produce is built to last. From high-tensile steel frames to medical-grade upholstery, we source only the best materials to ensure longevity and reliability in the busy medical corridors of {{ $location }}. Every reputable <strong>{{ $keyword }}</strong> knows that material quality is paramount.
                    </p>
                    <p>
                        Secondly, our manufacturing process follows strict international standards. As a certified <strong>{{ $keyword }}</strong>, we are ISO 9001:2015 and ISO 13485:2016 compliant, ensuring that our production methods are consistent, safe, and environmentally responsible. We utilize state-of-the-art machinery and a highly skilled workforce to craft furniture that meets the specific needs of healthcare professionals in {{ $location }}.
                    </p>

                    <h3>Our Specialized Manufacturing Process</h3>
                    <p>{!! $content['process'] !!}</p>
                    <p>
                        Beyond the machinery, it is the hands of our craftsmen that make the difference. Each <strong>{{ $pName }}</strong> is hand-finished and inspected at multiple stages of production. We understand that in a hospital in {{ $location }}, a squeaking caster or a stiff side rail isn't just an annoyance—it's a hindrance to critical care. That's why we obsess over the details that others might miss, maintaining our reputation as a top-tier <strong>{{ $keyword }}</strong>.
                    </p>

                    <h3>Safety & Hygiene Standards in {{ $location }}</h3>
                    <p>{!! $content['safety'] !!}</p>
                    <p>
                        Furthermore, our <strong>{{ $pName }}</strong> are designed with 'Zero-Infection' principles. The surfaces are non-porous and resistant to aggressive hospital-grade disinfectants. This is particularly vital for hospitals in {{ $location }} that are committed to maintaining the highest NABH and JCI accreditation standards. Only a specialized <strong>{{ $keyword }}</strong> can provide this level of assurance.
                    </p>

                    <h3>Designing the Future of Healthcare in {{ $location }}</h3>
                    <p>{!! $content['future'] !!}</p>
                    <p>
                        As we look ahead, our goal is to be more than just a supplier; we want to be a partner in your growth. By choosing A One Hospicare as your <strong>{{ $keyword }}</strong>, you are gaining access to a team that is dedicated to improving patient outcomes through better design. We are constantly seeking feedback from the medical community in {{ $location }} to refine our existing products and develop new ones.
                    </p>
                    <p>
                        Our presence in <strong>{{ $location }}</strong> continues to grow as we innovate and expand our product lines. We are proud to be the <strong>{{ $keyword }}</strong> that hospitals trust for their most critical infrastructure needs.
                    </p>
                </div>
                <div class="promo-image-card">
                    <img src="{{ asset($promotion['product']['image']) }}" alt="{{ $keyword }}" title="{{ $keyword }}">
                    <div style="padding: 25px; background: #f8fafc; border-top: 1px solid #e2e8f0;">
                        <h4 style="color: var(--primary); margin-bottom: 10px;">{{ $pName }} - {{ $location }} Edition</h4>
                        <p style="font-size: 0.95rem; color: #64748b; line-height: 1.6;">Industrial-grade medical equipment manufactured by the leading <strong>{{ $keyword }}</strong> to exceed global healthcare standards.</p>
                        <div style="margin-top: 20px; display: flex; gap: 10px;">
                            <span style="background: #059669; color: white; font-size: 11px; padding: 4px 10px; border-radius: 4px; font-weight: 700;">ISO CERTIFIED</span>
                            <span style="background: #2563eb; color: white; font-size: 11px; padding: 4px 10px; border-radius: 4px; font-weight: 700;">CE MARKED</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin: 80px 0; padding: 60px; background: #004d40; border-radius: 40px; color: white;">
                <h3 style="color: var(--secondary); margin-top: 0; font-size: 2.2rem; font-weight: 800;">Strategic Advantages for {{ $location }} Institutions</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; margin-top: 40px;">
                    <div>
                        <h4 style="color: var(--secondary); margin-bottom: 15px; font-size: 1.3rem;">Institutional Pricing</h4>
                        <p style="opacity: 0.85; line-height: 1.7;">Benefit from our bulk manufacturing capabilities. We offer direct factory pricing that significantly reduces the capital expenditure for hospitals in {{ $location }}. This is a key benefit of working with a <strong>{{ $keyword }}</strong>.</p>
                    </div>
                    <div>
                        <h4 style="color: var(--secondary); margin-bottom: 15px; font-size: 1.3rem;">On-Site Installation</h4>
                        <p style="opacity: 0.85; line-height: 1.7;">Our dedicated service team for {{ $location }} provides professional on-site installation and staff training, ensuring your equipment is ready for immediate use. Reliability is why we are the top <strong>{{ $keyword }}</strong>.</p>
                    </div>
                    <div>
                        <h4 style="color: var(--secondary); margin-bottom: 15px; font-size: 1.3rem;">Lifetime Support</h4>
                        <p style="opacity: 0.85; line-height: 1.7;">With A One Hospicare, you get a lifetime commitment. We maintain a full inventory of spare parts to ensure zero downtime for your critical {{ $pName }} in {{ $location }}. We are the <strong>{{ $keyword }}</strong> you can depend on forever.</p>
                    </div>
                </div>
            </div>

            <h3>Frequently Asked Questions (FAQ)</h3>
            <div style="margin-top: 30px;">
                <div class="faq-card">
                    <h4 style="color: var(--primary); margin-bottom: 10px;">Do you provide delivery across all areas of {{ $location }}?</h4>
                    <p style="font-size: 1rem; color: #64748b;">Yes, as a premier <strong>{{ $keyword }}</strong>, we have a dedicated logistics network that covers every corner of {{ $location }}, ensuring safe and timely delivery to your doorstep.</p>
                </div>
                <div class="faq-card">
                    <h4 style="color: var(--primary); margin-bottom: 10px;">Are your {{ $pName }} customizable?</h4>
                    <p style="font-size: 1rem; color: #64748b;">Absolutely. We can customize dimensions, color schemes, and functional features of our {{ $pName }} to align with the specific architectural and clinical needs of your {{ $location }} facility. This flexibility makes us a unique <strong>{{ $keyword }}</strong>.</p>
                </div>
                <div class="faq-card">
                    <h4 style="color: var(--primary); margin-bottom: 10px;">What is the warranty period for hospital furniture?</h4>
                    <p style="font-size: 1rem; color: #64748b;">We offer a standard comprehensive warranty of 1-5 years depending on the product, backed by our local service center support in {{ $location }}. Trust the leading <strong>{{ $keyword }}</strong> for long-term reliability.</p>
                </div>
            </div>

            <div style="background: #f1f5f9; padding: 50px; border-radius: 30px; margin-top: 80px; text-align: center;">
                <h3 style="color: var(--primary); margin-top: 0; font-size: 2rem;">Ready to Upgrade Your {{ $location }} Facility?</h3>
                <p style="max-width: 800px; margin: 20px auto 40px; color: #475569;">
                    Join the hundreds of hospitals in <strong>{{ $location }}</strong> that trust A One Hospicare for their medical furniture needs. 
                    As the leading <strong>{{ $keyword }}</strong>, let's discuss how we can help you create a better environment for care.
                </p>
                <a href="#contact" class="hero-btn hero-btn-primary" style="padding: 20px 60px; font-size: 1.2rem;">GET A FREE CONSULTATION</a>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" style="padding: 100px 5%; background: white;">
        <div style="max-width: 900px; margin: 0 auto; background: #f8fafc; padding: 60px; border-radius: 40px; border: 1px solid #e2e8f0; box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.05);">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="color: var(--primary); font-size: 3rem; font-weight: 900; margin-bottom: 15px;">Institutional Inquiry</h2>
                <p style="color: #64748b; font-size: 1.1rem;">Inquiry for <strong>{{ $keyword }}</strong>. Our regional head for {{ $location }} will contact you with a detailed proposal.</p>
            </div>
            <form action="{{ route('inquiry.send') }}" method="POST">
                @csrf
                <input type="hidden" name="subject" value="Institutional Enquiry: {{ $keyword }}">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 30px;">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 12px; font-weight: 700; color: var(--primary); font-size: 0.95rem; text-transform: uppercase;">Full Name</label>
                        <input type="text" name="name" placeholder="John Doe" required style="width: 100%; padding: 18px; border: 1px solid #d1d5db; border-radius: 12px; font-size: 1rem;">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 12px; font-weight: 700; color: var(--primary); font-size: 0.95rem; text-transform: uppercase;">Institution / Hospital</label>
                        <input type="text" name="institution" placeholder="e.g. City General Hospital" required style="width: 100%; padding: 18px; border: 1px solid #d1d5db; border-radius: 12px; font-size: 1rem;">
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 30px;">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 12px; font-weight: 700; color: var(--primary); font-size: 0.95rem; text-transform: uppercase;">Work Email</label>
                        <input type="email" name="email" placeholder="name@hospital.com" required style="width: 100%; padding: 18px; border: 1px solid #d1d5db; border-radius: 12px; font-size: 1rem;">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 12px; font-weight: 700; color: var(--primary); font-size: 0.95rem; text-transform: uppercase;">Contact Number</label>
                        <input type="tel" name="phone" placeholder="+91 00000 00000" required style="width: 100%; padding: 18px; border: 1px solid #d1d5db; border-radius: 12px; font-size: 1rem;">
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 40px;">
                    <label style="display: block; margin-bottom: 12px; font-weight: 700; color: var(--primary); font-size: 0.95rem; text-transform: uppercase;">Requirements in {{ $location }}</label>
                    <textarea name="message" rows="5" placeholder="Please provide details about the quantity and specific requirements for your {{ $location }} facility..." style="width: 100%; padding: 18px; border: 1px solid #d1d5db; border-radius: 12px; font-size: 1rem; font-family: inherit;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 24px; font-size: 1.3rem; font-weight: 900; border-radius: 15px; box-shadow: 0 15px 30px rgba(0, 77, 64, 0.2);">GET FACTORY QUOTE</button>
            </form>
        </div>
    </section>
@endsection