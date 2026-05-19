@extends('layouts.app')

@section('title', 'Shopping Cart | A One Hospicare')
@section('meta_description', 'View items in your cart and proceed to checkout for premium hospital furniture and medical equipment.')

@push('styles')
<style>
    .cart-page-container {
        padding: 80px 8%;
        background: #f8fafc;
        min-height: 80vh;
    }

    .cart-layout {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 40px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .cart-card {
        background: white;
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.02);
        border: 1px solid #f1f5f9;
    }

    /* Base Grid Styles */
    .cart-table-header {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        padding-bottom: 20px;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 30px;
        color: #94a3b8;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .cart-item-row {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        align-items: center;
        padding: 30px 0;
        border-bottom: 1px solid #f8fafc;
    }

    /* Product Cell Components */
    .product-info-cell { display: flex; gap: 25px; align-items: center; }
    .item-img-box { width: 100px; height: 100px; background: #f8fafc; border-radius: 15px; display: flex; align-items: center; justify-content: center; padding: 15px; }
    .item-details h4 { color: var(--primary); font-weight: 800; margin-bottom: 5px; font-size: 1.1rem; }
    .sku-tag { display: block; font-size: 14px; color: var(--secondary); font-weight: 700; margin-bottom: 10px; }
    .remove-btn { border: none; background: transparent; color: #ef4444; font-size: 13px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 5px; padding: 0; }
    
    .price-cell, .total-cell { font-weight: 700; color: var(--primary); text-align: center; }
    .total-cell { text-align: right; font-size: 1.2rem; font-weight: 800; }
    .mobile-label { display: none; color: #94a3b8; font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 5px; }

    /* Controls */
    .qty-cell { display: flex; justify-content: center; }
    .qty-control { display: flex; align-items: center; background: #f1f5f9; border-radius: 12px; width: fit-content; padding: 5px; }
    .qty-btn { width: 35px; height: 35px; border: none; background: transparent; cursor: pointer; color: var(--primary); }
    .qty-val { width: 40px; text-align: center; font-weight: 800; color: var(--primary); }

    .summary-row { display: flex; justify-content: space-between; margin-bottom: 20px; }

    /* Full Proper Mobile Design */
    @media (max-width: 992px) {
        .cart-layout { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
        .cart-page-container { padding: 40px 15px; }
        .cart-card { padding: 25px; border-radius: 20px; }
        .cart-table-header { display: none; }
        
        .cart-item-row { 
            grid-template-columns: 1fr; 
            gap: 25px; 
            padding: 30px 0;
            border-bottom: 2px solid #f8fafc;
        }

        .product-info-cell { 
            flex-direction: column; 
            text-align: center; 
            gap: 15px;
        }

        .price-cell, .qty-cell, .total-cell { 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            text-align: center;
        }

        .mobile-label { display: block; }
        .total-cell { text-align: center; }
        
        .item-details h4 { font-size: 1.3rem; }
        
        /* Drawer responsiveness */
        .cart-drawer { width: 100% !important; right: -100% !important; }
        .cart-drawer.active { right: 0 !important; }
    }
</style>
@endpush

@section('content')
<div class="cart-page-container">
    <div style="max-width: 1400px; margin: 0 auto 40px;">
        <h1 style="color: var(--primary); font-weight: 900; font-size: 3rem; margin-bottom: 10px;">Your Shopping Cart</h1>
        <p style="color: #64748b;">Review your selected medical equipment and proceed to secure checkout.</p>
    </div>

    <div class="cart-layout">
        <!-- Main Cart List -->
        <div class="cart-card">
            <div class="cart-table-header">
                <div>Product Profile</div>
                <div style="text-align: center;">Unit Price</div>
                <div style="text-align: center;">Quantity</div>
                <div style="text-align: right;">Total</div>
            </div>

            <!-- Item 1 -->
            <div class="cart-item-row">
                <div class="product-info-cell">
                    <div class="item-img-box">
                        <img src="{{ asset('assets/images/icu_bed_product.png') }}" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="item-details">
                        <h4>5-Function Electric ICU Bed</h4>
                        <span class="sku-tag">AOH 151 (B) Premium Series</span>
                        <button class="remove-btn">
                            <i data-lucide="trash-2" size="14"></i> Remove From Cart
                        </button>
                    </div>
                </div>
                <div class="price-cell">
                    <span class="mobile-label">Unit Price</span>
                    <span class="val">₹1,25,000</span>
                </div>
                <div class="qty-cell">
                    <span class="mobile-label">Quantity</span>
                    <div class="qty-control">
                        <button class="qty-btn"><i data-lucide="minus" size="14"></i></button>
                        <span class="qty-val">1</span>
                        <button class="qty-btn"><i data-lucide="plus" size="14"></i></button>
                    </div>
                </div>
                <div class="total-cell">
                    <span class="mobile-label">Total Price</span>
                    <span class="val">₹1,25,000</span>
                </div>
            </div>

            <!-- Empty cart state visualization or more items could go here -->
            
            <div style="margin-top: 40px; border-top: 1px solid #f1f5f9; padding-top: 40px; display: flex; justify-content: space-between; align-items: center;">
                <a href="/products" style="color: var(--primary); text-decoration: none; font-weight: 700; display: flex; align-items: center; gap: 10px;">
                    <i data-lucide="arrow-left" size="18"></i> Continue Shopping
                </a>
                <button style="background: transparent; border: 1px solid #cbd5e0; color: var(--primary); padding: 12px 25px; border-radius: 12px; font-weight: 700; cursor: pointer;">Remove All Items</button>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="sidebar-stack">
            <div class="cart-card" style="padding: 35px; position: sticky; top: 120px;">
                <h3 style="color: var(--primary); font-weight: 800; margin-bottom: 30px; font-size: 1.5rem;">Order Summary</h3>
                
                <div class="summary-details" style="margin-bottom: 30px;">
                    <div class="summary-row">
                        <span style="color: #64748b; font-weight: 600;">Product Subtotal</span>
                        <span style="color: var(--primary); font-weight: 700;">₹1,25,000</span>
                    </div>
                    <div class="summary-row">
                        <span style="color: #64748b; font-weight: 600;">Shipping Fee</span>
                        <span style="color: #059669; font-weight: 700;">FREE</span>
                    </div>
                    <div class="summary-row">
                        <span style="color: #64748b; font-weight: 600;">GST (12%)</span>
                        <span style="color: var(--primary); font-weight: 700;">₹15,000</span>
                    </div>
                </div>

                <div style="border-top: 2px dashed #e2e8f0; padding-top: 25px; margin-bottom: 35px;">
                    <div class="summary-row">
                        <span style="font-size: 1.2rem; color: var(--primary); font-weight: 800;">Grand Total</span>
                        <span style="font-size: 1.8rem; color: var(--primary); font-weight: 900;">₹1,40,000</span>
                    </div>
                </div>

                <div class="coupon-box" style="display: flex; gap: 10px; margin-bottom: 30px;">
                    <input type="text" placeholder="Promo code" style="flex: 1; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0 15px; font-size: 14px;">
                    <button style="background: var(--primary); color: white; border: none; padding: 12px 20px; border-radius: 12px; font-weight: 700; cursor: pointer;">Apply</button>
                </div>

                <a href="/checkout" style="text-decoration: none;">
                    <button class="btn btn-primary" style="width: 100%; height: 65px; border-radius: 18px; font-weight: 800; font-size: 1.1rem; box-shadow: 0 15px 30px rgba(0, 77, 64, 0.15);">
                        CHECKOUT SECURELY
                    </button>
                </a>
                
                <div style="margin-top: 25px; display: flex; justify-content: center; gap: 15px;">
                    <i data-lucide="shield-check" size="20" style="color: #64748b;"></i>
                    <span style="font-size: 12px; color: #64748b; font-weight: 600;">Secure 256-bit SSL Encrypted Payment</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
