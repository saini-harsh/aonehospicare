@extends('layouts.app')

@section('title', 'About Us | A One Hospicare - Leading Hospital Furniture Manufacturer')
@section('meta_description', 'Learn about A One Hospicare, Indore\'s premier manufacturer of high-quality hospital furniture and medical equipment since 2004. Our commitment to excellence and innovation.')
@section('meta_keywords', 'about A One Hospicare, hospital furniture factory, medical equipment manufacturing company, hospital bed manufacturers in India, Indore medical furniture')

@push('styles')
<style>
    @media (max-width: 992px) {
        .about-banner h1 { font-size: 2.5rem !important; }
        .about-main .inquiry-container { grid-template-columns: 1fr !important; gap: 40px !important; }
        .vision-story div { grid-template-columns: 1fr !important; gap: 30px !important; }
        .about-img-box { margin-bottom: 50px; }
        .about-img-box div:last-child { left: 0 !important; bottom: -30px !important; width: 100%; text-align: center; }
    }

    /* Responsive Timeline */
    @media (max-width: 768px) {
        .timeline-line { left: 20px !important; transform: none !important; }
        .milestone-item { flex-direction: column !important; align-items: flex-start !important; padding-left: 50px; position: relative; }
        .milestone-item > div:first-child, .milestone-item > div:nth-child(3) { width: 100% !important; text-align: left !important; }
        .timeline-dot { position: absolute; left: 11px; top: 5px; }
    }
</style>
@endpush

@section('content')
    <!-- About Banner Section -->
    <section class="about-banner hero" style="min-height: 400px; background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); background-size: cover; background-position: center;">
        <div class="hero-content" style="text-align: center; margin: 0 auto;">
            <span class="tag" style="color: var(--secondary); font-weight: 700; letter-spacing: 2px;">SINCE 2004</span>
            <h1 style="font-size: 3.5rem; margin-top: 20px;">Leading Manufacturer of <br><span>Hospital Furniture in Indore</span></h1>
            <p style="margin: 20px auto; opacity: 0.9;">A One Hospicare is Indore's leading manufacturer of premium hospital furniture, dedicated to clinical precision and patient comfort.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-main" style="padding: 100px 5%; background: var(--white);">
        <div class="inquiry-container" style="grid-template-columns: 1.2fr 1fr; gap: 80px;">
            <div class="inquiry-info">
                <span class="tag">WHO WE ARE</span>
                <h2>Championing Healthcare Excellence Through Innovation</h2>
                <p>Founded on the principles of engineering perfection and medical necessity, A One Hospicare has grown from a specialized workshop into a national powerhouse of medical manufacturing. We don't just build furniture; we create a foundation for healing.</p>
                
                <div class="contact-card" style="width: 100%; max-width: none;">
                    <div class="c-icon" style="background: var(--secondary);"><i data-lucide="award"></i></div>
                    <div class="c-details">
                        <h5>ISO 9001:2015 Certified</h5>
                        <p>Our manufacturing processes adhere to the highest global quality standards.</p>
                    </div>
                </div>
            </div>
            <div class="about-img-box" style="position: relative;">
                <div style="background: var(--bg-light); border-radius: 30px; height: 500px; overflow: hidden; box-shadow: var(--shadow-lg);">
                    <img src="{{ asset('assets/images/about_showcase.png') }}" alt="Medical Manufacturing Excellence" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <!-- Decorative Elements -->
                <div style="position: absolute; top: -20px; right: -20px; width: 100px; height: 100px; background: var(--secondary); opacity: 0.1; border-radius: 20px; z-index: -1;"></div>
                <div style="position: absolute; bottom: 30px; left: -30px; background: var(--primary); color: white; padding: 30px; border-radius: 20px; box-shadow: var(--shadow-md); z-index: 5;">
                    <h4 style="font-size: 2.5rem; color: var(--secondary); margin-bottom: 5px;">20+</h4>
                    <p style="font-size: 14px; opacity: 0.8; margin: 0;">Years of Institutional Excellence</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story and Our Vision Section -->
    <section class="vision-story" style="padding: 100px 5%; background: #001F1C; color: white;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px;">
            <div class="story-box" style="padding: 40px; border-radius: 25px; background: rgba(255,255,255,0.05); border-left: 5px solid var(--secondary);">
                <i data-lucide="book-open" size="48" style="color: var(--secondary); margin-bottom: 20px;"></i>
                <h3 style="font-size: 2rem; margin-bottom: 20px;">Our Story</h3>
                <p style="opacity: 0.8; line-height: 1.8;">Starting in Indore with a vision to revolutionize the availability of high-quality medical beds, we navigated the complexities of medical engineering to become a trusted partner for over 500+ hospitals across India. Our journey is defined by continuous learning and unwavering commitment to the healthcare sector.</p>
            </div>
            <div class="vision-box" style="padding: 40px; border-radius: 25px; background: rgba(255,255,255,0.05); border-left: 5px solid var(--accent);">
                <i data-lucide="eye" size="48" style="color: var(--accent); margin-bottom: 20px;"></i>
                <h3 style="font-size: 2rem; margin-bottom: 20px;">Our Vision</h3>
                <p style="opacity: 0.8; line-height: 1.8;">To be the global benchmark for medical furniture innovation. We aim to empower every medical professional with tools that enhance their efficiency and every patient with a environment that promotes rapid recovery and absolute safety.</p>
            </div>
        </div>
    </section>

    <!-- Quality You Can Trust Section -->
    <section class="quality-trust" style="padding: 100px 5%; background: var(--bg-light);">
        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <p>UNCOMPROMISING STANDARDS</p>
            <h2>Quality You Can Trust</h2>
        </div>
        <div class="category-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
            <div class="cat-card" style="text-align: left; padding: 40px;">
                <i data-lucide="shield-check" size="40" style="color: var(--secondary); margin-bottom: 20px;"></i>
                <h4>Premium Materials</h4>
                <p style="font-size: 14px; color: var(--text-muted); margin-top: 10px;">We use medical-grade stainless steel and antimicrobial coatings for maximum hygiene.</p>
            </div>
            <div class="cat-card" style="text-align: left; padding: 40px;">
                <i data-lucide="microscope" size="40" style="color: var(--secondary); margin-bottom: 20px;"></i>
                <h4>Rigorous Testing</h4>
                <p style="font-size: 14px; color: var(--text-muted); margin-top: 10px;">Every product undergoes durability and stress tests before leaving our Indore factory.</p>
            </div>
            <div class="cat-card" style="text-align: left; padding: 40px;">
                <i data-lucide="user-check" size="40" style="color: var(--secondary); margin-bottom: 20px;"></i>
                <h4>Ergonomic Design</h4>
                <p style="font-size: 14px; color: var(--text-muted); margin-top: 10px;">Our clinical designs are optimized for both nurse efficiency and patient comfort.</p>
            </div>
        </div>
    </section>

    <!-- Milestones That Define Us Section -->
    <section class="milestones" style="padding: 100px 5%; background: var(--white);">
        <div class="section-header">
            <p>OUR JOURNEY</p>
            <h2>Milestones That Define Us</h2>
        </div>
        <div class="timeline" style="max-width: 800px; margin: 60px auto; position: relative;">
            <!-- Timeline Line -->
            <div class="timeline-line" style="position: absolute; left: 50%; top: 0; bottom: 0; width: 2px; background: #e2e8f0; transform: translateX(-50%);"></div>
            
            <div class="milestone-item" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
                <div style="width: 45%; text-align: right;">
                    <h4 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 5px;">2004</h4>
                    <p>Foundation of A One Hospicare in Indore.</p>
                </div>
                <div class="timeline-dot" style="width: 20px; height: 20px; background: var(--secondary); border-radius: 50%; z-index: 2; border: 4px solid white;"></div>
                <div style="width: 45%;"></div>
            </div>

            <div class="milestone-item" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
                <div style="width: 45%;"></div>
                <div class="timeline-dot" style="width: 20px; height: 20px; background: var(--primary); border-radius: 50%; z-index: 2; border: 4px solid white;"></div>
                <div style="width: 45%; text-align: left;">
                    <h4 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 5px;">2010</h4>
                    <p>First major hospital contract for 200+ ICU beds.</p>
                </div>
            </div>

            <div class="milestone-item" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
                <div style="width: 45%; text-align: right;">
                    <h4 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 5px;">2018</h4>
                    <p>Awarded ISO 9001:2015 Quality Certification.</p>
                </div>
                <div class="timeline-dot" style="width: 20px; height: 20px; background: var(--secondary); border-radius: 50%; z-index: 2; border: 4px solid white;"></div>
                <div style="width: 45%;"></div>
            </div>

            <div class="milestone-item" style="display: flex; justify-content: space-between; align-items: center;">
                <div style="width: 45%;"></div>
                <div class="timeline-dot" style="width: 20px; height: 20px; background: var(--primary); border-radius: 50%; z-index: 2; border: 4px solid white;"></div>
                <div style="width: 45%; text-align: left;">
                    <h4 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 5px;">Present</h4>
                    <p>Distributing premium furniture to hospitals PAN India.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
