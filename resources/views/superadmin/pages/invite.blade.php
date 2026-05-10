@extends('superadmin.layouts.app')

@section('title', 'Invite Admin')
@section('page-title', 'Invite Admin')

@section('content')
<div class="content-header">
    <div>
        <h1 class="content-title">Invite New Admin</h1>
        <p class="content-subtitle">Send an invitation to a new client to manage their own URL shortener panel.</p>
    </div>
</div>

<div class="dash-card" style="max-width: 600px;">
    <div class="dash-card-body">
        <form action="{{ route('superadmin.admins.invite.post') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-muted); font-size: 0.85rem; font-weight: 600;">CLIENT NAME</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter client name" required>
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-muted); font-size: 0.85rem; font-weight: 600;">EMAIL ADDRESS</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="client@example.com" required>
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-muted); font-size: 0.85rem; font-weight: 600;">TEMPORARY PASSWORD</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.5rem;">This password will be sent to the client via email.</p>
            </div>

            <button type="submit" class="btn-invite">
                <i class="fa-solid fa-paper-plane"></i> Send Invitation
            </button>
        </form>
    </div>
</div>

<style>
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border);
        border-radius: 10px;
        color: var(--text);
        font-family: 'Inter', sans-serif;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-glow);
    }
    .btn-invite {
        width: 100%;
        padding: 0.85rem;
        background: linear-gradient(135deg, var(--primary), #a855f7);
        border: none;
        border-radius: 10px;
        color: #fff;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        box-shadow: 0 6px 16px var(--primary-glow);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-invite:hover { transform: translateY(-1px); box-shadow: 0 8px 20px var(--primary-glow); }
</style>
@endsection
