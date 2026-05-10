<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login | URL Shortner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary: #a855f7;
            --primary-glow: rgba(168, 85, 247, 0.35);
            --bg: #0b0f1a;
            --surface: rgba(255,255,255,0.05);
            --border: rgba(255,255,255,0.10);
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
        body::before {
            content: ''; position: absolute; border-radius: 50%; filter: blur(90px); opacity: 0.25;
            width: 500px; height: 500px; background: var(--primary); top: -150px; left: -150px;
        }
        .login-card {
            background: var(--surface); backdrop-filter: blur(24px); border: 1px solid var(--border);
            border-radius: 20px; padding: 2.5rem; width: 100%; max-width: 400px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.5); z-index: 10;
        }
        .login-logo { text-align: center; margin-bottom: 2rem; }
        .logo-icon {
            display: inline-flex; align-items: center; justify-content: center;
            width: 64px; height: 64px; background: linear-gradient(135deg, var(--primary), #ec4899);
            border-radius: 16px; font-size: 1.75rem; color: #fff; margin-bottom: 1rem;
        }
        .login-logo h1 { font-size: 1.5rem; font-weight: 700; color: var(--text); }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 0.5rem; }
        .input-wrap { position: relative; }
        .input-wrap input {
            width: 100%; padding: 0.8rem 1rem 0.8rem 2.75rem; background: rgba(255,255,255,0.06);
            border: 1px solid var(--border); border-radius: 10px; color: var(--text); outline: none;
        }
        .input-wrap .input-icon { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
        .btn-login {
            width: 100%; padding: 0.9rem; background: linear-gradient(135deg, var(--primary), #ec4899);
            border: none; border-radius: 10px; color: #fff; font-weight: 600; cursor: pointer;
            margin-top: 1rem; box-shadow: 0 6px 20px var(--primary-glow);
        }
        .alert-error { background: rgba(248, 113, 113, 0.12); border: 1px solid rgba(248, 113, 113, 0.3); border-radius: 10px; padding: 0.75rem; margin-bottom: 1rem; color: var(--danger); font-size: 0.875rem; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <div class="logo-icon"><i class="fa-solid fa-users"></i></div>
            <h1>Member Panel</h1>
            <p style="color: var(--text-muted); font-size: 0.85rem;">Login to generate and manage your URLs</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('member.login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>EMAIL ADDRESS</label>
                <div class="input-wrap">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="member@example.com" required>
                    <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label>PASSWORD</label>
                <div class="input-wrap">
                    <input type="password" name="password" placeholder="••••••••" required>
                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                </div>
            </div>
            <button type="submit" class="btn-login">Sign In</button>
        </form>
    </div>
</body>
</html>
