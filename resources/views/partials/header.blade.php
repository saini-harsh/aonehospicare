<!-- Header -->
<header>
    <div class="top-bar">
        <div class="contact-info">
            <a href="tel:+919826064152">
                <i data-lucide="phone" size="14"></i>
                <span class="hide-mobile">+91 9826064152</span>
            </a>
            <a href="mailto:aonehospicare01@gmail.com">
                <i data-lucide="mail" size="14"></i>
                <span class="hide-mobile">aonehospicare01@gmail.com</span>
            </a>
        </div>
        <div class="top-links">
            <span>ISO 9001:2015 Certified</span>
        </div>
    </div>
    <nav class="main-nav">
        <div class="logo">
            <a href="/"><img src="{{ asset('assets/images/logo.webp') }}" alt="A One Hospicare Logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/products">Products</a></li>
            <li><a href="/return-bed">Return Bed</a></li>
            <li><a href="/certificates">Certificates</a></li>
            <li><a href="/contact">Contact Us</a></li>
        </ul>
        <div class="nav-actions">
            <form action="/products" method="GET" class="search-box">
                <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
                <button type="submit" style="background: none; border: none; cursor: pointer; color: inherit; display: flex; align-items: center; padding: 0;">
                    <i data-lucide="search" size="18"></i>
                </button>
            </form>
            <div class="cart" style="cursor: pointer; transition: transform 0.2s ease; position: relative;" onclick="toggleCart(true)">
                <i data-lucide="shopping-cart"></i>
                <span id="headerCartCount" style="position: absolute; top: -8px; right: -8px; background: var(--secondary); color: var(--primary); font-size: 10px; font-weight: 800; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid white; display: none;">0</span>
            </div>
            
            <div class="user-menu">
                <div class="user-trigger">
                    <i data-lucide="user"></i>
                    @auth
                        <span style="font-size: 12px; font-weight: 700; color: var(--primary); margin-left: 5px;">{{ explode(' ', auth()->user()->name)[0] }}</span>
                    @endauth
                </div>
                <ul class="dropdown-menu">
                    @guest
                        <li><a href="{{ route('login') }}"><i data-lucide="log-in" size="16"></i> Sign In</a></li>
                        <li><a href="{{ route('register') }}"><i data-lucide="user-plus" size="16"></i> Sign Up</a></li>
                    @else
                        <li><a href="{{ route('profile') }}"><i data-lucide="user" size="16"></i> My Profile</a></li>
                        <li><a href="#"><i data-lucide="shopping-bag" size="16"></i> My Orders</a></li>
                        <li style="border-top: 1px solid #eee; margin-top: 5px; padding-top: 5px;">
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
                            <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" style="color: #ef4444;">
                                <i data-lucide="log-out" size="16"></i> Sign Out
                            </a>
                        </li>
                    @endguest
                    <li style="border-top: 1px solid #eee; margin-top: 5px; padding-top: 5px;">
                        <a href="#"><i data-lucide="help-circle" size="16"></i> Support</a>
                    </li>
                </ul>
            </div>

            <button class="mobile-menu-btn" id="menuToggle">
                <i data-lucide="menu"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Drawer -->
    <div class="mobile-drawer" id="mobileDrawer">
        <div class="drawer-header">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="Logo">
            <button class="close-btn" id="closeDrawer">
                <i data-lucide="x"></i>
            </button>
        </div>
            <ul class="mobile-nav-links">
                <li><a href="/"><i data-lucide="home" size="18" style="vertical-align: middle;"></i> Home</a></li>
                <li><a href="/about"><i data-lucide="info" size="18" style="vertical-align: middle;"></i> About Us</a></li>
                <li><a href="/services"><i data-lucide="settings" size="18" style="vertical-align: middle;"></i> Services</a></li>
                <li><a href="/products"><i data-lucide="package" size="18" style="vertical-align: middle;"></i> Products</a></li>
                <li><a href="/return-bed"><i data-lucide="rotate-ccw" size="18" style="vertical-align: middle;"></i> Return Bed</a></li>
                <li><a href="/certificates"><i data-lucide="award" size="18" style="vertical-align: middle;"></i> Certificates</a></li>
                <li><a href="/contact"><i data-lucide="mail" size="18" style="vertical-align: middle;"></i> Contact Us</a></li>
                <li style="border-top: 1px solid #eee; padding-top: 10px;">
                    @guest
                        <a href="{{ route('login') }}"><i data-lucide="log-in" size="18" style="vertical-align: middle;"></i> Sign In</a>
                        <a href="{{ route('register') }}"><i data-lucide="user-plus" size="18" style="vertical-align: middle;"></i> Sign Up</a>
                    @else
                        <a href="{{ route('profile') }}"><i data-lucide="user" size="18" style="vertical-align: middle;"></i> My Profile</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" style="color: #ef4444;"><i data-lucide="log-out" size="18" style="vertical-align: middle;"></i> Sign Out</a>
                    @endguest
                </li>
            </ul>
        <div style="padding: 20px;">
            <a href="#" class="btn btn-primary" style="width: 100%;">Get Quick Quote</a>
        </div>
    </div>
    <div class="overlay" id="menuOverlay"></div>
</header>
