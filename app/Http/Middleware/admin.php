<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assuming your user model is named User

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/adminlogin');
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user exists in the database
        if (!$this->isValidUser($user)) {
            // If not, log the user out and redirect
            Auth::logout();
            return redirect('/adminlogin')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }

    /**
     * Check if the user exists in the database.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    private function isValidUser(User $user): bool
    {
        // Check if the user exists in the database
        return User::where('id', $user->id)->exists();
    }
}
