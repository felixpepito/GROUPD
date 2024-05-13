<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not authenticated
        if (!Auth::check()) {
            return redirect('/adminlogin')->with('error', 'Please login as admin.');
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user is an admin
        if (!$user->isAdmin()) {
            // If not, redirect with error message
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        // User is authenticated and is an admin, allow access
        return $next($request);
    }
}
