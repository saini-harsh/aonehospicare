@extends('layouts.app')

@section('title', 'Product Catalog | Hospital Furniture & Medical Equipment Factory')
@section('meta_description', 'Explore our wide range of hospital furniture including ICU beds, OT tables, and patient monitors. Direct factory prices from A One Hospicare Indore.')
@section('meta_keywords', 'buy hospital furniture, medical equipment price list, ICU beds for sale, OT tables manufacturer, patient beds Indore, medical furniture catalog')

@push('styles')
    <style>
        .catalog-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            padding: 50px 5%;
            background: #f8fafc;
        }

        /* Sidebar Styles */
        .sidebar-widget {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 25px;
            position: sticky;
            top: 100px;
        }

        .widget-title {
            color: var(--primary);
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-list {
            list-style: none;
        }

        .filter-item {
            margin-bottom: 12px;
        }

        .filter-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 10px;
            transition: var(--transition);
        }

        .filter-link:hover,
        .filter-link.active {
            background: rgba(0, 77, 64, 0.05);
            color: var(--primary);
            font-weight: 600;
        }

        .count {
            background: #f1f5f9;
            color: var(--text-muted);
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 20px;
        }

        /* Product Grid Styles */
        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            transition: var(--transition);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .product-image {
            height: 250px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--secondary);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .product-info {
            padding: 25px;
        }

        .product-cat {
            font-size: 12px;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .product-title {
            color: var(--primary);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .product-price {
            font-size: 1.3rem;
            color: var(--primary);
            font-weight: 800;
            margin-bottom: 20px;
        }

        .mobile-filter-btn {
            display: none;
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            width: 100%;
            font-weight: 600;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .search-widget-form {
            position: relative;
            margin-bottom: 5px;
        }

        .search-widget-form input {
            width: 100%;
            padding: 12px 15px;
            padding-right: 40px;
            border: 1px solid #eef2f6;
            border-radius: 12px;
            font-size: 14px;
            outline: none;
            transition: var(--transition);
            background: #f8fafc;
        }

        .search-widget-form input:focus {
            border-color: var(--secondary);
            background: white;
            box-shadow: 0 0 0 4px rgba(0, 191, 165, 0.05);
        }

        .search-widget-form button {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .search-widget-form button:hover {
            color: var(--primary);
        }

        /* New Product Card Overlay Styles */
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
            height: 272px;
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

        @media (max-width: 992px) {

            .catalog-layout {
                grid-template-columns: 1fr;
            }

            .sidebar-container {
                display: none;
            }

            .sidebar-container.active {
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1000;
                background: rgba(0, 0, 0, 0.5);
                padding: 50px 5%;
            }

            .sidebar-widget {
                position: relative;
                top: 0;
                max-height: 80vh;
                overflow-y: auto;
            }

            .mobile-filter-btn {
                display: flex;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Product Banner -->
    <section class="about-banner hero"
        style="min-height: 300px; background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); background-size: cover;">
        <div class="hero-content" style="text-align: center; margin: 0 auto;">
            <h1 style="font-size: 3rem;">Premium Hospital <span>Furniture Manufacturer Indore</span></h1>
            <p>Direct from Manufacturer – Quality that sets industry standards.</p>
        </div>
    </section>

    <div class="catalog-layout">
        <!-- Sidebar Filter -->
        <aside class="sidebar-container" id="filterSidebar">
            <div class="sidebar-widget">
                <div class="widget-title">
                    <i data-lucide="search" size="18"></i> Search Products
                </div>
                <form action="/products" method="GET" class="search-widget-form">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" placeholder="Search by name or code..." value="{{ request('search') }}">
                    <button type="submit">
                        <i data-lucide="search" size="18"></i>
                    </button>
                </form>
                @if(request('search'))
                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" style="font-size: 12px; color: #ef4444; text-decoration: none; display: block; margin-top: 10px; font-weight: 600;">
                        <i data-lucide="x" size="12" style="vertical-align: middle;"></i> Clear Search
                    </a>
                @endif
            </div>

            <div class="sidebar-widget">
                <div class="widget-title">
                    <i data-lucide="layout-grid" size="18"></i> Categories
                </div>
                <ul class="filter-list">
                    <li class="filter-item">
                        <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="filter-link {{ !request('category') ? 'active' : '' }}">
                            All Products
                        </a>
                    </li>
                    @foreach($categories as $cat)
                        <li class="filter-item">
                            <a href="{{ request()->fullUrlWithQuery(['category' => $cat->slug]) }}"
                                class="filter-link {{ request('category') == $cat->slug ? 'active' : '' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar-widget">
                <div class="widget-title">
                    <i data-lucide="award" size="18"></i> Quality Standards
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <p style="font-size: 13px; color: var(--text-muted);"><i data-lucide="check" size="14"
                            style="color: var(--secondary);"></i> ISO 13485:2016 Certified</p>
                    <p style="font-size: 13px; color: var(--text-muted);"><i data-lucide="check" size="14"
                            style="color: var(--secondary);"></i> Direct Factory Warranty</p>
                    <p style="font-size: 13px; color: var(--text-muted);"><i data-lucide="check" size="14"
                            style="color: var(--secondary);"></i> PAN India Installation</p>
                </div>
            </div>
        </aside>

        <!-- Main Catalog -->
        <main class="catalog-main">
            <button class="mobile-filter-btn" onclick="toggleFilter(true)">
                <i data-lucide="sliders-horizontal" size="18"></i> Show Filters
            </button>

                @if($products->total() > 0)
                    <p style="color: var(--text-muted); font-size: 14px;">Showing <b>{{ $products->firstItem() }}</b> to <b>{{ $products->lastItem() }}</b> of <b>{{ $products->total() }}</b> specialized items</p>
                @else
                    <p style="color: var(--text-muted); font-size: 14px;">No items found</p>
                @endif


            <div class="product-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
                @forelse($products as $product)
                    <div class="p-card">
                        @if($product->is_bestseller)
                            <div style="position: absolute; top: 25px; left: 25px; background: #fbbf24; color: #78350f; padding: 4px 12px; border-radius: 20px; font-size: 10px; font-weight: 800; z-index: 5; box-shadow: 0 4px 10px rgba(251, 191, 36, 0.3); display: flex; align-items: center; gap: 5px;">
                                <i data-lucide="star" size="10"></i> BEST SELLER
                            </div>
                        @endif
                        <div class="p-img-container">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                    style="width:100%;">
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

                        <div style="flex-grow: 1;">
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
                                <p style="font-size: 12px; color: #059669; font-weight: 800; display: flex; align-items: center; gap: 5px;">
                                    <i data-lucide="truck" size="14"></i> FREE SHIPPING
                                </p>
                        </div>

                        <button class="buy-btn-premium" onclick="buyNow({{ $product->id }})">
                            <i data-lucide="zap" size="18"></i> BUY NOW
                        </button>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                        <i data-lucide="package-search" size="64" style="color: #cbd5e0; margin-bottom: 20px;"></i>
                        <h3 style="color: var(--primary);">No Products Found</h3>
                        <p style="color: var(--text-muted);">We are currently updating this category. Please check back later.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            @if($products->hasPages())
                <div class="pagination-container">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </main>

    </div>

    <script>
        function toggleFilter(show) {
            const sidebar = document.getElementById('filterSidebar');
            if (show) {
                sidebar.classList.add('active');
                // Auto close on clicking background
                sidebar.addEventListener('click', function (e) {
                    if (e.target === this) toggleFilter(false);
                });
            } else {
                sidebar.classList.remove('active');
            }
        }
    </script>
@endsection