@extends('layouts.app')

@section('title', 'Medical Fabrication Services | Hospital Furniture Customization')
@section('meta_description', 'A One Hospicare provides specialized medical fabrication services, hospital turnkey projects, and custom furniture solutions in Indore.')
@section('meta_keywords', 'medical fabrication services, hospital project consultancy, custom hospital furniture, medical equipment repair Indore, turnkey medical solutions')

@push('styles')
<style>
    @media (max-width: 992px) {
        .about-banner h1 { font-size: 2.5rem !important; }
        .services-main { padding: 60px 20px !important; }
    }

    @media (max-width: 480px) {
        .category-grid { grid-template-columns: 1fr !important; }
        .cat-card { padding: 30px 20px !important; }
        .about-banner h1 { font-size: 2rem !important; }
    }
</style>
@endpush

@section('content')
    <!-- Services Banner -->
    <section class="about-banner hero" style="min-height: 350px; background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); background-size: cover; background-position: center;">
        <div class="hero-content" style="text-align: center; margin: 0 auto;">
            <span class="tag" style="color: var(--secondary); font-weight: 700; letter-spacing: 2px;">WHAT WE DO</span>
            <h1 style="font-size: 3.5rem; margin-top: 20px;">Specialized <span>Hospital Fabrication</span> & Services</h1>
            <p style="margin: 20px auto; opacity: 0.9; max-width: 700px;">Beyond manufacturing, we provide end-to-end technical solutions and fabrication services for hospitals and emergency medical units.</p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-main" style="padding: 100px 5%; background: var(--bg-light);">
        <div class="category-grid" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            
            @foreach($services as $service)
            <div class="cat-card" style="text-align: left; padding: 40px; display: flex; flex-direction: column; height: 100%; border: 1px solid #e2e8f0; border-radius: 24px;">
                <div style="background: rgba(0, 77, 64, 0.1); width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                    @if($service->icon)
                    <i data-lucide="{{ $service->icon }}" size="32" style="color: var(--primary);"></i>
                    @else
                    <i data-lucide="shield" size="32" style="color: var(--primary);"></i>
                    @endif
                </div>
                @if($service->image)
                <div style="width: 100%; height: 180px; border-radius: 15px; overflow: hidden; margin-bottom: 20px;">
                    <img src="{{ asset('storage/' . $service->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @endif

                <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 15px;">{{ $service->title }}</h3>
                <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 20px; line-height: 1.6;">{{ $service->description }}</p>
                
                <div style="flex-grow: 1;"></div>
                
                <button onclick="openServiceEnquiryModal('{{ $service->title }}')" class="btn btn-primary" style="width: 100%; border-radius: 12px; padding: 15px; font-weight: 700; letter-spacing: 0.5px; border: 1px solid var(--primary);">Enquire Institutional Support</button>
            </div>
            @endforeach

        </div>
    </section>

    <!-- Custom Needs Section -->
    <section style="padding: 100px 5%; background: var(--white); text-align: center;">
        <div style="max-width: 800px; margin: 0 auto; background: #f8fafc; padding: 60px; border-radius: 30px; box-shadow: var(--shadow-sm);">
            <h2 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 20px;">Have a Custom Requirement?</h2>
            <p style="color: var(--text-muted); margin-bottom: 30px;">We specialize in turnkey fabrication projects for hospitals and clinics. Talk to our technical experts today for a tailored plan.</p>
            <a href="https://wa.me/919826064152" class="btn btn-primary" style="padding: 15px 40px;">Contact Technical Support</a>
        </div>
    </section>
@endsection
