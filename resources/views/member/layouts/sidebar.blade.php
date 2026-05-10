<aside class="sidebar">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--sidebar-border); display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--primary), #ec4899); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #fff;">
            <i class="fa-solid fa-link"></i>
        </div>
        <span style="font-weight: 700; font-size: 1rem; color: var(--text);">URL Member</span>
    </div>
    <nav style="padding: 1rem; display: flex; flex-direction: column; gap: 0.5rem;">
        <a href="{{ route('member.dashboard') }}" class="nav-link {{ request()->routeIs('member.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge-high"></i> Dashboard
        </a>
        <a href="{{ route('member.urls.index') }}" class="nav-link {{ request()->routeIs('member.urls.*') ? 'active' : '' }}">
            <i class="fa-solid fa-scissors"></i> My URLs
        </a>
    </nav>
</aside>

<style>
    .nav-link {
        display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 10px;
        text-decoration: none; color: var(--text-sub); font-size: 0.875rem; font-weight: 500; transition: all 0.2s;
    }
    .nav-link:hover { background: rgba(255,255,255,0.05); color: var(--text); }
    .nav-link.active { background: rgba(168,85,247,0.1); color: var(--primary); font-weight: 600; }
    .nav-link i { width: 18px; text-align: center; }
</style>
