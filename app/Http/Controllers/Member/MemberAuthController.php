<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShortUrl;

class MemberAuthController extends Controller
{
    public function showLogin()
    {
        return view('member.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('member')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('member.dashboard'));
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('member.login');
    }

    public function dashboard()
    {
        $member = Auth::guard('member')->user();
        $totalUrls = ShortUrl::where('generator_type', get_class($member))
                             ->where('generator_id', $member->id)
                             ->count();
        $totalClicks = ShortUrl::where('generator_type', get_class($member))
                               ->where('generator_id', $member->id)
                               ->sum('hits');

        return view('member.pages.dashboard', compact('totalUrls', 'totalClicks'));
    }
}
