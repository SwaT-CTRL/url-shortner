@extends('member.layouts.app')

@section('title', 'Member Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2rem;">
    <div>
        <h1 style="font-size: 1.5rem; font-weight: 800;">Welcome, {{ Auth::guard('member')->user()->name }}</h1>
        <p style="color: var(--text-muted); font-size: 0.875rem;">You are logged in as a {{ ucfirst(Auth::guard('member')->user()->role) }}.</p>
    </div>
    <a href="{{ route('member.urls.generate') }}" style="background: linear-gradient(135deg, var(--primary), #ec4899); color: #fff; padding: 0.75rem 1.25rem; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 0.875rem; box-shadow: 0 4px 12px var(--primary-glow);">
        <i class="fa-solid fa-plus"></i> Generate URL
    </a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <div class="dash-card" style="padding: 1.5rem; border-top: 3px solid var(--primary);">
        <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">My URLs</div>
        <div style="font-size: 2rem; font-weight: 800; margin-top: 0.5rem;">{{ $totalUrls }}</div>
    </div>
    <div class="dash-card" style="padding: 1.5rem; border-top: 3px solid var(--success);">
        <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Total Clicks</div>
        <div style="font-size: 2rem; font-weight: 800; margin-top: 0.5rem;">{{ $totalClicks }}</div>
    </div>
</div>
@endsection
