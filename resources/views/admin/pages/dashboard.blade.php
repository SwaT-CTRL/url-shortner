@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2rem;">
    <div>
        <h1 style="font-size: 1.5rem; font-weight: 800;">Welcome, {{ Auth::guard('admin')->user()->name }}</h1>
        <p style="color: var(--text-muted); font-size: 0.875rem;">Here is your panel overview.</p>
    </div>
    <a href="{{ route('admin.urls.generate') }}" style="background: linear-gradient(135deg, var(--primary), #a855f7); color: #fff; padding: 0.75rem 1.25rem; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 0.875rem; box-shadow: 0 4px 12px var(--primary-glow);">
        <i class="fa-solid fa-plus"></i> Generate URL
    </a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <div class="dash-card" style="padding: 1.5rem; border-top: 3px solid var(--primary);">
        <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Total URLs</div>
        <div style="font-size: 2rem; font-weight: 800; margin-top: 0.5rem;">{{ $totalUrls }}</div>
    </div>
    <div class="dash-card" style="padding: 1.5rem; border-top: 3px solid var(--success);">
        <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Total Clicks</div>
        <div style="font-size: 2rem; font-weight: 800; margin-top: 0.5rem;">{{ $totalClicks }}</div>
    </div>
    <div class="dash-card" style="padding: 1.5rem; border-top: 3px solid #a855f7;">
        <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Team Members</div>
        <div style="font-size: 2rem; font-weight: 800; margin-top: 0.5rem;">{{ $totalMembers }}</div>
    </div>
</div>

<div class="dash-card">
    <div style="padding: 1.25rem; border-bottom: 1px solid var(--card-border); font-weight: 700;">Quick Actions</div>
    <div class="dash-card-body" style="display: flex; gap: 1rem;">
        <a href="{{ route('admin.members.invite') }}" style="flex: 1; padding: 1rem; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 12px; text-decoration: none; text-align: center; transition: all 0.2s;">
            <i class="fa-solid fa-user-plus" style="font-size: 1.5rem; color: var(--primary); margin-bottom: 0.5rem; display: block;"></i>
            <span style="font-size: 0.85rem; font-weight: 600; color: var(--text);">Invite Team</span>
        </a>
        <a href="{{ route('admin.urls.index') }}" style="flex: 1; padding: 1rem; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 12px; text-decoration: none; text-align: center; transition: all 0.2s;">
            <i class="fa-solid fa-list-ul" style="font-size: 1.5rem; color: var(--success); margin-bottom: 0.5rem; display: block;"></i>
            <span style="font-size: 0.85rem; font-weight: 600; color: var(--text);">View All URLs</span>
        </a>
    </div>
</div>

<style>
    .dash-card a:hover { background: rgba(255,255,255,0.07); transform: translateY(-2px); }
</style>
@endsection
