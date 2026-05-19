@extends('layouts.app')

@section('title', "A One Hospicare | Premium Hospital Furniture & Medical Equipment Manufacturer")
@section('meta_description', "A One Hospicare is Indore's leading manufacturer of premium hospital furniture, ICU beds, OT tables, and medical equipment. High-quality products at direct factory prices.")
@section('meta_keywords', "hospital furniture manufacturer Indore, medical equipment supplier India, hospital beds factory, ICU beds manufacturer, OT tables supplier, A One Hospicare Indore")

@section('schema')
    <script type="application/ld+json">
                    {
                      "@@context": "https://schema.org",
                      "@@type": "LocalBusiness",
                      "name": "A One Hospicare",
                      "image": "{{ asset('assets/images/factory-front.jpg') }}",
                      "@@id": "{{ url('/') }}",
                      "url": "{{ url('/') }}",
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
                        "latitude": 22.6761,
                        "longitude": 75.9185
                      },
                      "openingHoursSpecification": {
                        "@@type": "OpeningHoursSpecification",
                        "dayOfWeek": [
                          "Monday",
                          "Tuesday",
                          "Wednesday",
                          "Thursday",
                          "Friday",
                          "Saturday"
                        ],
                        "opens": "09:00",
                        "closes": "18:00"
                      }
                    }
                    </script>
    <script type="application/ld+json">
                    {
                      "@@context": "https://schema.org",
                      "@@type": "FAQPage",
                      "mainEntity": [
                        {
                          "@@type": "Question",
                          "name": "What types of medical furniture do you manufacture?",
                          "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "We manufacture a comprehensive range of hospital furniture including ICU patient beds (manual and electric), ward furniture, examination tables, hospital trolleys, OT tables, and patient transfer solutions."
                          }
                        },
                        {
                          "@@type": "Question",
                          "name": "Do you provide PAN India delivery?",
                          "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes, we have a robust logistics network that enables us to deliver medical furniture across all states in India, ensuring safe and timely delivery."
                          }
                        },
                        {
                          "@@type": "Question",
                          "name": "Are your products ISO certified?",
                          "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Absolutely. A One Hospicare is an ISO-certified manufacturer. Our production processes adhere to strict quality management standards."
                          }
                        },
                        {
                          "@@type": "Question",
                          "name": "Do you offer customization for hospital furniture?",
                          "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes, we offer customization options in terms of dimensions, color, and specific features to match your facility's requirements."
                          }
                        },
                        {
                          "@@type": "Question",
                          "name": "How can I get a bulk order quote?",
                          "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "For institutional or bulk orders, you can use the 'Get Bulk Quote' button in the cart or call us at +91 98260 64152."
                          }
                        }
                      ]
                    }
                    </script>
@endsection

@push('styles')
    <style>
        .p-card {
            background: white;
            border-radius: 25px;
            border: 1px solid #f1f5f9;
            padding: 15px;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .p-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border-color: var(--secondary);
        }

        .p-img-container {
            background: #f8fafc;
            border-radius: 18px;
            /*height: 240px;*/
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }

        .p-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 77, 64, 0.4);
            backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            opacity: 0;
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }

        .p-card:hover .p-overlay {
            opacity: 1;
        }

        .overlay-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            text-decoration: none;
            transition: 0.3s;
            transform: translateY(20px);
        }

        .p-card:hover .overlay-icon {
            transform: translateY(0);
        }

        .p-card:hover .overlay-icon:nth-child(2) {
            transition-delay: 0.1s;
        }

        .overlay-icon:hover {
            background: var(--secondary);
            color: white;
            transform: scale(1.1) !important;
        }

        .buy-btn-premium {
            width: 100%;
            height: 52px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 800;
            font-size: 14px;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: 0.3s;
            cursor: pointer;
            margin-top: 15px;
        }

        .buy-btn-premium:hover {
            background: var(--secondary);
            box-shadow: 0 10px 20px rgba(45, 212, 191, 0.2);
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div
                style="background: rgba(255,255,255,0.1); display: inline-block; padding: 5px 15px; border-radius: 50px; font-size: 14px; margin-bottom: 15px;">
                <i data-lucide="shield-check" size="16" style="vertical-align: middle;"></i> Trusted Medical Equipment
                Manufacturer
            </div>
            <h1>Premium Medical Furniture & Equipment <span>Manufacturer in Indore</span></h1>
            <p>Quality, reliability, and precision. We provide state-of-the-art medical furniture designed for the best
                patient care and institutional excellence.</p>
            <div class="hero-btns">
                <a href="/products" class="btn btn-primary">Browse Products</a>
                <a href="#inquiry" class="btn btn-outline">Get Quick Quote</a>
            </div>
        </div>
        <div class="hero-image">
            <!-- <img src="{{ asset('assets/images/hero_equipment.png') }}" alt="Medical Equipment Showcase"> -->
            <!-- <div
                                                    style="position: absolute; bottom: 20px; right: 20px; background: white; padding: 15px; border-radius: 15px; box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: 10px; color: var(--primary);">
                                                    <div
                                                        style="background: var(--secondary); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                        <i data-lucide="percent" size="18"></i>
                                                    </div>
                                                    <div>
                                                        <p style="font-weight: 700; font-size: 14px;">Direct Factory</p>
                                                        <p style="font-size: 12px; color: var(--text-muted);">Best Price Guarantee</p>
                                                    </div>
                                                </div> -->
        </div>
    </section>

    <!-- Categories -->
    <section class="categories">
        <div class="section-header">
            <p>BROWSE CATEGORIES</p>
            <h2>Hospital-Grade Furniture Categories</h2>
            <p>Professional solutions for every medical department and clinical need.</p>
        </div>
        <div class="cat-slider-container" style="position: relative; overflow: hidden; padding: 20px 0;">
            <div class="cat-slider-track" id="catTrack" style="display: flex; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1); gap: 20px;">
                @forelse($categories as $category)
                    <div class="cat-slide" style="flex: 0 0 calc(25% - 15px); min-width: 0;">
                        <a href="/products?category={{ $category->slug }}" style="text-decoration: none; color: inherit; display: block;">
                            <div class="cat-card" style="margin: 0; width: 100%; box-sizing: border-box;">
                                <div class="cat-img">
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                    @else
                                        <div style="height: 100%; display: flex; align-items: center; justify-content: center; background: #f8fafc; color: #cbd5e0;">
                                            <i data-lucide="image" size="48"></i>
                                        </div>
                                    @endif
                                </div>
                                <h4>{{ $category->name }}</h4>
                                <p style="font-size: 12px; color: var(--text-muted); margin-top: 5px;">{{ $category->products_count }} Products</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p style="text-align: center; width: 100%; padding: 40px; color: #94a3b8;">No medical categories available at the moment.</p>
                @endforelse
            </div>

            <!-- Slider Dots -->
            <div class="cat-dots" id="catDots" style="display: flex; justify-content: center; gap: 10px; margin-top: 40px;">
                <!-- Dots will be generated via JS -->
            </div>
        </div>
    </section>

    <!-- Best Selling Products -->
    <section class="products">
        <div class="section-header">
            <p>CUSTOMER FAVORITES</p>
            <h2>Best Selling Hospital Furnitures</h2>
        </div>
        <div class="product-grid">
            @forelse($bestSellers as $product)
                <div class="p-card">
                    @if($product->is_bestseller)
                        <div
                            style="position: absolute; top: 25px; left: 25px; background: #fbbf24; color: #78350f; padding: 4px 12px; border-radius: 20px; font-size: 10px; font-weight: 800; z-index: 5; box-shadow: 0 4px 10px rgba(251, 191, 36, 0.3); display: flex; align-items: center; gap: 5px;">
                            <i data-lucide="star" size="10"></i> BEST SELLER
                        </div>
                    @endif
                    <div class="p-img-container">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="width: 100%;" />
                        @else
                            <div style="color: #cbd5e0;"><i data-lucide="image" size="48"></i></div>
                        @endif

                        <div class="p-overlay">
                            <a href="/product/{{ $product->slug }}" class="overlay-icon" title="View Details">
                                <i data-lucide="eye" size="20"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="addToCart({{ $product->id }})" class="overlay-icon"
                                title="Add to Cart">
                                <i data-lucide="shopping-cart" size="20"></i>
                            </a>
                        </div>
                    </div>

                    <div style="flex-grow: 1; padding: 10px 5px 0;">
                        <span
                            style="color: var(--secondary); font-size: 10px; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 8px; display: block;">{{ $product->category->name }}</span>
                        <h3
                            style="color: var(--primary); font-size: 1.1rem; font-weight: 700; margin-bottom: 8px; line-height: 1.4; min-height: 2.8rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            <a href="/product/{{ $product->slug }}"
                                style="color: inherit; text-decoration: none;">{{ $product->title }}</a>
                        </h3>
                        <p style="font-size: 1.6rem; color: var(--primary); font-weight: 900; margin-bottom: 0px;">
                            ₹{{ number_format($product->price, 0) }}</p>
                        <p style="font-size: 11px; color: #64748b; font-weight: 600; margin-bottom: 5px;">
                            exclusive of GST with {{ $product->gst_percentage }}%
                        </p>
                        <p
                            style="font-size: 12px; color: #059669; font-weight: 800; display: flex; align-items: center; gap: 5px;">
                            <i data-lucide="truck" size="14"></i> FREE SHIPPING
                        </p>
                    </div>

                    <button class="buy-btn-premium" onclick="buyNow({{ $product->id }})">
                        <i data-lucide="zap" size="18"></i> BUY NOW
                    </button>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1/-1; padding: 40px; color: #94a3b8;">New medical equipment coming
                    soon!</p>
            @endforelse
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <a href="/products" class="btn btn-outline" style="border-color: var(--primary); color: var(--primary);">View
                All
                Products <i data-lucide="arrow-right" size="18" style="vertical-align: middle;"></i></a>
        </div>
    </section>

    <!-- Marketplace Hubs / Internal Linking -->
    <section class="marketplace-hubs" style="padding: 100px 5%; background: #f8fafc;">
        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <p
                style="color: var(--secondary); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 13px;">
                OUR PAN-INDIA PRESENCE</p>
            <h2 style="font-size: 2.5rem; color: var(--primary); margin-top: 10px;">Regional Manufacturing Hubs</h2>
            <p style="max-width: 700px; margin: 20px auto; color: var(--text-muted);">Explore our specialized manufacturing
                and distribution centers across India, providing premium hospital furniture at factory prices.</p>
        </div>

        @php
            $hubs = [
                ['name' => 'Indore', 'slug' => 'indore'],
                ['name' => 'Mumbai', 'slug' => 'mumbai'],
                ['name' => 'Bhopal', 'slug' => 'bhopal'],
                ['name' => 'Ahmedabad', 'slug' => 'ahmedabad'],
                ['name' => 'Pune', 'slug' => 'pune'],
                ['name' => 'Nagpur', 'slug' => 'nagpur'],
                ['name' => 'Gwalior', 'slug' => 'gwalior'],
                ['name' => 'Raipur', 'slug' => 'raipur'],
            ];
            $hub_products = [
                ['name' => 'ICU Beds', 'prefix' => 'icu-patient-beds'],
                ['name' => 'Ward Furniture', 'prefix' => 'ward-furniture'],
                ['name' => 'Exam Tables', 'prefix' => 'examination-tables'],
            ];
        @endphp

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            @foreach($hubs as $hub)
                <div
                    style="background: white; padding: 30px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <div
                            style="width: 45px; height: 45px; background: rgba(0, 77, 64, 0.05); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--primary);">
                            <i data-lucide="map-pin" size="20"></i>
                        </div>
                        <h4 style="font-size: 1.2rem; color: var(--primary); margin: 0;">{{ $hub['name'] }} Hub</h4>
                    </div>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach($hub_products as $hp)
                            <li style="margin-bottom: 12px;">
                                <a href="{{ route('promotion.detail', $hp['prefix'] . '-manufacturer-in-' . $hub['slug']) }}"
                                    style="display: flex; align-items: center; justify-content: space-between; text-decoration: none; color: #64748b; font-size: 14px; transition: all 0.3s ease;"
                                    onmouseover="this.style.color='var(--primary)'; this.style.paddingLeft='5px';"
                                    onmouseout="this.style.color='#64748b'; this.style.paddingLeft='0';">
                                    <span>{{ $hp['name'] }} in {{ $hub['name'] }}</span>
                                    <i data-lucide="chevron-right" size="14" style="opacity: 0.5;"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="/marketplace"
                        style="display: block; margin-top: 20px; font-size: 13px; font-weight: 700; color: var(--secondary); text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px;">
                        View All Hubs <i data-lucide="arrow-right" size="14" style="vertical-align: middle;"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Our Process Section -->
    <section class="process-section"
        style="padding: 100px 5%; background: var(--white); position: relative; overflow: hidden;">
        <div class="section-header" style="text-align: center; margin-bottom: 80px;">
            <p
                style="color: var(--secondary); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 13px;">
                OUR STEP</p>
            <h2 style="font-size: 3rem; color: var(--primary); margin-top: 10px; font-weight: 800;">Our Working Best Process
            </h2>
        </div>

        <div class="process-container" style="position: relative; max-width: 1200px; margin: 0 auto;">
            <!-- Curved Connector (SVG) -->
            <svg style="position: absolute; top: 110px; left: 0; width: 100%; height: 100px; z-index: 1; pointer-events: none;"
                viewBox="0 0 1200 100" fill="none" class="process-line">
                <path d="M150,50 Q300,0 600,50 T1050,50" stroke="#e2e8f0" stroke-width="2" stroke-dasharray="8 8"
                    fill="none" />
            </svg>

            <div
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; position: relative; z-index: 2;">
                <!-- Step 1 -->
                <div class="process-step" style="text-align: center;">
                    <div style="position: relative; width: 220px; height: 220px; margin: 0 auto 30px;">
                        <div
                            style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; border: 8px solid white; box-shadow: var(--shadow-lg);">
                            <img src="{{ asset('assets/images/process_step_1.png') }}" alt="Requirement Analysis"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div
                            style="position: absolute; top: 0; left: 0; width: 45px; height: 45px; background: var(--secondary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; box-shadow: 0 4px 10px rgba(0, 191, 165, 0.3);">
                            01</div>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--primary); margin-bottom: 15px; font-weight: 700;">Requirement
                        Analysis</h3>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6; padding: 0 10px;">We begin by
                        understanding your facility's specific clinical needs and spatial constraints.</p>
                </div>

                <!-- Step 2 -->
                <div class="process-step" style="text-align: center; margin-top: 40px;">
                    <div style="position: relative; width: 220px; height: 220px; margin: 0 auto 30px;">
                        <div
                            style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; border: 8px solid white; box-shadow: var(--shadow-lg);">
                            <img src="{{ asset('assets/images/process_step_2.png') }}" alt="Design & Engineering"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div
                            style="position: absolute; top: 0; left: 0; width: 45px; height: 45px; background: var(--secondary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; box-shadow: 0 4px 10px rgba(0, 191, 165, 0.3);">
                            02</div>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--primary); margin-bottom: 15px; font-weight: 700;">Design &
                        Engineering</h3>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6; padding: 0 10px;">Our engineers
                        draft precision blueprints ensuring ergonomic perfection and durability.</p>
                </div>

                <!-- Step 3 -->
                <div class="process-step" style="text-align: center;">
                    <div style="position: relative; width: 220px; height: 220px; margin: 0 auto 30px;">
                        <div
                            style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; border: 8px solid white; box-shadow: var(--shadow-lg);">
                            <img src="{{ asset('assets/images/process_step_3.png') }}" alt="Manufacturing"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div
                            style="position: absolute; top: 0; left: 0; width: 45px; height: 45px; background: var(--secondary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; box-shadow: 0 4px 10px rgba(0, 191, 165, 0.3);">
                            03</div>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--primary); margin-bottom: 15px; font-weight: 700;">Advanced
                        Manufacturing</h3>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6; padding: 0 10px;">In-house
                        production at our Indore facility using high-grade materials and machinery.</p>
                </div>

                <!-- Step 4 -->
                <div class="process-step" style="text-align: center; margin-top: 40px;">
                    <div style="position: relative; width: 220px; height: 220px; margin: 0 auto 30px;">
                        <div
                            style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; border: 8px solid white; box-shadow: var(--shadow-lg);">
                            <img src="{{ asset('assets/images/process_step_4.png') }}" alt="Quality Check"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div
                            style="position: absolute; top: 0; left: 0; width: 45px; height: 45px; background: var(--secondary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; box-shadow: 0 4px 10px rgba(0, 191, 165, 0.3);">
                            04</div>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--primary); margin-bottom: 15px; font-weight: 700;">Quality &
                        Delivery</h3>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6; padding: 0 10px;">Final rigorous
                        testing followed by secure PAN India distribution to your doorstep.</p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 80px;">
            <a href="#inquiry" class="btn btn-primary"
                style="padding: 18px 45px; font-size: 15px; letter-spacing: 1px; box-shadow: 0 15px 30px rgba(0, 191, 165, 0.2);">GET
                A CUSTOM QUOTE <i data-lucide="arrow-right" size="18"
                    style="vertical-align: middle; margin-left: 10px;"></i></a>
        </div>
    </section>

    <!-- Advantage Section -->


    <section class="advantage">
        <div class="adv-left">
            <h2 style="font-size: 2.5rem; margin-bottom: 20px;">The Indore Factory Advantage</h2>
            <p style="margin-bottom: 30px; opacity: 0.8;">We manufacture our equipment in-house, ensuring the highest
                standards of quality control and cost-effectiveness. Our state-of-the-art facility in Indore, Madhya Pradesh
                serves the entire nation.</p>
            <ul style="list-style: none; margin-bottom: 40px;">
                <li style="margin-bottom: 15px;"><i data-lucide="check-circle" size="20"
                        style="color: var(--accent); margin-right: 10px;"></i> Direct Manufacturer Pricing</li>
                <li style="margin-bottom: 15px;"><i data-lucide="check-circle" size="20"
                        style="color: var(--accent); margin-right: 10px;"></i> Custom Solutions Available</li>
                <li style="margin-bottom: 15px;"><i data-lucide="check-circle" size="20"
                        style="color: var(--accent); margin-right: 10px;"></i> ISO Certified Quality Assurance</li>
            </ul>
            <a href="/contact" class="btn btn-primary">Visit Our Factory</a>
        </div>
        <div class="adv-right">
            <div class="adv-card">
                <h3>500+</h3>
                <p>Hospital Projects</p>
            </div>
            <div class="adv-card">
                <h3>20 yrs</h3>
                <p>Experience</p>
            </div>
            <div class="adv-card">
                <h3>5000+</h3>
                <p>Installations</p>
            </div>
            <div class="adv-card">
                <h3>PAN India</h3>
                <p>Distribution</p>
            </div>
        </div>
    </section>

    <!-- Company Profile / Business Overview -->
    <section class="company-profile" style="padding: 100px 5%; background: #f8fafc;">
        <div class="profile-container"
            style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1.5fr; gap: 80px; align-items: center;">
            <div class="profile-text">
                <p
                    style="color: var(--secondary); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 13px; margin-bottom: 15px;">
                    WELCOME TO</p>
                <h2
                    style="font-size: 3rem; color: var(--primary); font-weight: 900; margin-bottom: 25px; line-height: 1.1;">
                    A One Hospicare</h2>
                <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.8; margin-bottom: 30px;">
                    A One Hospicare is one of the leading manufacturer of <strong>3 Seat Bench, Hospital Examination Couch
                        Table, Baby Cradle With Cushion, Hospital Almira, Hospital Bed, Oxygen Cylinders, Stainless Steel
                        Stool</strong> and many more. We are committed to delivering excellence in healthcare infrastructure
                    through innovation and precision manufacturing.
                </p>
                <p
                    style="color: var(--primary); font-weight: 700; font-size: 14px; margin-bottom: 30px; letter-spacing: 1px;">
                    GET IN TOUCH WITH US FOR BEST DEALS</p>
                <a href="#inquiry" class="btn btn-primary"
                    style="padding: 18px 40px; border-radius: 12px; box-shadow: 0 10px 20px rgba(0, 77, 64, 0.15);">Contact
                    Us <i data-lucide="phone-call" size="18" style="vertical-align: middle; margin-left: 10px;"></i></a>
            </div>

            <div class="profile-stats-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 25px;">
                <!-- Business Info Card 1 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="briefcase" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Nature of Business</p>
                        <h4 style="font-size: 1.1rem; color: var(--primary); margin: 5px 0 0; font-weight: 700;">
                            Manufacturer</h4>
                    </div>
                </div>

                <!-- Business Info Card 2 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="users" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Total Employees</p>
                        <h4 style="font-size: 1.1rem; color: var(--primary); margin: 5px 0 0; font-weight: 700;">51 to 100
                            People</h4>
                    </div>
                </div>

                <!-- Business Info Card 3 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="calendar" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            GST Reg. Date</p>
                        <h4 style="font-size: 1.1rem; color: var(--primary); margin: 5px 0 0; font-weight: 700;">01-07-2017
                        </h4>
                    </div>
                </div>

                <!-- Business Info Card 4 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="scale" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Legal Status</p>
                        <h4 style="font-size: 1.1rem; color: var(--primary); margin: 5px 0 0; font-weight: 700;">
                            Proprietorship</h4>
                    </div>
                </div>

                <!-- Business Info Card 5 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="trending-up" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Annual Turnover</p>
                        <h4 style="font-size: 1.1rem; color: var(--primary); margin: 5px 0 0; font-weight: 700;">1.5 - 5 Cr
                        </h4>
                    </div>
                </div>

                <!-- Business Info Card 6 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="file-text" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            GST Number</p>
                        <h4
                            style="font-size: 0.95rem; color: var(--primary); margin: 5px 0 0; font-weight: 700; word-break: break-all;">
                            23AMPPH9600J1ZX</h4>
                    </div>
                </div>

                <!-- Business Info Card 7 -->
                <div
                    style="background: white; padding: 25px; border-radius: 20px; box-shadow: var(--shadow-sm); border: 1px solid #eef2f6; display: flex; align-items: center; gap: 20px;">
                    <div
                        style="width: 55px; height: 55px; background: rgba(0, 191, 165, 0.1); color: var(--secondary); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="globe" size="28"></i>
                    </div>
                    <div>
                        <p
                            style="font-size: 12px; color: var(--text-muted); margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            IEC Code</p>
                        <h4 style="font-size: 1.1rem; color: var(--primary); margin: 5px 0 0; font-weight: 700;">AMPPH9600J
                        </h4>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Clients Review -->
    <section class="testimonials">
        <div class="section-header">
            <p>TESTIMONIALS</p>
            <h2>What Our Clients Say</h2>
        </div>
        <div class="rev-slider">
            <div class="rev-track" id="revTrack">
                @foreach($testimonials as $test)
                    <div class="rev-card">
                        @if($test->image)
                            <img src="{{ asset('storage/' . $test->image) }}" class="rev-avatar">
                        @else
                            <div class="rev-avatar"
                                style="background: var(--primary); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 24px;">
                                {{ substr($test->name, 0, 1) }}
                            </div>
                        @endif
                        <p class="rev-text">"{{ $test->content }}"</p>
                        <h4 class="rev-author">{{ $test->name }}</h4>
                        <p class="rev-role">{{ $test->role }}</p>
                    </div>
                @endforeach
            </div>
            <div class="rev-dots">
                @foreach($testimonials as $index => $test)
                    <div class="dot {{ $index == 0 ? 'active' : '' }}" onclick="moveSlider({{ $index }})"></div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" style="padding: 100px 5%; background: var(--white);">
        <div class="section-header">
            <p
                style="color: var(--secondary); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 13px;">
                HAVE QUESTIONS?</p>
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common queries about our medical equipment and services.</p>
        </div>

        <div class="faq-container" style="max-width: 900px; margin: 0 auto;">
            <div class="faq-item"
                style="margin-bottom: 20px; border-radius: 15px; border: 1px solid #eef2f6; overflow: hidden; transition: all 0.3s ease;">
                <div class="faq-question"
                    style="padding: 25px; background: #f8fafc; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 700; color: var(--primary);"
                    onclick="toggleFaq(this)">
                    <span>What types of medical furniture do you manufacture?</span>
                    <i data-lucide="plus" size="18" class="faq-icon"></i>
                </div>
                <div class="faq-answer"
                    style="max-height: 0; overflow: hidden; transition: all 0.4s cubic-bezier(0, 1, 0, 1); padding: 0 25px; color: var(--text-muted); line-height: 1.8;">
                    <div style="padding: 20px 0;">
                        We manufacture a comprehensive range of hospital furniture including ICU patient beds (manual and
                        electric), ward furniture, examination tables, hospital trolleys, OT tables, and patient transfer
                        solutions. All our products are designed for durability and patient comfort.
                    </div>
                </div>
            </div>

            <div class="faq-item"
                style="margin-bottom: 20px; border-radius: 15px; border: 1px solid #eef2f6; overflow: hidden; transition: all 0.3s ease;">
                <div class="faq-question"
                    style="padding: 25px; background: #f8fafc; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 700; color: var(--primary);"
                    onclick="toggleFaq(this)">
                    <span>Do you provide PAN India delivery?</span>
                    <i data-lucide="plus" size="18" class="faq-icon"></i>
                </div>
                <div class="faq-answer"
                    style="max-height: 0; overflow: hidden; transition: all 0.4s cubic-bezier(0, 1, 0, 1); padding: 0 25px; color: var(--text-muted); line-height: 1.8;">
                    <div style="padding: 20px 0;">
                        Yes, we have a robust logistics network that enables us to deliver medical furniture across all
                        states in India. From major cities like Mumbai and Pune to remote locations, we ensure safe and
                        timely delivery of our equipment.
                    </div>
                </div>
            </div>

            <div class="faq-item"
                style="margin-bottom: 20px; border-radius: 15px; border: 1px solid #eef2f6; overflow: hidden; transition: all 0.3s ease;">
                <div class="faq-question"
                    style="padding: 25px; background: #f8fafc; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 700; color: var(--primary);"
                    onclick="toggleFaq(this)">
                    <span>Are your products ISO certified?</span>
                    <i data-lucide="plus" size="18" class="faq-icon"></i>
                </div>
                <div class="faq-answer"
                    style="max-height: 0; overflow: hidden; transition: all 0.4s cubic-bezier(0, 1, 0, 1); padding: 0 25px; color: var(--text-muted); line-height: 1.8;">
                    <div style="padding: 20px 0;">
                        Absolutely. A One Hospicare is an ISO-certified manufacturer. Our production processes adhere to
                        strict quality management standards, ensuring that every piece of furniture meets the rigorous
                        requirements of healthcare institutions.
                    </div>
                </div>
            </div>

            <div class="faq-item"
                style="margin-bottom: 20px; border-radius: 15px; border: 1px solid #eef2f6; overflow: hidden; transition: all 0.3s ease;">
                <div class="faq-question"
                    style="padding: 25px; background: #f8fafc; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 700; color: var(--primary);"
                    onclick="toggleFaq(this)">
                    <span>Do you offer customization for hospital furniture?</span>
                    <i data-lucide="plus" size="18" class="faq-icon"></i>
                </div>
                <div class="faq-answer"
                    style="max-height: 0; overflow: hidden; transition: all 0.4s cubic-bezier(0, 1, 0, 1); padding: 0 25px; color: var(--text-muted); line-height: 1.8;">
                    <div style="padding: 20px 0;">
                        Yes, we understand that different hospitals have unique needs. We offer customization options in
                        terms of dimensions, color, and specific features to match your facility's requirements. Please
                        contact our experts to discuss your custom needs.
                    </div>
                </div>
            </div>

            <div class="faq-item"
                style="margin-bottom: 20px; border-radius: 15px; border: 1px solid #eef2f6; overflow: hidden; transition: all 0.3s ease;">
                <div class="faq-question"
                    style="padding: 25px; background: #f8fafc; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 700; color: var(--primary);"
                    onclick="toggleFaq(this)">
                    <span>How can I get a bulk order quote?</span>
                    <i data-lucide="plus" size="18" class="faq-icon"></i>
                </div>
                <div class="faq-answer"
                    style="max-height: 0; overflow: hidden; transition: all 0.4s cubic-bezier(0, 1, 0, 1); padding: 0 25px; color: var(--text-muted); line-height: 1.8;">
                    <div style="padding: 20px 0;">
                        For institutional or bulk orders, you can use the "Get Bulk Quote" button in the cart, fill out the
                        inquiry form below, or directly call us at +91 98260 64152. We offer special competitive pricing for
                        large-scale hospital projects.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Inquiry Form -->

    <section class="inquiry-section" id="inquiry">
        <div class="inquiry-container">
            <div class="inquiry-info">
                <span class="tag">GET IN TOUCH</span>
                <h2>Get a Customized Quote for Your Facility</h2>
                <p>Looking for a bulk order or custom configurations? Our medical infrastructure experts are ready to
                    provide a tailored solution that fits your exact clinical requirements and budget.</p>

                <div class="contact-card">
                    <div class="c-icon"><i data-lucide="phone-call"></i></div>
                    <div class="c-details">
                        <p>Talk to an Expert</p>
                        <h5>+91 98260 64152</h5>
                    </div>
                </div>

                <div class="trust-pill">
                    <i data-lucide="shield-check" size="16"></i> Verified Manufacturer • ISO Certified
                </div>
            </div>
            <div class="inquiry-form-card">
                @if(session('success'))
                    <div
                        style="background: #f0fdf4; color: #166534; padding: 20px; border-radius: 15px; margin-bottom: 25px; font-weight: 600; border: 1px solid #dcfce7;">
                        <i data-lucide="check-circle" size="18" style="vertical-align: middle; margin-right: 8px;"></i>
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('inquiry.send') }}" method="POST" id="homepageInquiryForm">
                    @csrf
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" required placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="john@hospital.com">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="+91 00000 00000">
                    </div>
                    <div class="form-group">
                        <label>Interested Category</label>
                        <select name="subject">
                            <option value="ICU/OT Beds">ICU/OT Beds</option>
                            <option value="Examination Tables">Examination Tables</option>
                            <option value="Hospital Furniture">Hospital Furniture</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label>Message</label>
                        <textarea name="message" required placeholder="Describe your requirement..."></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-primary full-width">Submit Inquiry</button>
                    <div id="formResponse" class="full-width" style="margin-top: 15px; display: none;"></div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Review Slider Logic
        let currentSlide = 0;
        const track = document.getElementById('revTrack');
        const dots = document.querySelectorAll('.dot');

        function moveSlider(index) {
            currentSlide = index;
            if (track) {
                track.style.transform = `translateX(-${index * 100}%)`;
                dots.forEach(d => d.classList.remove('active'));
                dots[index].classList.add('active');
            }
        }

        // AJAX Form Submission
        const inquiryForm = document.getElementById('homepageInquiryForm');
        const responseDiv = document.getElementById('formResponse');
        const submitBtn = document.getElementById('submitBtn');

        if (inquiryForm) {
            inquiryForm.addEventListener('submit', function (e) {
                e.preventDefault();
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Sending...';

                const formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            responseDiv.style.display = 'block';
                            responseDiv.innerHTML = `<div style="background: #f0fdf4; color: #166534; padding: 15px; border-radius: 12px; border: 1px solid #dcfce7; font-weight: 600;"><i data-lucide="check-circle" size="18" style="vertical-align: middle; margin-right: 8px;"></i> ${data.message}</div>`;
                            if (typeof lucide !== 'undefined') lucide.createIcons();
                            inquiryForm.reset();
                            submitBtn.innerHTML = 'Submit Inquiry';
                            submitBtn.disabled = false;

                            // Scroll to message
                            responseDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Submit Inquiry';
                    });
            });
        }

        if (dots.length > 0) {
            setInterval(() => {
                currentSlide = (currentSlide + 1) % dots.length;
                moveSlider(currentSlide);
            }, 5000);
        }

        // FAQ Accordion Logic
        function toggleFaq(element) {
            const item = element.parentElement;
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');
            const isOpen = item.classList.contains('active');

            // Close all other items
            document.querySelectorAll('.faq-item').forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.faq-answer').style.maxHeight = '0';
                    otherItem.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
                    otherItem.style.borderColor = '#eef2f6';
                }
            });

            if (isOpen) {
                item.classList.remove('active');
                answer.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
                item.style.borderColor = '#eef2f6';
            } else {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.style.transform = 'rotate(45deg)';
                item.style.borderColor = 'var(--secondary)';
            }
        }

        // Category Slider Logic
        const catTrack = document.getElementById('catTrack');
        const catDotsContainer = document.getElementById('catDots');
        const catSlides = document.querySelectorAll('.cat-slide');
        let catCurrentSlide = 0;
        const catVisibleCards = window.innerWidth > 992 ? 4 : 1;
        const catTotalSteps = Math.ceil(catSlides.length / catVisibleCards);

        function initCatSlider() {
            if (catSlides.length <= catVisibleCards) {
                catDotsContainer.style.display = 'none';
                return;
            }

            for (let i = 0; i < catTotalSteps; i++) {
                const dot = document.createElement('div');
                dot.className = 'dot' + (i === 0 ? ' active' : '');
                dot.onclick = () => moveCatSlider(i);
                catDotsContainer.appendChild(dot);
            }
        }

        function moveCatSlider(step) {
            catCurrentSlide = step;
            const offset = step * (100); // 100% per step
            catTrack.style.transform = `translateX(-${offset}%)`;

            // Update dots
            const dots = catDotsContainer.querySelectorAll('.dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === step);
            });
        }

        initCatSlider();

        // Auto play
        if (catSlides.length > catVisibleCards) {
            setInterval(() => {
                catCurrentSlide = (catCurrentSlide + 1) % catTotalSteps;
                moveCatSlider(catCurrentSlide);
            }, 6000);
        }
    </script>
@endpush