<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'superadmin') {
            return $next($request);
        }

        return redirect('/login')->withErrors(['access' => 'You do not have access to this page.']);
    }
}



