@extends('superadmin.layouts.app')

@section('title', 'Manage Admins')
@section('page-title', 'Manage Admins')

@section('content')
<div class="content-header">
    <div>
        <h1 class="content-title">Admins (Clients)</h1>
        <p class="content-subtitle">Overview of all invited admin panels and their activity.</p>
    </div>
    <div class="content-header-actions">
        <a href="{{ route('superadmin.admins.invite') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Invite Admin
        </a>
    </div>
</div>

<div class="dash-card">
    <div class="dash-card-body" style="padding: 0;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Users (Members)</th>
                    <th>Total Generated URLs</th>
                    <th>Total URL Hits</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                    <tr>
                        <td class="font-bold">{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td><span class="badge badge-info">{{ $admin->members_count }}</span></td>
                        <td><span class="badge badge-primary">{{ $admin->short_urls_count }}</span></td>
                        <td><span class="badge badge-success">{{ $admin->total_hits }}</span></td>
                        <td>{{ $admin->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center" style="padding: 2rem;">No admins found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 1.5rem;">
    {{ $admins->links('pagination::bootstrap-4') }}
</div>

<style>
    .btn-primary {
        background: linear-gradient(135deg, var(--primary), #a855f7);
        color: #fff;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 12px var(--primary-glow);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 16px var(--primary-glow); }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
    }
    .data-table th {
        text-align: left;
        padding: 1rem 1.25rem;
        background: rgba(255,255,255,0.02);
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
        border-bottom: 1px solid var(--card-border);
    }
    .data-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--card-border);
        color: var(--text-sub);
    }
    .font-bold { font-weight: 700; color: var(--text); }
    .badge {
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-info { background: rgba(14, 165, 233, 0.15); color: #0ea5e9; }
    .badge-primary { background: rgba(99, 102, 241, 0.15); color: var(--primary); }
    .badge-success { background: rgba(52, 211, 153, 0.15); color: var(--success); }
</style>
@endsection
