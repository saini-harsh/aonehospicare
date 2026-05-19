<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | A One Hospicare</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            background: #f8fafc;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            padding: 50px;
            border-radius: 30px;
            width: 450px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-logo img {
            height: 50px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input {
            width: 100%;
            padding: 18px 25px;
            border: 2px solid #eef2f6;
            border-radius: 15px;
            font-size: 15px;
            transition: var(--transition);
        }

        .form-group input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 5px rgba(0, 77, 64, 0.05);
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="Logo">
            <p
                style="margin-top: 15px; font-weight: 800; color: var(--primary); letter-spacing: 1px; font-size: 0.9rem;">
                ADMINISTRATION PORTAL</p>
        </div>
        
        @if(session('error'))
            <div style="background: #fee2e2; color: #dc2626; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; font-weight: 600; text-align: center; border: 1px solid #fecaca;">
                {{ session('error') }}
            </div>
        @endif

        <form action="/admin" method="POST">
            @csrf
            <div class="form-group">
                <label>Admin Email</label>
                <input type="email" name="email" placeholder="admin@aonehospicare.com" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary"
                style="width: 100%; padding: 18px; border-radius: 15px; font-weight: 800; font-size: 1rem; margin-top: 10px;">SECURE
                SIGN IN</button>
        </form>

        <p style="text-align: center; margin-top: 30px; font-size: 12px; color: #94a3b8; font-weight: 600;">
            <i data-lucide="shield-check" size="14" style="vertical-align: middle; color: var(--secondary);"></i>
            Proprietary Internal Access Only
        </p>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>