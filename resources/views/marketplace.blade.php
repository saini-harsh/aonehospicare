@extends('layouts.app')

@section('title', 'Marketplace | A One Hospicare SEO Hub')
@section('meta_description', 'Explore our marketplace and partner network. Discover premium medical furniture deals and promotions across India.')
@section('meta_keywords', 'medical furniture marketplace, hospital equipment deals, A One Hospicare partners, medical equipment promotions')

@push('styles')
<style>
    @media (max-width: 992px) {
        .about-banner h1 { font-size: 2.5rem !important; }
        .marketplace-main { padding: 60px 20px !important; }
    }

    @media (max-width: 480px) {
        .category-grid { grid-template-columns: 1fr !important; }
        .cat-card { padding: 30px 20px !important; }
        .about-banner h1 { font-size: 2rem !important; }
    }
</style>
@endpush

@section('content')
    <!-- Marketplace Banner -->
    <section class="about-banner hero" style="min-height: 350px; background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); background-size: cover; background-position: center;">
        <div class="hero-content" style="text-align: center; margin: 0 auto;">
            <span class="tag" style="color: var(--secondary); font-weight: 700; letter-spacing: 2px;">OUR NETWORK</span>
            <h1 style="font-size: 3.5rem; margin-top: 20px;">A One Hospicare <span>Marketplace</span></h1>
            <p style="margin: 20px auto; opacity: 0.9; max-width: 700px;">Explore our dedicated promotion pages and discover the best deals on premium medical furniture and hospital equipment across different regions.</p>
        </div>
    </section>

    <!-- SEO Promotion Pages Grid -->
    <section class="marketplace-main" style="padding: 100px 5%; background: var(--bg-light);">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 20px;">Global Promotional Network</h2>
            <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">Browse our specialized manufacturing hubs categorized by product category and location.</p>
        </div>
        
        @php
            $products = [
                ['name' => 'ICU Patient Beds', 'slug_prefix' => 'icu-patient-beds', 'icon' => 'globe'],
                ['name' => 'Ward Furniture', 'slug_prefix' => 'ward-furniture', 'icon' => 'home'],
                ['name' => 'Examination Tables', 'slug_prefix' => 'examination-tables', 'icon' => 'award'],
                ['name' => 'Hospital Trolleys', 'slug_prefix' => 'hospital-trolleys', 'icon' => 'truck'],
            ];
            $locations = [
                'indore' => 'Indore', 'bhopal' => 'Bhopal', 'jabalpur' => 'Jabalpur', 
                'gwalior' => 'Gwalior', 'ujjain' => 'Ujjain', 'mumbai' => 'Mumbai', 
                'ahmedabad' => 'Ahmedabad', 'nagpur' => 'Nagpur', 'raipur' => 'Raipur', 'pune' => 'Pune'
            ];
        @endphp

        @foreach($products as $product)
        <div style="margin-bottom: 80px;">
            <h3 style="font-size: 2rem; color: var(--primary); margin-bottom: 30px; border-bottom: 3px solid var(--secondary); display: inline-block; padding-bottom: 10px;">{{ $product['name'] }} Hubs</h3>
            <div class="category-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
                @foreach($locations as $l_slug => $l_name)
                <div class="cat-card" style="text-align: left; padding: 30px; display: flex; flex-direction: column; height: 100%; border: 1px solid #e2e8f0; border-radius: 20px; background: white; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.05)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                    <div style="background: rgba(0, 77, 64, 0.05); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i data-lucide="{{ $product['icon'] }}" size="24" style="color: var(--primary);"></i>
                    </div>
                    
                    <h4 style="font-size: 1.25rem; color: var(--primary); margin-bottom: 10px;">{{ $product['name'] }} Manufacturer in {{ $l_name }}</h4>
                    <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 15px; line-height: 1.5;">Leading {{ $product['name'] }} manufacturer in {{ $l_name }}, providing premium medical equipment for hospitals.</p>
                    
                    <div style="flex-grow: 1;"></div>
                    
                    <a href="{{ route('promotion.detail', $product['slug_prefix'] . '-manufacturer-in-' . $l_slug) }}" class="btn btn-outline" style="width: 100%; border-radius: 10px; padding: 12px; font-weight: 700; font-size: 13px; letter-spacing: 0.5px; border-color: var(--primary); color: var(--primary); text-align: center; text-decoration: none;">View Promotion</a>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </section>

        </div>
    </section>

    <!-- Call to Action -->
    <section style="padding: 100px 5%; background: var(--white); text-align: center;">
        <div style="max-width: 800px; margin: 0 auto; background: #f8fafc; padding: 60px; border-radius: 30px; box-shadow: var(--shadow-sm);">
            <h2 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 20px;">Become a Partner?</h2>
            <p style="color: var(--text-muted); margin-bottom: 30px;">Join our expanding network of dealers, distributors, and institutional partners across India.</p>
            <a href="/contact" class="btn btn-primary" style="padding: 15px 40px;">Contact Us Today</a>
        </div>
    </section>
@endsection
