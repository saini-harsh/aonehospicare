<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | A One Hospicare</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --sidebar-width: 280px;
        }

        body {
            background: #f4f7f6;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            zoom: 0.85;
            Scale down for better overview on 100% zoom -moz-transform: scale(0.85);
            /* Firefox fallback */
            -moz-transform-origin: top left;
        }

        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--primary);
            color: white;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 0;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 0 30px 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
        }

        .sidebar-brand img {
            height: 40px;
            filter: brightness(0) invert(1);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 30px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 600;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li.active a {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--secondary);
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .admin-header {
            background: white;
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.03);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-content {
            padding: 30px 40px;
        }

        .admin-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            border: 1px solid #f1f5f9;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-item {
            background: white;
            padding: 30px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.02);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-info h5 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .stat-info h2 {
            color: var(--primary);
            font-size: 24px;
            font-weight: 800;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            text-align: left;
            padding: 15px;
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid #f1f5f9;
        }

        td {
            padding: 20px 15px;
            border-bottom: 1px solid #f8fafc;
            font-size: 14px;
            color: var(--primary);
            font-weight: 600;
        }

        tr:hover {
            background: #fdfdfd;
        }
    </style>
    @stack('admin_styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="Admin Logo">
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="/admin/dashboard"><i
                        data-lucide="layout-dashboard"></i> Dashboard</a></li>
            <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}"><a href="/admin/categories"><i
                        data-lucide="grid"></i> Categories</a></li>
            <li class="{{ Request::is('admin/products*') ? 'active' : '' }}"><a href="/admin/products"><i
                        data-lucide="package"></i> Products</a></li>
            <li class="{{ Request::is('admin/services*') ? 'active' : '' }}"><a href="/admin/services"><i
                        data-lucide="shield"></i> Services</a></li>
            <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}"><a href="/admin/testimonials"><i
                        data-lucide="message-square"></i> Testimonials</a></li>
            <li class="{{ Request::is('admin/inquiries*') ? 'active' : '' }}"><a href="/admin/inquiries"><i
                        data-lucide="mail"></i> Inquiries</a></li>
            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="/admin/users"><i
                        data-lucide="users"></i> Customers</a></li>
            <li class="{{ Request::is('admin/orders*') ? 'active' : '' }}"><a href="{{ route('admin.orders') }}"><i
                        data-lucide="shopping-cart"></i> Orders</a></li>
            <li class="{{ Request::is('admin/coupons*') ? 'active' : '' }}"><a href="/admin/coupons"><i
                        data-lucide="ticket"></i> Coupons</a></li>
            <li class="{{ Request::is('admin/payments*') ? 'active' : '' }}"><a href="{{ route('admin.payments') }}"><i
                        data-lucide="credit-card"></i> Payments</a></li>
            <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}"><a href="{{ route('admin.settings') }}"><i
                        data-lucide="settings"></i> Settings</a></li>
            <li style="margin-top: 40px;">
                <form action="{{ route('admin.logout') }}" method="POST" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #ef4444;">
                    <i data-lucide="log-out"></i> Logout
                </a>
            </li>
        </ul>
    </aside>

    <main class="admin-main">
        <!-- Header -->
        <header class="admin-header">
            <div class="header-left">
                <h4 style="font-weight: 800; color: var(--primary);">System Overview</h4>
            </div>
            <div class="header-right" style="display: flex; align-items: center; gap: 20px;">
                <div style="text-align: right;">
                    <p style="font-weight: 700; font-size: 14px; color: var(--primary);">Administrator</p>
                    <p style="font-size: 12px; color: #64748b;">Full Access</p>
                </div>
                <div
                    style="width: 45px; height: 45px; background: #e2e8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i data-lucide="user" size="20"></i>
                </div>
            </div>
        </header>

        <section class="admin-content">
             @if($errors->any())
                <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 20px; border-radius: 12px; margin-bottom: 30px;">
                    <ul style="margin: 0; padding-left: 20px; color: #b91c1c; font-weight: 600; font-size: 14px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(session('success'))
                <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 20px; border-radius: 12px; margin-bottom: 30px; color: #047857; font-weight: 600; font-size: 14px;">
                    {{ session('success') }}
                </div>
            @endif
            @yield('admin_content')
        </section>
    </main>

    <script>
        lucide.createIcons();
    </script>
    @stack('admin_scripts')
</body>

</html>