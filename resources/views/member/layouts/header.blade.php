<header class="top-header">
    <div class="header-left">
        <span style="font-weight: 700; color: var(--text);">@yield('page-title', 'Dashboard')</span>
    </div>
    <div class="header-right" style="display: flex; align-items: center; gap: 1rem;">
        <div class="user-info" style="text-align: right;">
            <div style="font-size: 0.85rem; font-weight: 600; color: var(--text);">{{ Auth::guard('member')->user()->name }}</div>
            <div style="font-size: 0.7rem; color: var(--primary); text-transform: uppercase; font-weight: 700;">{{ Auth::guard('member')->user()->role }}</div>
        </div>
        <form action="{{ route('member.logout') }}" method="POST">
            @csrf
            <button type="submit" style="background: rgba(248, 113, 113, 0.1); border: 1px solid rgba(248, 113, 113, 0.2); color: var(--danger); padding: 0.4rem 0.8rem; border-radius: 8px; font-size: 0.75rem; font-weight: 700; cursor: pointer;">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>
</header>
