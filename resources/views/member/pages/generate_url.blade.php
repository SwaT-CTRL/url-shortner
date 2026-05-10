@extends('member.layouts.app')

@section('title', 'Generate URL')
@section('page-title', 'Generate Short URL')

@section('content')
<div class="dash-card" style="max-width: 600px; margin: 0 auto;">
    <div style="padding: 1.5rem; border-bottom: 1px solid var(--card-border);">
        <h2 style="font-size: 1.1rem; font-weight: 700;">Create Short Link</h2>
        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">Enter your long URL below to shorten it.</p>
    </div>
    <div class="dash-card-body">
        <form action="{{ route('member.urls.generate.post') }}" method="POST">
            @csrf
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">LONG URL</label>
                <input type="url" name="long_url" class="form-control" placeholder="https://example.com/very-long-link-path" required>
            </div>
            <button type="submit" class="btn-generate">
                <i class="fa-solid fa-bolt"></i> Generate Short Link
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
        width: 100%; padding: 0.9rem; background: linear-gradient(135deg, var(--primary), #ec4899);
        border: none; border-radius: 10px; color: #fff; font-weight: 700; cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 0.75rem;
    }
</style>
@endsection
