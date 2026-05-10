<aside class="sidebar" id="superadminSidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="fa-solid fa-link"></i>
        </div>
        <div class="brand-text">
            <span class="brand-name">URL Shortner</span>
            <span class="brand-sub">Superadmin</span>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>

        <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-gauge-high"></i></span>
            <span class="nav-text">Dashboard</span>
            @if(request()->routeIs('superadmin.dashboard'))
                <span class="nav-active-dot"></span>
            @endif
        </a>

        {{-- Placeholder items for future expansion --}}
        <div class="nav-section-label" style="margin-top:1rem;">Management</div>

        <a href="{{ route('superadmin.admins.index') }}" class="nav-link {{ request()->routeIs('superadmin.admins.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-user-tie"></i></span>
            <span class="nav-text">Admins</span>
        </a>

        <a href="{{ route('superadmin.members.index') }}" class="nav-link {{ request()->routeIs('superadmin.members.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-users"></i></span>
            <span class="nav-text">Global Members</span>
        </a>


        <a href="{{ route('superadmin.urls.index') }}" class="nav-link {{ request()->routeIs('superadmin.urls.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-scissors"></i></span>
            <span class="nav-text">Short Links</span>
        </a>
    </nav>

    {{-- Sidebar Footer --}}
    <div class="sidebar-footer">
        <div class="sidebar-user-mini">
            <div class="user-avatar-sm">
                {{ strtoupper(substr(auth('superadmin')->user()->name ?? 'S', 0, 1)) }}
            </div>
            <div class="user-info-sm">
                <span class="user-name-sm">{{ auth('superadmin')->user()->name ?? 'Super Admin' }}</span>
                <span class="user-role-sm">Superadmin</span>
            </div>
        </div>
    </div>

</aside>

<style>
    /* Brand */
    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 1.5rem 1.25rem 1.25rem;
        border-bottom: 1px solid var(--sidebar-border);
    }
    .brand-icon {
        width: 42px; height: 42px;
        background: linear-gradient(135deg, var(--primary), #a855f7);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        color: #fff;
        flex-shrink: 0;
        box-shadow: 0 4px 14px var(--primary-glow);
    }
    .brand-name {
        display: block;
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--text);
        letter-spacing: -0.01em;
    }
    .brand-sub {
        display: block;
        font-size: 0.7rem;
        color: var(--primary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    /* Nav */
    .sidebar-nav {
        flex: 1;
        padding: 1.25rem 0.75rem;
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }
    .nav-section-label {
        font-size: 0.68rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--text-muted);
        padding: 0 0.625rem;
        margin-bottom: 0.4rem;
        margin-top: 0.5rem;
    }
    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.65rem 0.875rem;
        border-radius: 10px;
        text-decoration: none;
        color: var(--text-sub);
        font-size: 0.875rem;
        font-weight: 500;
        transition: background 0.2s, color 0.2s, transform 0.15s;
        position: relative;
    }
    .nav-link:hover:not(.nav-disabled) {
        background: var(--sidebar-hover);
        color: var(--text);
        transform: translateX(2px);
    }
    .nav-link.active {
        background: var(--sidebar-active);
        color: var(--primary);
    }
    .nav-link.nav-disabled {
        opacity: 0.45;
        cursor: default;
    }
    .nav-icon {
        width: 20px;
        text-align: center;
        font-size: 0.95rem;
        flex-shrink: 0;
    }
    .nav-text { flex: 1; }
    .nav-active-dot {
        width: 7px; height: 7px;
        background: var(--primary);
        border-radius: 50%;
        box-shadow: 0 0 6px var(--primary-glow);
    }
    .nav-badge {
        font-size: 0.65rem;
        font-weight: 700;
        padding: 0.15rem 0.45rem;
        background: rgba(99,102,241,0.15);
        color: var(--primary);
        border-radius: 50px;
        letter-spacing: 0.04em;
    }

    /* Sidebar Footer */
    .sidebar-footer {
        padding: 1rem;
        border-top: 1px solid var(--sidebar-border);
    }
    .sidebar-user-mini {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 0.75rem;
        border-radius: 10px;
        background: rgba(255,255,255,0.04);
    }
    .user-avatar-sm {
        width: 34px; height: 34px;
        background: linear-gradient(135deg, var(--primary), #a855f7);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }
    .user-name-sm {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 140px;
    }
    .user-role-sm {
        display: block;
        font-size: 0.68rem;
        color: var(--primary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }
</style>
