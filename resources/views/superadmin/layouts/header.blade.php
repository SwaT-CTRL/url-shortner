<header class="top-header">
    <div class="header-left">
        <button class="sidebar-toggle-btn" id="sidebarToggle" aria-label="Toggle sidebar">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="header-breadcrumb">
            <span class="breadcrumb-page">@yield('page-title', 'Dashboard')</span>
        </div>
    </div>

    <div class="header-right">

        <div class="user-dropdown" id="userDropdown">
            <button class="user-dropdown-trigger" id="userDropdownBtn" aria-haspopup="true" aria-expanded="false">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth('superadmin')->user()->name ?? 'S', 0, 1)) }}
                </div>
                <div class="user-meta">
                    <span class="user-greeting">Welcome back,</span>
                    <span class="user-name">{{ auth('superadmin')->user()->name ?? 'Super Admin' }}</span>
                </div>
                <i class="fa-solid fa-chevron-down dropdown-arrow" id="dropdownArrow"></i>
            </button>

            <div class="dropdown-menu" id="dropdownMenu">
                <div class="dropdown-header">
                    <div class="dh-avatar">
                        {{ strtoupper(substr(auth('superadmin')->user()->name ?? 'S', 0, 1)) }}
                    </div>
                    <div>
                        <div class="dh-name">{{ auth('superadmin')->user()->name ?? 'Super Admin' }}</div>
                        <div class="dh-email">{{ auth('superadmin')->user()->email ?? '' }}</div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <a href="{{ route('superadmin.dashboard') }}" class="dropdown-item">
                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                </a>

                <div class="dropdown-divider"></div>

                <form id="logoutForm" action="{{ route('superadmin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-logout" id="logoutBtn">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<style>
    .top-header {
        height: var(--header-height);
        background: var(--header-bg);
        border-bottom: 1px solid var(--header-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1.5rem;
        position: sticky;
        top: 0;
        z-index: 100;
        backdrop-filter: blur(10px);
    }

    /* Left side */
    .header-left {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .sidebar-toggle-btn {
        display: none;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-sub);
        cursor: pointer;
        font-size: 0.95rem;
        transition: background 0.2s, color 0.2s;
    }

    .sidebar-toggle-btn:hover {
        background: rgba(255, 255, 255, 0.12);
        color: var(--text);
    }

    @media (max-width: 768px) {
        .sidebar-toggle-btn {
            display: flex;
        }
    }

    .breadcrumb-page {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text);
        letter-spacing: -0.01em;
    }

    /* Right side */
    .header-right {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .header-icon-btn {
        position: relative;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border);
        border-radius: 9px;
        color: var(--text-sub);
        cursor: pointer;
        font-size: 0.95rem;
        transition: background 0.2s, color 0.2s;
    }

    .header-icon-btn:hover {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
    }

    .notif-dot {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 7px;
        height: 7px;
        background: var(--danger);
        border-radius: 50%;
        border: 1.5px solid var(--header-bg);
    }

    /* User Dropdown */
    .user-dropdown {
        position: relative;
    }

    .user-dropdown-trigger {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.45rem 0.75rem 0.45rem 0.45rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border);
        border-radius: 12px;
        cursor: pointer;
        color: var(--text);
        transition: background 0.2s, border-color 0.2s;
    }

    .user-dropdown-trigger:hover {
        background: rgba(255, 255, 255, 0.09);
        border-color: rgba(255, 255, 255, 0.16);
    }

    .user-dropdown-trigger.open {
        background: rgba(99, 102, 241, 0.12);
        border-color: rgba(99, 102, 241, 0.4);
    }

    .user-avatar {
        width: 34px;
        height: 34px;
        background: linear-gradient(135deg, var(--primary), #a855f7);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    .user-meta {
        display: flex;
        flex-direction: column;
        text-align: left;
    }

    .user-greeting {
        font-size: 0.68rem;
        color: var(--text-muted);
        line-height: 1;
    }

    .user-name {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--text);
        max-width: 130px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dropdown-arrow {
        font-size: 0.7rem;
        color: var(--text-muted);
        transition: transform 0.25s;
    }

    .dropdown-arrow.rotated {
        transform: rotate(180deg);
    }

    @media (max-width: 480px) {
        .user-meta {
            display: none;
        }

        .user-dropdown-trigger {
            padding: 0.45rem;
        }
    }

    /* Dropdown Menu */
    .dropdown-menu {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 240px;
        background: #1a2236;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 14px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.55), 0 0 0 1px rgba(255, 255, 255, 0.04) inset;
        overflow: hidden;
        opacity: 0;
        transform: translateY(-8px) scale(0.97);
        pointer-events: none;
        transition: opacity 0.2s, transform 0.2s;
        z-index: 999;
    }

    .dropdown-menu.open {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }

    .dropdown-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1rem;
        background: rgba(99, 102, 241, 0.08);
    }

    .dh-avatar {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, var(--primary), #a855f7);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    .dh-name {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text);
    }

    .dh-email {
        font-size: 0.72rem;
        color: var(--text-muted);
        margin-top: 1px;
    }

    .dropdown-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.07);
        margin: 0.3rem 0;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.6rem 1rem;
        color: var(--text-sub);
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
        transition: background 0.18s, color 0.18s;
    }

    .dropdown-item:hover {
        background: rgba(255, 255, 255, 0.06);
        color: var(--text);
    }

    .dropdown-item i {
        width: 16px;
        text-align: center;
    }

    .dropdown-logout {
        color: var(--danger) !important;
    }

    .dropdown-logout:hover {
        background: rgba(248, 113, 113, 0.1) !important;
    }
</style>

<script>
    (function () {
        const btn = document.getElementById('userDropdownBtn');
        const menu = document.getElementById('dropdownMenu');
        const arrow = document.getElementById('dropdownArrow');

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = menu.classList.toggle('open');
            btn.classList.toggle('open', isOpen);
            arrow.classList.toggle('rotated', isOpen);
            btn.setAttribute('aria-expanded', isOpen);
        });

        document.addEventListener('click', function (e) {
            if (!document.getElementById('userDropdown').contains(e.target)) {
                menu.classList.remove('open');
                btn.classList.remove('open');
                arrow.classList.remove('rotated');
                btn.setAttribute('aria-expanded', 'false');
            }
        });

        // Logout confirm
        document.getElementById('logoutBtn').addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        });
    })();
</script>