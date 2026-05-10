<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Superadmin Panel - URL Shortner">
    <title>@yield('title', 'Dashboard') | Superadmin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sidebar-width:    260px;
            --sidebar-bg:       #0f172a;
            --sidebar-border:   rgba(255,255,255,0.06);
            --sidebar-hover:    rgba(99,102,241,0.12);
            --sidebar-active:   rgba(99,102,241,0.20);
            --header-height:    64px;
            --header-bg:        #111827;
            --header-border:    rgba(255,255,255,0.07);
            --content-bg:       #0d1117;
            --primary:          #6366f1;
            --primary-dark:     #4f46e5;
            --primary-glow:     rgba(99,102,241,0.30);
            --text:             #e2e8f0;
            --text-muted:       #64748b;
            --text-sub:         #94a3b8;
            --border:           rgba(255,255,255,0.08);
            --card-bg:          #161d2f;
            --card-border:      rgba(255,255,255,0.07);
            --success:          #34d399;
            --warning:          #fbbf24;
            --danger:           #f87171;
        }

        html, body { height: 100%; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        /* ============================================================
           SIDEBAR
        ============================================================ */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            height: 100vh;
            z-index: 200;
            transition: transform 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* ============================================================
           MAIN WRAPPER
        ============================================================ */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ============================================================
           CONTENT
        ============================================================ */
        .page-content {
            flex: 1;
            padding: 2rem;
            background: var(--content-bg);
        }

        /* Sidebar overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.6);
            z-index: 199;
            backdrop-filter: blur(2px);
        }

        /* Mobile */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.active { display: block; }
            .main-wrapper { margin-left: 0; }
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.22); }

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
        .page-item:not(.active):not(.disabled) .page-link:hover { background: var(--sidebar-hover); color: var(--text); border-color: var(--primary); }
    </style>

    @stack('styles')
</head>
<body>

{{-- Sidebar Overlay (mobile) --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

{{-- Sidebar --}}
@include('superadmin.layouts.sidebar')

{{-- Main Wrapper --}}
<div class="main-wrapper">

    {{-- Header --}}
    @include('superadmin.layouts.header')

    {{-- Page Content --}}
    <main class="page-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('superadmin.layouts.footer')

</div>

<script>
    // Mobile sidebar toggle
    const sidebar        = document.getElementById('superadminSidebar');
    const overlay        = document.getElementById('sidebarOverlay');
    const toggleBtn      = document.getElementById('sidebarToggle');

    function openSidebar()  { sidebar.classList.add('open'); overlay.classList.add('active'); }
    function closeSidebar() { sidebar.classList.remove('open'); overlay.classList.remove('active'); }

    if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
    overlay.addEventListener('click', closeSidebar);

    // Active link highlighting
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href') && currentPath.startsWith(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
</script>
@stack('scripts')
</body>
</html>
