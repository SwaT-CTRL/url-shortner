<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | URL Shortner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Reuse same root variables */
        :root {
            --sidebar-width: 260px; --sidebar-bg: #0f172a; --sidebar-border: rgba(255,255,255,0.06);
            --header-height: 64px; --header-bg: #111827; --header-border: rgba(255,255,255,0.07);
            --content-bg: #0d1117; --primary: #6366f1; --text: #e2e8f0; --text-muted: #64748b;
            --text-sub: #94a3b8; --border: rgba(255,255,255,0.08); --card-bg: #161d2f; --card-border: rgba(255,255,255,0.07);
            --success: #34d399; --danger: #f87171; --primary-glow: rgba(99, 102, 241, 0.3);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--content-bg); color: var(--text); display: flex; min-height: 100vh; }
        .sidebar { width: var(--sidebar-width); background: var(--sidebar-bg); border-right: 1px solid var(--sidebar-border); position: fixed; top: 0; left: 0; height: 100vh; z-index: 200; display: flex; flex-direction: column; }
        .main-wrapper { margin-left: var(--sidebar-width); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }
        .page-content { flex: 1; padding: 2rem; }
        .top-header { height: var(--header-height); background: var(--header-bg); border-bottom: 1px solid var(--header-border); display: flex; align-items: center; justify-content: space-between; padding: 0 1.5rem; position: sticky; top: 0; z-index: 100; }
        .dash-card { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 16px; overflow: hidden; margin-bottom: 1.5rem; }
        .dash-card-body { padding: 1.25rem; }

        /* Pagination Styles */
        nav[role="navigation"] { display: flex; justify-content: center; }
        .pagination { display: flex; list-style: none; gap: 0.4rem; padding: 0.5rem; border-radius: 10px; background: rgba(255,255,255,0.02); }
        .page-item .page-link { 
            display: flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; 
            background: var(--card-bg); border: 1px solid var(--card-border); color: var(--text-sub); 
            border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;
        }
        .page-item.active .page-link { background: var(--primary); color: #fff; border-color: var(--primary); box-shadow: 0 4px 12px var(--primary-glow); }
        .page-item.disabled .page-link { opacity: 0.4; cursor: not-allowed; }
        .page-item:not(.active):not(.disabled) .page-link:hover { background: rgba(255,255,255,0.05); color: var(--text); border-color: var(--primary); }
    </style>

    @stack('styles')
</head>
<body>
    @include('admin.layouts.sidebar')
    <div class="main-wrapper">
        @include('admin.layouts.header')
        <main class="page-content">
            @yield('content')
        </main>
        @include('admin.layouts.footer')
    </div>
    @stack('scripts')
</body>
</html>
