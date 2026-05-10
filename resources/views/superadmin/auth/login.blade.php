<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Superadmin Login - URL Shortner Management Panel">
    <title>Superadmin Login | URL Shortner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-glow: rgba(99, 102, 241, 0.35);
            --bg: #0b0f1a;
            --surface: rgba(255, 255, 255, 0.05);
            --border: rgba(255, 255, 255, 0.10);
            --text: #e2e8f0;
            --text-muted: #94a3b8;
            --danger: #f87171;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background blobs */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.25;
            animation: drift 12s ease-in-out infinite alternate;
        }

        body::before {
            width: 500px;
            height: 500px;
            background: var(--primary);
            top: -150px;
            left: -150px;
        }

        body::after {
            width: 400px;
            height: 400px;
            background: #a855f7;
            bottom: -120px;
            right: -120px;
            animation-delay: -6s;
        }

        @keyframes drift {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(40px, 30px) scale(1.08);
            }
        }

        /* Card */
        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 1rem;
        }

        .login-card {
            background: var(--surface);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.04) inset;
            animation: slideUp 0.5s cubic-bezier(.22, .68, 0, 1.2) both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(32px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo */
        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo .logo-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary), #a855f7);
            border-radius: 16px;
            font-size: 1.75rem;
            color: #fff;
            margin-bottom: 1rem;
            box-shadow: 0 8px 24px var(--primary-glow);
        }

        .login-logo h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.02em;
        }

        .login-logo p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        /* Error alert */
        .alert-error {
            background: rgba(248, 113, 113, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.3);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--danger);
        }

        /* Form */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.5rem;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-wrap input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.75rem;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s, background 0.25s;
        }

        .input-wrap input:focus {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.08);
            box-shadow: 0 0 0 3px var(--primary-glow);
        }

        .input-wrap input:focus+.input-icon,
        .input-wrap:focus-within .input-icon {
            color: var(--primary);
        }

        .input-wrap input.is-invalid {
            border-color: var(--danger);
            box-shadow: 0 0 0 3px rgba(248, 113, 113, 0.2);
        }

        .invalid-feedback {
            font-size: 0.78rem;
            color: var(--danger);
            margin-top: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Remember + forgot row */
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        .checkbox-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        /* Login button */
        .btn-login {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--primary), #a855f7);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: 0.02em;
            transition: transform 0.15s, box-shadow 0.2s, opacity 0.2s;
            box-shadow: 0 6px 20px var(--primary-glow);
            position: relative;
            overflow: hidden;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0);
            transition: background 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 28px var(--primary-glow);
        }

        .btn-login:hover::after {
            background: rgba(255, 255, 255, 0.06);
        }

        .btn-login:active {
            transform: translateY(1px);
        }

        /* Footer text */
        .login-footer {
            text-align: center;
            margin-top: 1.75rem;
            font-size: 0.8rem;
            color: var(--text-muted);
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-logo">
                <div class="logo-icon">
                    <i class="fa-solid fa-link"></i>
                </div>
                <h1>Superadmin Panel</h1>
                <p>URL Shortner Management System</p>
            </div>

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form id="loginForm" action="{{ route('superadmin.login.post') }}" method="POST" autocomplete="off">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrap">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="superadmin@urlshortner.com"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}" required autofocus>
                        <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input type="password" id="password" name="password" placeholder="••••••••••"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                        <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" id="loginBtn" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket" style="margin-right:0.5rem;"></i>
                    Sign In
                </button>
            </form>

            <div class="login-footer">
                &copy; {{ date('Y') }} URL Shortner &mdash; Superadmin Access Only
            </div>

        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('loginBtn');
            btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin" style="margin-right:0.5rem;"></i> Signing in...';
            btn.style.opacity = '0.85';
            btn.disabled = true;
        });
    </script>

</body>

</html>