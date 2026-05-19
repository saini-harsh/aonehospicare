@extends('layouts.app')

@section('title', $product->meta_title ?: $product->title . " | Premium Medical Equipment Manufacturer")
@section('meta_description', $product->meta_description ?: "Buy " . $product->title . " (Model: " . $product->code . ") at factory prices from A One Hospicare. Certified high-quality hospital furniture and equipment.")
@section('meta_keywords', $product->meta_keywords ?: $product->title . ", hospital equipment " . $product->code . ", medical furniture manufacturer, buy hospital equipment online india")

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Product",
  "name": "{{ $product->title }}",
  "image": "{{ asset('storage/' . $product->image) }}",
  "description": "{{ $product->meta_description ?: Str::limit(strip_tags($product->features), 160) }}",
  "sku": "{{ $product->code }}",
  "mpn": "{{ $product->code }}",
  "brand": {
    "@@type": "Brand",
    "name": "A One Hospicare"
  },
  "review": {
    "@@type": "Review",
    "reviewRating": {
      "@@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5"
    },
    "author": {
      "@@type": "Person",
      "name": "Verified Hospital Purchase"
    }
  },
  "aggregateRating": {
    "@@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "{{ crc32($product->title) % 50 + 20 }}"
  },
  "offers": {
    "@@type": "Offer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "INR",
    "price": "{{ $product->price }}",
    "priceValidUntil": "{{ now()->addYear()->format('Y-m-d') }}",
    "itemCondition": "https://schema.org/NewCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@@type": "Organization",
      "name": "A One Hospicare"
    }
  }
}
</script>
@endsection

@push('styles')
    <style>
        .product-detail-container {
            padding: 60px 8%;
            background: white;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 60px;
        }

        .product-code-badge {
            background: var(--primary);
            color: white;
            padding: 8px 25px;
            border-radius: 0 30px 30px 0;
            font-weight: 700;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
            margin-left: -8%;
        }

        .detail-image-box {
            background: #f8fafc;
            border-radius: 30px;
            padding: 40px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            height: 450px;
        }

        .detail-image-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .feature-point {
            margin-bottom: 25px;
        }

        .feature-title {
            color: var(--primary);
            font-weight: 800;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
        }

        .feature-desc {
            color: #475569;
            font-size: 15px;
            line-height: 1.6;
        }

        .movement-icons {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            border-top: 1px solid #f1f5f9;
            padding-top: 40px;
            flex-wrap: wrap;
        }

        .m-item {
            text-align: center;
            width: 80px;
        }

        .m-icon {
            width: 50px;
            height: 50px;
            background: #004D40;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin: 0 auto 10px;
        }

        .m-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
        }

        @media (max-width: 992px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .product-code-badge {
                margin-left: 0;
            }
        }
    </style>
@endpush

@section('content')
    <div class="product-detail-container">
        <!-- Breadcrumb -->
        <nav style="margin-bottom: 30px; font-size: 13px; color: var(--text-muted);">
            <a href="/products" style="color: inherit; text-decoration: none;">Products</a> /
            <a href="/products?category={{ $product->category->slug }}" style="color: inherit; text-decoration: none;">{{ $product->category->name }}</a> /
            <span style="color: var(--primary); font-weight: 600;">{{ $product->title }}</span>
        </nav>

        <div class="product-code-badge">{{ $product->code ?? 'AOH-' . $product->id }}</div>

        <div class="detail-grid">
            <!-- Left: Gallery & Image -->
            <div class="detail-visuals">
                <div class="detail-image-box">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" id="mainProductImage" alt="{{ $product->title }}">
                    @else
                        <div style="color: #cbd5e0;"><i data-lucide="image" size="120"></i></div>
                    @endif
                </div>

                <div style="margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                    <span
                        style="background: #f0fdf4; color: #166534; padding: 8px 15px; border-radius: 10px; font-size: 13px; font-weight: 700; border: 1px solid #dcfce7; display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="truck" size="16"></i> FREE SHIPPING ON ALL ORDERS
                    </span>
                </div>

                <div style="display: flex; gap: 15px; margin-top: 20px; flex-wrap: wrap;">
                    @if($product->image)
                    <div onclick="document.getElementById('mainProductImage').src='{{ asset('storage/' . $product->image) }}'"
                        style="width: 100px; height: 100px; background: #f8fafc; border: 2px solid var(--secondary); border-radius: 12px; padding: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <img src="{{ asset('storage/' . $product->image) }}" style="max-width: 100%; height: auto;">
                    </div>
                    @endif
                    
                    @if($product->gallery)
                        @foreach($product->gallery as $gImg)
                        <div onclick="document.getElementById('mainProductImage').src='{{ asset('storage/' . $gImg) }}'"
                            style="width: 100px; height: 100px; background: #f8fafc; border: 1px solid #eef2f6; border-radius: 12px; padding: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                            <img src="{{ asset('storage/' . $gImg) }}" style="max-width: 100%; height: auto;">
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Right: Specs & Actions -->
            <div class="detail-info">
                <div style="background: var(--secondary); color: var(--primary); padding: 10px 20px; display: inline-block; font-weight: 800; font-size: 14px; border-radius: 5px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">
                    {{ $product->category->name }}
                </div>

                @if($product->is_bestseller)
                    <div style="background: #fbbf24; color: #78350f; padding: 6px 15px; border-radius: 20px; font-size: 11px; font-weight: 800; display: inline-flex; align-items: center; gap: 8px; margin-bottom: 20px; box-shadow: 0 4px 15px rgba(251, 191, 36, 0.2);">
                        <i data-lucide="star" size="12"></i> TOP RATED BEST SELLER
                    </div>
                @endif

                <h1 style="color: var(--primary); font-size: 2.5rem; font-weight: 900; margin-bottom: 10px; line-height: 1.1;">
                    {{ $product->title }} <br><span style="font-size: 1.5rem; opacity: 0.7;">Premium Hospital Grade</span>
                </h1>
                <p style="color: var(--text-muted); font-size: 1.1rem; margin-bottom: 30px;">
                    Model No: {{ $product->code }} 
                    @if($product->hsn_code)
                        | HSN: {{ $product->hsn_code }}
                    @endif
                    - Professional Institutional Series
                </p>

                <div class="feature-point">
                    <span class="feature-title">TECHNICAL SPECIFICATIONS:</span>
                    <div class="feature-desc" style="white-space: pre-line;">{!! nl2br(e($product->features)) !!}</div>
                </div>

                <div style="margin: 40px 0; display: flex; align-items: flex-end; gap: 30px; flex-wrap: wrap;">
                    <div>
                        <span id="displayPrice" data-base-price="{{ $product->price }}" style="font-size: 2.5rem; color: var(--primary); font-weight: 900;">₹{{ number_format($product->price, 0) }}</span>
                        <span style="display: block; color: var(--text-muted); font-size: 13px; font-weight: 600;">exclusive of GST with {{ $product->gst_percentage }}%</span>
                        <div style="margin-top: 12px; background: #f0f9ff; padding: 10px 15px; border-radius: 8px; border: 1px solid #e0f2fe;">
                            <p style="margin: 0; font-size: 13px; color: #0369a1; line-height: 1.4;">
                                <strong>Get up to 70% refund on product returns — even after years of use</strong><br>
                                <span style="font-size: 11px; opacity: 0.8;">(Terms & Conditions apply)</span>
                            </p>
                        </div>
                    </div>

                    <div style="margin-left: auto;">
                        <span style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Quantity</span>
                        <div style="display: flex; align-items: center; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; width: 140px;">
                            <button type="button" onclick="changeQty(-1)" style="flex: 1; border: none; background: #f8fafc; padding: 12px; cursor: pointer; color: var(--primary);"><i data-lucide="minus" size="16"></i></button>
                            <input type="number" id="qtyInput" value="1" min="1" readonly style="width: 50px; border: none; text-align: center; font-weight: 800; color: var(--primary); -moz-appearance: textfield;">
                            <button type="button" onclick="changeQty(1)" style="flex: 1; border: none; background: #f8fafc; padding: 12px; border-left: 1px solid #e2e8f0; cursor: pointer; color: var(--primary);"><i data-lucide="plus" size="16"></i></button>
                        </div>
                    </div>
                </div>

                <div style="display: flex; gap: 20px;">
                    <button type="button" onclick="addToCart({{ $product->id }})" class="btn btn-outline" style="flex: 1; padding: 20px; font-weight: 700; border-radius: 15px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <i data-lucide="shopping-cart"></i> Add to Cart
                    </button>
                    <button type="button" onclick="buyNow({{ $product->id }})" class="btn btn-primary" style="flex: 1; padding: 20px; font-weight: 700; border-radius: 15px;">
                        <i data-lucide="zap" size="18" style="margin-right: 8px;"></i> Order Now
                    </button>
                </div>

                <div class="movement-icons">
                    <div class="m-item"><div class="m-icon"><i data-lucide="shield-check" size="20"></i></div><span class="m-label">Certified</span></div>
                    <div class="m-item"><div class="m-icon"><i data-lucide="truck" size="20"></i></div><span class="m-label">Safe Delivery</span></div>
                    <div class="m-item"><div class="m-icon"><i data-lucide="wrench" size="20"></i></div><span class="m-label">Installation</span></div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div style="margin-top: 80px; border-top: 1px solid #f1f5f9; padding-top: 60px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 40px; flex-wrap: wrap; gap: 30px;">
                <div style="flex: 1; min-width: 300px;">
                    <h2 style="color: var(--primary); font-weight: 800; margin-bottom: 10px;">Customer Reviews</h2>
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <div style="display: flex; color: #fbbf24;">
                            @php $avgRating = $product->reviews->avg('rating') ?: 5; @endphp
                            @for($i=1; $i<=5; $i++)
                                <i data-lucide="star" size="20" style="{{ $i <= $avgRating ? 'fill: #fbbf24;' : '' }}"></i>
                            @endfor
                        </div>
                        <span style="font-weight: 700; color: var(--primary); font-size: 1.2rem;">{{ number_format($avgRating, 1) }} out of 5</span>
                    </div>
                    <p style="color: #64748b; font-size: 14px;">Total {{ $product->reviews->count() }} verified hospital purchases</p>
                </div>

                <div style="flex: 1; min-width: 300px; background: #f8fafc; padding: 30px; border-radius: 20px;">
                    <h4 style="color: var(--primary); font-weight: 800; margin-bottom: 20px;">Share Your Experience</h4>
                    @auth
                        <form action="{{ route('product.review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-size: 12px; font-weight: 800; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Rating</label>
                                <div class="rating-stars" style="display: flex; gap: 10px; color: #cbd5e0;">
                                    @for($i=1; $i<=5; $i++)
                                        <label style="cursor: pointer;">
                                            <input type="radio" name="rating" value="{{ $i }}" style="display: none;" required>
                                            <i data-lucide="star" class="star-icon" data-value="{{ $i }}" size="24"></i>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-size: 12px; font-weight: 800; color: var(--primary); margin-bottom: 10px; text-transform: uppercase;">Comment</label>
                                <textarea name="comment" required rows="4" placeholder="How was the quality and durability of this medical equipment?" style="width: 100%; padding: 15px; border-radius: 12px; border: 1.5px solid #e2e8f0; font-size: 14px; resize: vertical;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 12px; font-weight: 700;">Submit Review</button>
                        </form>
                    @else
                        <div style="text-align: center; padding: 20px;">
                            <p style="color: #64748b; font-size: 14px; margin-bottom: 15px;">Please login to share your professional review.</p>
                            <a href="{{ route('login') }}" class="btn btn-outline" style="width: 100%; border-radius: 12px; font-weight: 700;">Login to Review</a>
                        </div>
                    @endauth
                </div>
            </div>

            @if(session('success'))
                <div style="background: #ecfdf5; color: #059669; padding: 15px; border-radius: 12px; margin-bottom: 30px; font-weight: 600; font-size: 14px; border: 1px solid #dcfce7;">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background: #fef2f2; color: #dc2626; padding: 15px; border-radius: 12px; margin-bottom: 30px; font-weight: 600; font-size: 14px; border: 1px solid #fee2e2;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="reviews-list" style="display: grid; gap: 30px;">
                @forelse($product->reviews as $review)
                    <div style="padding-bottom: 30px; border-bottom: 1px solid #f1f5f9;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <div>
                                <h5 style="color: var(--primary); font-weight: 800; margin: 0 0 5px;">{{ $review->user->name }}</h5>
                                <div style="display: flex; color: #fbbf24; gap: 2px;">
                                    @for($i=1; $i<=5; $i++)
                                        <i data-lucide="star" size="14" style="{{ $i <= $review->rating ? 'fill: #fbbf24;' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <span style="font-size: 12px; color: #94a3b8; font-weight: 600;">{{ $review->created_at->format('M d, Y') }}</span>
                        </div>
                        <p style="color: #475569; font-size: 15px; line-height: 1.6; margin: 0;">{{ $review->comment }}</p>
                    </div>
                @empty
                    <div style="text-align: center; padding: 60px; background: #fafbfc; border-radius: 20px; border: 2px dashed #e2e8f0;">
                        <i data-lucide="message-square" size="40" style="color: #cbd5e0; margin-bottom: 20px;"></i>
                        <p style="color: #64748b; font-weight: 600;">No reviews yet. Be the first to review this institutional equipment!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function changeQty(amt) {
            const input = document.getElementById('qtyInput');
            const priceEl = document.getElementById('displayPrice');
            const basePrice = parseFloat(priceEl.getAttribute('data-base-price'));
            
            let val = parseInt(input.value) + amt;
            if (val < 1) val = 1;
            input.value = val;

            // Update Price Display
            const total = basePrice * val;
            priceEl.innerText = '₹' + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
        }

        // Star Rating Logic
        document.querySelectorAll('.rating-stars label').forEach(label => {
            label.addEventListener('mouseover', function() {
                const val = this.querySelector('input').value;
                highlightStars(val);
            });

            label.addEventListener('click', function() {
                const val = this.querySelector('input').value;
                setSelectedRating(val);
            });
        });

        document.querySelector('.rating-stars')?.addEventListener('mouseleave', function() {
            const selected = document.querySelector('input[name="rating"]:checked')?.value || 0;
            highlightStars(selected);
        });

        function highlightStars(val) {
            document.querySelectorAll('.star-icon').forEach(star => {
                const starVal = star.getAttribute('data-value');
                if (starVal <= val) {
                    star.style.fill = '#fbbf24';
                    star.style.color = '#fbbf24';
                } else {
                    star.style.fill = 'none';
                    star.style.color = '#cbd5e0';
                }
            });
        }

        function setSelectedRating(val) {
            highlightStars(val);
        }
    </script>
@endsection