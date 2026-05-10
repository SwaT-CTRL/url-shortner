@extends('admin.layouts.app')

@section('title', 'Invite Team')
@section('page-title', 'Invite Team Member')

@section('content')
<div class="dash-card" style="max-width: 600px; margin: 0 auto;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--card-border);">
        <h2 style="font-size: 1.1rem; font-weight: 700;">Invite Admin or Member</h2>
        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">New invitees will receive an email with their credentials.</p>
    </div>
    <div class="dash-card-body">
        <form action="{{ route('admin.members.invite.post') }}" method="POST">
            @csrf
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">MEMBER NAME</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe" required>
            </div>
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
            </div>
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">PASSWORD</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div style="margin-bottom: 2rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">CHOOSE ROLE</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <button type="submit" class="btn-generate">
                <i class="fa-solid fa-paper-plane"></i> Send Invite
            </button>
        </form>
    </div>
</div>

<style>
    .form-control {
        width: 100%; padding: 0.85rem 1rem; background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border); border-radius: 10px; color: var(--text); outline: none;
    }
    .btn-generate {
        width: 100%; padding: 0.9rem; background: linear-gradient(135deg, var(--primary), #a855f7);
        border: none; border-radius: 10px; color: #fff; font-weight: 700; cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 0.75rem;
    }
</style>
@endsection
