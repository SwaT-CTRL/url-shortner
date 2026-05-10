@extends('admin.layouts.app')

@section('title', 'URL Data')
@section('page-title', 'Shortened URLs')

@section('content')
<div style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">URL Management</h1>
        <form action="{{ route('admin.urls.index') }}" method="GET" id="filterForm" style="display: flex; align-items: center; gap: 0.5rem;">
            <select name="filter" onchange="this.form.submit()" style="padding: 0.4rem 0.8rem; background: var(--card-bg); border: 1px solid var(--card-border); color: var(--text); border-radius: 8px; font-size: 0.85rem; cursor: pointer; outline: none;">
                <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>All URLs</option>
                <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Today</option>
                <option value="this_week" {{ request('filter') == 'this_week' ? 'selected' : '' }}>This Week</option>
                <option value="this_month" {{ request('filter') == 'this_month' ? 'selected' : '' }}>This Month</option>
                <option value="last_month" {{ request('filter') == 'last_month' ? 'selected' : '' }}>Last Month</option>
            </select>
            <a href="{{ route('admin.urls.pdf', ['filter' => request('filter')]) }}" style="padding: 0.45rem 1rem; background: var(--primary); color: #fff; border-radius: 8px; font-size: 0.85rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.5rem; transition: background 0.2s;">
                <i class="fa-solid fa-file-pdf"></i> Download PDF
            </a>
        </form>
    </div>
    <a href="{{ route('admin.urls.generate') }}" style="font-size: 0.85rem; color: var(--primary); font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.4rem;">
        <i class="fa-solid fa-plus"></i> New Link
    </a>
</div>


<div class="dash-card">
    <div class="dash-card-body" style="padding: 0;">
        <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
            <thead>
                <tr style="background: rgba(255,255,255,0.02); text-align: left;">
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Short URL</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Long URL</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Hits</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Generator</th>
                    <th style="padding: 1rem; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase;">Created On</th>
                </tr>
            </thead>
            <tbody>
                @forelse($urls as $url)
                    <tr style="border-bottom: 1px solid var(--card-border);">
                        <td style="padding: 1rem;">
                            <a href="{{ $url->short_url }}" target="_blank" style="color: var(--primary); font-weight: 700; text-decoration: none;">
                                {{ $url->short_code }}
                            </a>
                        </td>
                        <td style="padding: 1rem; color: var(--text-muted); max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{ $url->long_url }}
                        </td>
                        <td style="padding: 1rem;">
                            <span style="background: rgba(52, 211, 153, 0.1); color: var(--success); padding: 0.2rem 0.5rem; border-radius: 5px; font-weight: 700;">
                                {{ $url->hits }}
                            </span>
                        </td>
                        <td style="padding: 1rem;">
                            <span style="color: var(--text);">{{ $url->generator->name }}</span>
                        </td>
                        <td style="padding: 1rem; color: var(--text-muted);">
                            {{ $url->created_at->format('d M, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 2rem; text-align: center; color: var(--text-muted);">No links generated yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div style="margin-top: 1.5rem;">
    {{ $urls->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection

