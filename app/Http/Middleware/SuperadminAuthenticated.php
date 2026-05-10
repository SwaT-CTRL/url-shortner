<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperadminAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('superadmin')->check()) {
            return redirect()->route('superadmin.login')
                ->with('error', 'Please login to access the superadmin panel.');
        }

        return $next($request);
    }
}
