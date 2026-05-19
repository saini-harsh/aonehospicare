@extends('layouts.app')

@section('title', 'Forgot Password | A One Hospicare')

@push('styles')
<style>
    .auth-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        padding: 50px 5%;
    }

    .auth-card {
        width: 100%;
        max-width: 450px;
        background: white;
        border-radius: 30px;
        padding: 50px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
        text-align: center;
    }

    .auth-header {
        margin-bottom: 35px;
    }

    .auth-header div {
        width: 80px;
        height: 80px;
        background: rgba(45, 212, 191, 0.1);
        color: var(--secondary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
    }

    .auth-header h2 {
        color: var(--primary);
        font-weight: 800;
        font-size: 1.6rem;
    }

    .auth-form .form-group {
        margin-bottom: 30px;
        text-align: left;
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
    }

    .auth-footer a {
        color: var(--secondary);
        font-weight: 700;
        text-decoration: none;
        font-size: 14px;
    }
</style>
@endpush

@section('content')
<section class="auth-section">
    <div class="auth-card">
        <div class="auth-header">
            <div>
                <i data-lucide="key-round" size="40"></i>
            </div>
            <h2>Reset Password</h2>
            <p style="color: #64748b; font-size: 14px; margin-top: 5px;">Enter your email to receive a recovery link</p>
        </div>

        @if(session('success'))
            <div style="background: #f0fdf4; color: #166534; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-size: 14px; font-weight: 600;">
                {{ session('success') }}
            </div>
        @else
            <form action="{{ route('password.email') }}" method="POST" class="auth-form">
                @csrf
                <div class="form-group">
                    <label>Registration Email</label>
                    <input type="email" name="email" required placeholder="name@hospital.com">
                </div>

                <button type="submit" class="btn btn-primary btn-auth">Send Reset Link</button>
            </form>
        @endif

        <div class="auth-footer">
            <a href="{{ route('login') }}"><i data-lucide="arrow-left" size="14" style="vertical-align: middle; margin-right: 5px;"></i> Back to Login</a>
        </div>
    </div>
</section>
@endsection
