<footer class="panel-footer">
    <div class="footer-inner">
        <span class="footer-copy">
            &copy; {{ date('Y') }} <strong>URL Shortner</strong> &mdash; Superadmin Panel
        </span>
        <span class="footer-version">
            Laravel {{ app()->version() }}
        </span>
    </div>
</footer>

<style>
    .panel-footer {
        background: var(--header-bg);
        border-top: 1px solid var(--header-border);
        padding: 0.85rem 1.5rem;
    }
    .footer-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    .footer-copy {
        font-size: 0.8rem;
        color: var(--text-muted);
    }
    .footer-copy strong {
        color: var(--text-sub);
        font-weight: 600;
    }
    .footer-version {
        font-size: 0.75rem;
        color: var(--text-muted);
        background: rgba(99,102,241,0.1);
        color: var(--primary);
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        font-weight: 500;
    }
</style>
