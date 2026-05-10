<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminAuthController extends Controller
{

    public function showLogin()
    {
        if (Auth::guard('superadmin')->check()) {
            return redirect()->route('superadmin.dashboard');
        }
        return view('superadmin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::guard('superadmin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('superadmin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('superadmin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('superadmin.login');
    }

    public function dashboard()
    {
        $totalAdmins = \App\Models\Admin::count();
        $totalMembers = \App\Models\Member::count();
        $totalLinks = \App\Models\ShortUrl::count();
        $totalHits = \App\Models\ShortUrl::sum('hits');
        
        // Calculate average hits per link
        $clickRate = $totalLinks > 0 ? round($totalHits / $totalLinks, 1) : 0;

        // Recent activity (latest 5 links)
        $recentUrls = \App\Models\ShortUrl::with('generator')->latest()->take(5)->get();

        return view('superadmin.pages.dashboard', compact(
            'totalAdmins', 
            'totalMembers', 
            'totalLinks', 
            'totalHits', 
            'clickRate',
            'recentUrls'
        ));
    }

}
