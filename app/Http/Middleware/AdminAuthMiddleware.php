<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Log message to check if user is authenticated
            \Log::info('User not authenticated');
            return redirect()->route('home')->with('error', 'Unauthorized Access');
        }

        if (!Auth::user()->isAdmin()) {
            // Log message to check if user is not an admin
            \Log::info('User is not an admin');
            return redirect()->route('home')->with('error', 'Unauthorized Access');
        }

        // Log message to check if user is authenticated and is an admin
        \Log::info('User is authenticated and is an admin');
        return $next($request);
    }
}
