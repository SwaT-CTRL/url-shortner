@extends('superadmin.layouts.app')

@section('title', 'Global Members')
@section('page-title', 'Global Members Management')

@section('content')
<div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="font-size: 1.25rem; font-weight: 700;">All Members</h1>
</div>

<div class="dash-card">
    <div class="dash-card-body" style="padding: 0;">
        <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
            <thead>
                <tr style="background: rgba(255,255,255,0.02); text-align: left;">
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Name</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Email</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Admin Parent</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Joined On</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr style="border-bottom: 1px solid var(--card-border);">
                        <td style="padding: 1rem; font-weight: 600; color: var(--text);">
                            {{ $member->name }}
                        </td>
                        <td style="padding: 1rem; color: var(--text-muted);">
                            {{ $member->email }}
                        </td>
                        <td style="padding: 1rem;">
                            <span style="color: var(--text);">{{ $member->admin->name ?? 'System' }}</span>
                        </td>
                        <td style="padding: 1rem; color: var(--text-muted);">
                            {{ $member->created_at->format('d M, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 2rem; text-align: center; color: var(--text-muted);">No members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 1.5rem;">
    {{ $members->links('pagination::bootstrap-4') }}
</div>
@endsection
