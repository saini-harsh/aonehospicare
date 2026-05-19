@extends('layouts.admin')

@section('admin_content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 30px;">
        <h2 style="color: var(--primary); font-weight: 800; margin: 0;">System Settings</h2>
        <p style="color: #64748b; font-size: 14px;">Manage administrative profile and security credentials.</p>
    </div>

    @if(session('success'))
    <div style="background: #f0fdf4; color: #166534; padding: 15px 20px; border-radius: 12px; margin-bottom: 30px; border: 1px solid #dcfce7; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <i data-lucide="check-circle" size="20"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div style="background: #fef2f2; color: #991b1b; padding: 15px 20px; border-radius: 12px; margin-bottom: 30px; border: 1px solid #fee2e2; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <i data-lucide="alert-circle" size="20"></i> {{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div style="background: #fef2f2; color: #991b1b; padding: 20px; border-radius: 12px; margin-bottom: 30px; border: 1px solid #fee2e2;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="admin-card" style="padding: 40px;">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 40px;">
            <div class="form-group">
                <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Full Name</label>
                <input type="text" name="name" value="{{ $admin->name }}" required style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600; background: #f8fafc;">
            </div>
            <div class="form-group">
                <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Username</label>
                <input type="text" name="username" value="{{ $admin->username }}" required autocomplete="off" style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600; background: #f8fafc;">
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Email Address</label>
                <input type="email" name="email" value="{{ $admin->email }}" required style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600; background: #f8fafc;">
            </div>
        </div>

        <div style="border-top: 1px dashed #e2e8f0; padding-top: 40px; margin-top: 40px;">
            <h4 style="color: var(--primary); font-weight: 800; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <i data-lucide="shield-check"></i> Security Configuration
            </h4>
            <p style="color: #64748b; font-size: 13px; margin-bottom: 25px;">Leave password fields empty if you don't want to change the current password.</p>
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 25px;">
                <div class="form-group">
                    <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Current Password</label>
                    <input type="password" name="current_password" style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600;">
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                    <div class="form-group">
                        <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">New Password</label>
                        <input type="password" name="new_password" style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600;">
                    </div>
                    <div class="form-group">
                        <label style="display: block; font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 13px; text-transform: uppercase;">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; font-weight: 600;">
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 40px; text-align: right;">
            <button type="submit" class="btn btn-primary" style="padding: 15px 40px; border-radius: 12px; font-weight: 800;">SAVE CONFIGURATION</button>
        </div>
    </form>
</div>
@endsection
