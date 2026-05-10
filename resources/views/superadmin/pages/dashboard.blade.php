@extends('superadmin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Page Header --}}
<div class="content-header">
    <div>
        <h1 class="content-title">Dashboard</h1>
        <p class="content-subtitle">Welcome back, {{ auth('superadmin')->user()->name ?? 'Super Admin' }}! Here's what's happening.</p>
    </div>
    <div class="content-header-actions">
        <span class="badge-live"><span class="live-dot"></span> Live</span>
    </div>
</div>

{{-- Stats Grid --}}
<div class="stats-grid">
    <div class="stat-card stat-primary">
        <div class="stat-icon">
            <i class="fa-solid fa-link"></i>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ number_format($totalLinks) }}</div>
            <div class="stat-label">Total Short Links</div>
            <div class="stat-trend neutral"><i class="fa-solid fa-bolt"></i> All time</div>
        </div>
    </div>

    <div class="stat-card stat-success">
        <div class="stat-icon">
            <i class="fa-solid fa-user-tie"></i>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ number_format($totalAdmins) }}</div>
            <div class="stat-label">Total Admins</div>
            <div class="stat-trend neutral"><i class="fa-solid fa-shield"></i> Active panels</div>
        </div>
    </div>

    <div class="stat-card stat-warning">
        <div class="stat-icon">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ number_format($totalMembers) }}</div>
            <div class="stat-label">Total Members</div>
            <div class="stat-trend neutral"><i class="fa-solid fa-user-group"></i> Global count</div>
        </div>
    </div>

    <div class="stat-card stat-purple">
        <div class="stat-icon">
            <i class="fa-solid fa-arrow-pointer"></i>
        </div>
        <div class="stat-body">
            <div class="stat-value">{{ number_format($totalHits) }}</div>
            <div class="stat-label">Total Hits</div>
            <div class="stat-trend neutral"><i class="fa-solid fa-chart-simple"></i> Avg: {{ $clickRate }} / link</div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Content header */
    .content-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 1.75rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .content-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--text);
        letter-spacing: -0.03em;
    }
    .content-subtitle {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin-top: 0.25rem;
    }
    .content-header-actions { display: flex; align-items: center; gap: 0.75rem; }
    .badge-live {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.35rem 0.8rem;
        background: rgba(52, 211, 153, 0.12);
        border: 1px solid rgba(52,211,153,0.25);
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--success);
        letter-spacing: 0.04em;
    }
    .live-dot {
        width: 7px; height: 7px;
        background: var(--success);
        border-radius: 50%;
        animation: pulse-dot 2s ease-in-out infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.75rem;
    }
    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        padding: 1.4rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
        overflow: hidden;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 16px 16px 0 0;
    }
    .stat-primary::before  { background: linear-gradient(90deg, var(--primary), #a855f7); }
    .stat-success::before  { background: linear-gradient(90deg, var(--success), #059669); }
    .stat-warning::before  { background: linear-gradient(90deg, var(--warning), #f59e0b); }
    .stat-purple::before   { background: linear-gradient(90deg, #a855f7, #ec4899); }

    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(0,0,0,0.3); }

    .stat-icon {
        width: 52px; height: 52px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .stat-primary .stat-icon  { background: rgba(99,102,241,0.15); color: var(--primary); }
    .stat-success .stat-icon  { background: rgba(52,211,153,0.15); color: var(--success); }
    .stat-warning .stat-icon  { background: rgba(251,191,36,0.15); color: var(--warning); }
    .stat-purple .stat-icon   { background: rgba(168,85,247,0.15); color: #a855f7; }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--text);
        letter-spacing: -0.04em;
        line-height: 1;
    }
    .stat-label {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-top: 0.25rem;
        font-weight: 500;
    }
    .stat-trend {
        font-size: 0.72rem;
        margin-top: 0.4rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    .stat-trend.neutral { color: var(--text-muted); }

    /* Bottom grid */
    .dash-bottom-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }
    @media (max-width: 900px) { .dash-bottom-grid { grid-template-columns: 1fr; } }

    .dash-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        overflow: hidden;
    }
    .dash-card-header {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--card-border);
    }
    .dash-card-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--text);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .dash-card-title i { color: var(--primary); }
    .dash-card-body { padding: 1.25rem; }

    /* Empty State */
    .empty-state { text-align: center; padding: 2rem 1rem; }
    .empty-icon { font-size: 2.5rem; color: var(--text-muted); margin-bottom: 0.75rem; }
    .empty-text { font-size: 0.95rem; font-weight: 600; color: var(--text-sub); }
    .empty-sub { font-size: 0.8rem; color: var(--text-muted); margin-top: 0.35rem; }

    /* Info list */
    .info-list { list-style: none; }
    .info-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.6rem 0;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        font-size: 0.85rem;
    }
    .info-item:last-child { border-bottom: none; }
    .info-label { color: var(--text-muted); display: flex; align-items: center; gap: 0.5rem; }
    .info-label i { width: 14px; text-align: center; color: var(--primary); }
    .info-value { color: var(--text); font-weight: 600; }
    .badge-env {
        background: rgba(52,211,153,0.12);
        color: var(--success);
        padding: 0.15rem 0.5rem;
        border-radius: 50px;
        font-size: 0.75rem;
    }

    /* Activity List */
    .activity-list { display: flex; flex-direction: column; }
    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background 0.2s;
    }
    .activity-item:last-child { border-bottom: none; }
    .activity-item:hover { background: rgba(255,255,255,0.02); }
    .activity-icon {
        width: 36px; height: 36px;
        background: rgba(99,102,241,0.1);
        color: var(--primary);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.85rem;
        flex-shrink: 0;
    }
    .activity-text { font-size: 0.85rem; color: var(--text-sub); }
    .activity-text strong { color: var(--text); }
    .activity-time { font-size: 0.75rem; color: var(--text-muted); margin-top: 0.2rem; }
</style>

@endpush
