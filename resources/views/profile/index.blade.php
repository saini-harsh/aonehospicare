@extends('layouts.app')

@section('title', 'My Profile | A One Hospicare')

@push('styles')
<style>
    .profile-section {
        background: #f8fafc;
        padding: 60px 5% 100px;
        min-height: 80vh;
    }

    .profile-container {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 40px;
    }

    .profile-sidebar {
        background: white;
        border-radius: 25px;
        padding: 40px;
        height: min-content;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        text-align: center;
    }

    .user-avatar {
        width: 100px;
        height: 100px;
        background: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        font-weight: 800;
        margin: 0 auto 20px;
        text-transform: uppercase;
    }

    .sidebar-nav {
        margin-top: 40px;
        text-align: left;
    }

    .sidebar-nav a {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        border-radius: 12px;
        transition: 0.3s;
        margin-bottom: 5px;
    }

    .sidebar-nav a.active, .sidebar-nav a:hover {
        background: rgba(45, 212, 191, 0.1);
        color: var(--secondary);
    }

    .profile-content {
        background: white;
        border-radius: 25px;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }

    .profile-content h3 {
        color: var(--primary);
        font-size: 1.6rem;
        font-weight: 800;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .profile-card {
        margin-bottom: 50px;
    }

    .profile-card:last-child { margin-bottom: 0; }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group.full { grid-column: 1 / -1; }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 12px;
    }

    .form-group input, .form-group textarea, .form-group select {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #f8fafc;
        outline: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .form-group input:focus {
        border-color: var(--secondary);
        background: white;
        box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.1);
    }

    .btn-save {
        padding: 15px 40px;
        font-size: 15px;
        font-weight: 800;
    }

    @media (max-width: 992px) {
        .profile-container { grid-template-columns: 1fr; }
        .profile-sidebar { display: none; }
        .form-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
<section class="profile-section">
    <div class="profile-container">
        <aside class="profile-sidebar">
            <div class="user-avatar">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
            <h4 style="font-weight: 800; color: var(--primary);">{{ auth()->user()->name }}</h4>
            <p style="font-size: 13px; color: #64748b; margin-bottom: 30px;">{{ auth()->user()->email }}</p>

            <nav class="sidebar-nav">
                <a href="{{ route('profile') }}" class="active"><i data-lucide="user"></i> Account Details</a>
                <a href="#"><i data-lucide="package"></i> My Orders</a>
                <a href="#"><i data-lucide="heart"></i> Wishlist</a>
                <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
                    @csrf
                    <button type="submit" style="width: 100%; background: none; border: none; cursor: pointer; text-align: left; padding: 0;">
                        <a href="#" style="color: #ef4444;"><i data-lucide="log-out"></i> Logout</a>
                    </button>
                </form>
            </nav>
        </aside>

        <div class="profile-content">
            @if(session('success'))
                <div style="background: #f0fdf4; color: #166534; padding: 20px; border-radius: 15px; margin-bottom: 30px; font-weight: 700; border: 1px solid #dcfce7;">
                    <i data-lucide="check-circle" size="20" style="vertical-align: middle; margin-right: 10px;"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Profile Info -->
            <div class="profile-card">
                <h3><i data-lucide="contact-2"></i> Institutional Profile</h3>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}">
                        </div>
                        <div class="form-group full">
                            <label>Hospital/Delivery Address</label>
                            <textarea name="address" rows="3">{{ old('address', $user->address) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" value="{{ old('city', $user->city) }}">
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" value="{{ old('state', $user->state) }}">
                        </div>
                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" name="pincode" value="{{ old('pincode', $user->pincode) }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-save">Update Profile</button>
                </form>
            </div>

            <hr style="border: 0; border-top: 1px solid #f1f5f9; margin: 50px 0;">

            <!-- Password Change -->
            <div class="profile-card">
                <h3><i data-lucide="lock"></i> Change Security Credentials</h3>
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="current_password" required>
                        </div>
                        <div class="form-group"></div> <!-- Spacer -->
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="password_confirmation" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-save">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
