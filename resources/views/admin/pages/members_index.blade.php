@extends('admin.layouts.app')

@section('title', 'Manage Members')
@section('page-title', 'Members Management')

@section('content')
<div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="font-size: 1.25rem; font-weight: 700;">All Members</h1>
    <a href="{{ route('admin.members.invite') }}" style="font-size: 0.85rem; color: var(--primary); font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.4rem;">
        <i class="fa-solid fa-user-plus"></i> Invite Member
    </a>
</div>

<div class="dash-card">
    <div class="dash-card-body" style="padding: 0;">
        <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
            <thead>
                <tr style="background: rgba(255,255,255,0.02); text-align: left;">
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Name</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Email</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Role</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Joined On</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr style="border-bottom: 1px solid var(--card-border);">
                        <td style="padding: 1rem; font-weight: 600; color: var(--text);">
                            {{ $user->name }}
                        </td>
                        <td style="padding: 1rem; color: var(--text-muted);">
                            {{ $user->email }}
                        </td>
                        <td style="padding: 1rem;">
                            <span style="background: {{ $user->role == 'admin' ? 'rgba(99, 102, 241, 0.1)' : 'rgba(52, 211, 153, 0.1)' }}; color: {{ $user->role == 'admin' ? 'var(--primary)' : 'var(--success)' }}; padding: 0.2rem 0.6rem; border-radius: 5px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase;">
                                {{ $user->role }}
                            </span>
                        </td>

                        <td style="padding: 1rem; color: var(--text-muted);">
                            {{ $user->created_at->format('d M, Y') }}
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" style="padding: 2rem; text-align: center; color: var(--text-muted);">No members found.</td>
                    </tr>
                @endforelse
            </tbody>
    </div>
</div>

<div style="margin-top: 1.5rem;">
    {{ $users->links('pagination::bootstrap-4') }}
</div>
@endsection

