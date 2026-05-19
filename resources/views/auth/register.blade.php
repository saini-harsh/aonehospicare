@extends('layouts.app')

@section('title', 'Register | A One Hospicare')

@push('styles')
<style>
    .auth-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        padding: 80px 5%;
    }

    .auth-card {
        width: 100%;
        max-width: 550px;
        background: white;
        border-radius: 30px;
        padding: 50px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .auth-header img {
        height: 50px;
        margin-bottom: 20px;
    }

    .auth-header h2 {
        color: var(--primary);
        font-weight: 800;
        font-size: 1.8rem;
    }

    .auth-form .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 25px;
    }

    .auth-form .form-group {
        margin-bottom: 25px;
    }

    .auth-form label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 10px;
    }

    .auth-form input {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        outline: none;
        transition: var(--transition);
        background: #f8fafc;
    }

    .auth-form input:focus {
        border-color: var(--secondary);
        background: white;
        box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.1);
    }

    .btn-auth {
        width: 100%;
        padding: 18px;
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 25px;
        margin-top: 20px;
    }

    .auth-footer {
        text-align: center;
        font-size: 14px;
        color: #64748b;
    }

    .auth-footer a {
        color: var(--secondary);
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width: 600px) {
        .auth-form .form-row { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
<section class="auth-section">
    <div class="auth-card">
        <div class="auth-header">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="A One Hospicare">
            <h2>Create Account</h2>
            <p style="color: #64748b; font-size: 14px; margin-top: 5px;">Join the A One Hospicare procurement network</p>
        </div>

        @if($errors->any())
            <div style="background: #fef2f2; color: #dc2626; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-size: 13px; list-style-type: none;">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="John Doe">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 00000 00000">
                </div>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="name@hospital.com">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-auth">Create Account</button>
        </form>

        <div class="auth-footer">
            Already have an account? <a href="{{ route('login') }}">Sign In</a>
        </div>
    </div>
</section>
@endsection
