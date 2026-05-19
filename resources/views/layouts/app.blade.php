<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'A One Hospicare | Premium Medical Furniture & Equipment')</title>
    <meta name="description"
        content="@yield('meta_description', 'Leading manufacturer of premium medical furniture and hospital equipment in Indore. Buy hospital beds, examination tables, and medical equipment at factory prices.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'medical furniture, hospital beds, medical equipment manufacturer, ICU beds, examination tables, medical furniture Indore, A One Hospicare')">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="FYovUU9poyo6Zi18GjsDX2tL37P7zfl-9s0u6ZbGKPs" />
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon_io/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon_io/site.webmanifest') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'A One Hospicare | Premium Medical Furniture & Equipment')">
    <meta property="og:description"
        content="@yield('meta_description', 'Leading manufacturer of premium medical furniture and hospital equipment in Indore. Buy hospital beds, examination tables, and medical equipment at factory prices.')">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'A One Hospicare | Premium Medical Furniture & Equipment')">
    <meta property="twitter:description"
        content="@yield('meta_description', 'Leading manufacturer of premium medical furniture and hospital equipment in Indore. Buy hospital beds, examination tables, and medical equipment at factory prices.')">
    <meta property="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=' . time()) }}">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Schema.org Markup -->
    @yield('schema')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "A One Hospicare",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/images/logo.png') }}",
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "+91 98260 64152",
        "contactType": "customer service",
        "areaServed": "IN",
        "availableLanguage": "en"
      },
      "sameAs": [
        "https://www.facebook.com/aonehospicare",
        "https://www.instagram.com/aonehospicare",
        "https://www.linkedin.com/company/aonehospicare"
      ]
    }
    </script>
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "WebSite",
      "url": "{{ url('/') }}",
      "potentialAction": {
        "@@type": "SearchAction",
        "target": "{{ url('/products?search={search_term_string}') }}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <style>
        .cart-drawer.active {
            right: 0 !important;
        }

        @media (max-width: 768px) {
            .cart-drawer {
                width: 100% !important;
                right: -100% !important;
            }

            .cart-drawer.active {
                right: 0 !important;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Auth Modal -->
    <div class="modal" id="authModal">
        <div class="modal-content">
            <button class="close-btn" style="position: absolute; top: 20px; right: 20px;" onclick="closeModal()">
                <i data-lucide="x"></i>
            </button>

            <!-- Sign In View -->
            <div id="signinView" class="auth-view active">
                <div class="modal-header">
                    <h3>Welcome Back</h3>
                    <p>Enter your credentials to access your account</p>
                </div>
                <form class="modal-form">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between;">
                            <label>Password</label>
                            <a href="javascript:void(0)" onclick="switchAuthView('forgot')"
                                style="font-size: 13px; color: var(--secondary);">Forgot?</a>
                        </div>
                        <input type="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
                </form>
                <div class="modal-footer">
                    Don't have an account? <a href="javascript:void(0)" onclick="switchAuthView('signup')">Sign Up</a>
                </div>
            </div>

            <!-- Sign Up View -->
            <div id="signupView" class="auth-view">
                <div class="modal-header">
                    <h3>Create Account</h3>
                    <p>Join our professional medical community</p>
                </div>
                <form class="modal-form">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Min. 8 characters" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
                </form>
                <div class="modal-footer">
                    Already have an account? <a href="javascript:void(0)" onclick="switchAuthView('signin')">Sign In</a>
                </div>
            </div>

            <!-- Forgot Password View -->
            <div id="forgotView" class="auth-view">
                <div class="modal-header">
                    <h3>Reset Password</h3>
                    <p>We'll send you a link to reset your password</p>
                </div>
                <form class="modal-form">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="name@example.com" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bulk Quote Enquiry Modal -->
    <div class="modal" id="bulkEnquiryModal">
        <div class="modal-content" style="max-width: 550px;">
            <button class="close-btn" style="position: absolute; top: 20px; right: 20px;"
                onclick="closeBulkEnquiryModal()">
                <i data-lucide="x"></i>
            </button>
            <div class="modal-header">
                <h3 style="color: var(--primary); font-weight: 800; margin: 0;">Institutional Bulk Quote</h3>
                <p style="color: #64748b; font-size: 14px; margin-top: 5px;">Submit your cart for a customized wholesale quote.</p>
            </div>
            
            <div id="bulkCartSummary" style="margin-top: 20px; padding: 15px; background: #f8fafc; border-radius: 12px; border: 1px solid #eef2f6; max-height: 150px; overflow-y: auto;">
                <!-- Cart items will be listed here -->
            </div>

            <form id="bulkEnquiryForm" class="modal-form" style="margin-top: 25px;">
                @csrf
                <input type="hidden" name="form_type" value="bulk_quote">
                <input type="hidden" name="subject" value="Institutional Bulk Quote Request">
                <input type="hidden" name="cart_data" id="bulkCartData">

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Full Name</label>
                    <input type="text" name="name" placeholder="John Doe" required style="width: 100%; padding: 12px 15px; border: 1.5px solid #eef2f6; border-radius: 10px;">
                </div>
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Hospital/Institution Name</label>
                    <input type="text" name="institution" placeholder="e.g. City General Hospital" required style="width: 100%; padding: 12px 15px; border: 1.5px solid #eef2f6; border-radius: 10px;">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Email Address</label>
                        <input type="email" name="email" placeholder="name@example.com" required style="width: 100%; padding: 12px 15px; border: 1.5px solid #eef2f6; border-radius: 10px;">
                    </div>
                    <div class="form-group">
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Phone Number</label>
                        <input type="tel" name="phone" placeholder="+91 00000 00000" required style="width: 100%; padding: 12px 15px; border: 1.5px solid #eef2f6; border-radius: 10px;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); margin-bottom: 8px; text-transform: uppercase;">Additional Requirements</label>
                    <textarea name="message" placeholder="Any specific requirements for this bulk order..." rows="3" style="width: 100%; border-radius: 12px; border: 1.5px solid #eef2f6; padding: 15px; font-size: 14px; font-family: inherit;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px; font-weight: 800; border-radius: 12px; background: var(--secondary); color: var(--primary); border-color: var(--secondary);">GET CUSTOMIZED QUOTE</button>
            </form>
        </div>
    </div>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Cart Drawer -->
    <div class="cart-overlay" id="cartOverlay"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 2000; display: none; transition: opacity 0.3s ease;">
    </div>
    <div class="cart-drawer" id="cartDrawer"
        style="position: fixed; top: 0; right: -450px; width: 450px; height: 100%; background: white; z-index: 2001; transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; box-shadow: -10px 0 30px rgba(0,0,0,0.1);">
        <div class="cart-header"
            style="padding: 30px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-size: 1.5rem; color: var(--primary); font-weight: 800; margin: 0;">Shopping Cart (<span
                    id="drawerCartCount">0</span>)</h3>
            <button onclick="toggleCart(false)"
                style="background: #f8fafc; border: none; width: 40px; height: 40px; border-radius: 50%; color: var(--primary); cursor: pointer; display: flex; align-items: center; justify-content: center;"><i
                    data-lucide="x" size="20"></i></button>
        </div>

        <div class="cart-items" id="cartItemsContainer" style="flex: 1; overflow-y: auto; padding: 30px;">
            <!-- Dynamic Content -->
            <div style="text-align: center; padding: 50px 0; color: #94a3b8;">
                <i data-lucide="shopping-bag" size="48" style="margin-bottom: 15px; opacity: 0.5;"></i>
                <p>Your cart is empty</p>
            </div>
        </div>

        <div class="cart-footer" style="padding: 30px; background: #f8fafc; border-top: 1px solid #f1f5f9;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <span style="color: #64748b; font-weight: 600;">Estimated Subtotal</span>
                <span style="font-size: 1.5rem; color: var(--primary); font-weight: 900;" id="drawerCartTotal">₹0</span>
            </div>
            <p style="font-size: 13px; color: #059669; margin-bottom: 25px; text-align: center; font-weight: 700;">
                <i data-lucide="truck" size="14" style="vertical-align: middle; margin-right: 5px;"></i>
                FREE Shipping on all orders
            </p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <a href="/checkout" id="checkoutBtn" style="text-decoration: none;">
                    <button class="btn btn-primary"
                        style="width: 100%; height: 55px; border-radius: 12px; font-weight: 800; font-size: 12px; letter-spacing: 0.5px;">PROCEED
                        TO CHECKOUT</button>
                </a>
                <button onclick="openBulkEnquiryModal()" id="bulkQuoteBtn" class="btn btn-outline"
                    style="width: 100%; height: 55px; border-radius: 12px; font-weight: 800; font-size: 12px; letter-spacing: 0.5px; border-color: var(--primary); color: var(--primary);">GET
                    BULK QUOTE</button>
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons

        // Cart Drawer Logic
        function toggleCart(show) {
            const drawer = document.getElementById('cartDrawer');
            const overlay = document.getElementById('cartOverlay');
            if (show) {
                overlay.style.display = 'block';
                setTimeout(() => {
                    overlay.style.opacity = '1';
                    drawer.classList.add('active');
                }, 10);
                document.body.style.overflow = 'hidden';
            } else {
                drawer.classList.remove('active');
                overlay.style.opacity = '0';
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 400);
                document.body.style.overflow = '';
            }
        }

        // Global Cart Logic
        let isCartBusy = false;
        function updateQuantity(id, quantity) {
            if (isCartBusy || quantity < 1) return;

            isCartBusy = true;
            const drawer = document.getElementById('cartDrawer');
            if (drawer) drawer.style.pointerEvents = 'none';

            const formData = new FormData();
            formData.append('id', id);
            formData.append('quantity', quantity);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('/cart/update', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        refreshCart();
                    }
                })
                .catch(err => console.error('Cart update failed:', err))
                .finally(() => {
                    isCartBusy = false;
                    if (drawer) drawer.style.pointerEvents = 'auto';
                });
        }

        function refreshCart() {
            fetch('/cart/data')
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('cartItemsContainer');
                    const totalEl = document.getElementById('drawerCartTotal');
                    const countEl = document.getElementById('drawerCartCount');
                    const headerCountEl = document.getElementById('headerCartCount');

                    countEl.innerText = data.count;
                    if (headerCountEl) {
                        headerCountEl.innerText = data.count;
                        headerCountEl.style.display = data.count > 0 ? 'flex' : 'none';
                    }
                    totalEl.innerText = '₹' + data.total.toLocaleString();

                    if (data.count === 0) {
                        container.innerHTML = `
                        <div style="text-align: center; padding: 50px 0; color: #94a3b8;">
                            <i data-lucide="shopping-bag" size="48" style="margin-bottom: 15px; opacity: 0.5;"></i>
                            <p>Your cart is empty</p>
                        </div>
                    `;
                        if (document.getElementById('checkoutBtn')) {
                            document.getElementById('checkoutBtn').style.pointerEvents = 'none';
                            document.getElementById('checkoutBtn').style.opacity = '0.5';
                        }
                    } else {
                        let html = '';
                        for (const [id, item] of Object.entries(data.cart)) {
                            html += `
                            <div class="cart-item" style="display: flex; gap: 20px; margin-bottom: 25px; border-bottom: 1px solid #f1f5f9; padding-bottom: 25px;">
                                <div style="width: 90px; height: 90px; background: #f8fafc; border-radius: 12px; display: flex; align-items: center; justify-content: center; padding: 10px; flex-shrink: 0; border: 1px solid #f1f5f9;">
                                    <img src="/storage/${item.image}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </div>
                                <div style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                    <div>
                                        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 10px;">
                                            <h4 style="color: var(--primary); font-size: 0.95rem; margin: 0; font-weight: 700; line-height: 1.4;">${item.name}</h4>
                                            <button onclick="removeFromCart(${id})" style="border: none; background: #fee2e2; color: #ef4444; width: 28px; height: 28px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: all 0.2s ease;"><i data-lucide="trash-2" size="14"></i></button>
                                        </div>
                                        <p style="font-size: 11px; color: #94a3b8; margin: 4px 0 0;">Incl. ${item.gst_percentage}% GST</p>
                                    </div>
                                    
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                                        <div style="display: flex; align-items: center; background: #f8fafc; border-radius: 8px; padding: 4px; border: 1px solid #f1f5f9;">
                                            <button onclick="updateQuantity(${id}, ${parseInt(item.quantity) - 1})" 
                                                style="width: 28px; height: 28px; border-radius: 6px; border: none; background: white; color: var(--primary); cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: all 0.2s ease;" 
                                                ${parseInt(item.quantity) <= 1 ? 'disabled style="opacity: 0.5; cursor: not-allowed;"' : ''}>
                                                <i data-lucide="minus" size="14"></i>
                                            </button>
                                            <span style="font-size: 14px; font-weight: 700; min-width: 35px; text-align: center; color: var(--primary);">${item.quantity}</span>
                                            <button onclick="updateQuantity(${id}, ${parseInt(item.quantity) + 1})" 
                                                style="width: 28px; height: 28px; border-radius: 6px; border: none; background: white; color: var(--primary); cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: all 0.2s ease;">
                                                <i data-lucide="plus" size="14"></i>
                                            </button>
                                        </div>
                                        <span style="font-weight: 800; color: var(--primary); font-size: 1.05rem;">₹${(item.price * item.quantity).toLocaleString()}</span>
                                    </div>
                                </div>
                            </div>
                        `;
                        }
                        container.innerHTML = html;

                        // Add subtotal and GST details to footer if they exist in the UI
                        const footerHtml = `
                            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                <span style="color: #64748b; font-size: 14px;">Subtotal</span>
                                <span style="color: var(--primary); font-weight: 600;">₹${data.subtotal.toLocaleString()}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                <span style="color: #64748b; font-size: 14px;">Total GST</span>
                                <span style="color: var(--primary); font-weight: 600;">₹${data.gst_total.toLocaleString()}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                                <span style="color: #64748b; font-size: 14px;">Shipping</span>
                                <span style="color: #059669; font-weight: 800;">FREE</span>
                            </div>
                        `;

                        // We need a place to put this. I'll insert it before the total.
                        const totalRow = totalEl.parentElement;
                        const existingBreakup = totalRow.previousElementSibling;
                        if (existingBreakup && existingBreakup.classList.contains('cart-breakup')) {
                            existingBreakup.innerHTML = footerHtml;
                        } else {
                            const breakupDiv = document.createElement('div');
                            breakupDiv.classList.add('cart-breakup');
                            breakupDiv.innerHTML = footerHtml;
                            totalRow.parentNode.insertBefore(breakupDiv, totalRow);
                        }

                        if (document.getElementById('checkoutBtn')) {
                            document.getElementById('checkoutBtn').style.pointerEvents = 'auto';
                            document.getElementById('checkoutBtn').style.opacity = '1';
                        }
                    }
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                });
        }

        function removeFromCart(id) {
            if (isCartBusy) return;
            isCartBusy = true;

            const formData = new FormData();
            formData.append('id', id);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('/cart/remove', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) refreshCart();
                })
                .finally(() => {
                    isCartBusy = false;
                });
        }

        function addToCart(productId, qty = 1) {
            if (isCartBusy) return;
            isCartBusy = true;

            // Support for detail page with qty input
            const qtyInput = document.getElementById('qtyInput');
            const finalQty = qtyInput ? qtyInput.value : qty;

            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('quantity', finalQty);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('/cart/add', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        toggleCart(true);
                        refreshCart();
                    }
                })
                .finally(() => {
                    isCartBusy = false;
                });
        }

        function buyNow(productId, qty = 1) {
            if (isCartBusy) return;
            isCartBusy = true;

            // Support for detail page with qty input
            const qtyInput = document.getElementById('qtyInput');
            const finalQty = qtyInput ? qtyInput.value : qty;

            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('quantity', finalQty);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('/cart/add', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '/checkout';
                    }
                })
                .finally(() => {
                    isCartBusy = false;
                });
        }

        // Header Responsive Logic
        const menuToggle = document.getElementById('menuToggle');
        const closeDrawer = document.getElementById('closeDrawer');
        const mobileDrawer = document.getElementById('mobileDrawer');
        const menuOverlay = document.getElementById('menuOverlay');

        if (menuToggle) {
            function toggleMenu(show) {
                mobileDrawer.classList.toggle('active', show);
                menuOverlay.classList.toggle('active', show);
                document.body.style.overflow = show ? 'hidden' : '';
            }

            menuToggle.addEventListener('click', () => toggleMenu(true));
            closeDrawer?.addEventListener('click', () => toggleMenu(false));
            menuOverlay?.addEventListener('click', () => toggleMenu(false));
        }

        // Auth Modal Logic
        const authModal = document.getElementById('authModal');

        function openAuthModal(view = 'signin') {
            if (!authModal) return;
            authModal.classList.add('active');
            switchAuthView(view);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!authModal) return;
            authModal.classList.remove('active');
            document.body.style.overflow = '';
        }

        function switchAuthView(view) {
            document.querySelectorAll('.auth-view').forEach(v => v.classList.remove('active'));
            const target = document.getElementById(view + 'View');
            if (target) target.classList.add('active');
        }

        // Close modal on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });

        // Service Enquiry Modal Logic
        function openBulkEnquiryModal() {
            // Get current cart data from session via API or just use what's in the UI
            fetch('/cart/data')
                .then(res => res.json())
                .then(data => {
                    const summaryEl = document.getElementById('bulkCartSummary');
                    const cartDataInput = document.getElementById('bulkCartData');
                    
                    if (data.count === 0) {
                        alert('Your cart is empty. Please add products to get a bulk quote.');
                        return;
                    }

                    let summaryHtml = '<p style="font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 12px;">ENQUIRY FOR:</p>';
                    let cartString = '';

                    for (const [id, item] of Object.entries(data.cart)) {
                        summaryHtml += `<div style="display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 5px;">
                            <span>${item.name}</span>
                            <span style="font-weight: 700;">Qty: ${item.quantity}</span>
                        </div>`;
                        cartString += `${item.name} (Qty: ${item.quantity}), `;
                    }

                    summaryEl.innerHTML = summaryHtml;
                    cartDataInput.value = cartString;

                    const modal = document.getElementById('bulkEnquiryModal');
                    if (modal) {
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
        }

        function closeBulkEnquiryModal() {
            const modal = document.getElementById('bulkEnquiryModal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.getElementById('bulkEnquiryForm')?.addEventListener('submit', function (e) {
            e.preventDefault();
            const form = this;
            const btn = form.querySelector('button');
            const originalText = btn.innerText;

            btn.disabled = true;
            btn.innerText = 'PROCESSING...';

            const formData = new FormData(this);

            fetch('/send-inquiry', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Your bulk quote request has been sent! Our institutional experts will contact you shortly.');
                        closeBulkEnquiryModal();
                        toggleCart(false);
                        form.reset();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to send request.'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Connection error. Please try again.');
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.innerText = originalText;
                });
        });

        function openServiceEnquiryModal(serviceTitle) {
            const titleEl = document.getElementById('serviceEnquiryTitle');
            const subjectEl = document.getElementById('enquirySubject');
            if (titleEl) titleEl.innerText = 'Enquire for: ' + serviceTitle;
            if (subjectEl) subjectEl.value = 'Service Enquiry: ' + serviceTitle;

            const modal = document.getElementById('serviceEnquiryModal');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeServiceEnquiryModal() {
            const modal = document.getElementById('serviceEnquiryModal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.getElementById('serviceEnquiryForm')?.addEventListener('submit', function (e) {
            e.preventDefault();
            const form = this;
            const btn = form.querySelector('button');
            const originalText = btn.innerText;

            btn.disabled = true;
            btn.innerText = 'SENDING...';

            fetch('{{ route("inquiry.send") }}', {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Enquiry sent successfully! Our team will contact you shortly.');
                        closeServiceEnquiryModal();
                        form.reset();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to send enquiry.'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Connection error. Please check your internet and try again.');
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.innerText = originalText;
                });
        });

        // Initialize cart and icons on load
        document.addEventListener('DOMContentLoaded', () => {
            refreshCart();

            // Small delay to ensure all partials are rendered
            setTimeout(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }, 100);
        });
    </script>

    @stack('scripts')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/69e9fa5ab84bb21c2c7157c1/1jmsvjtba';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>