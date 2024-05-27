<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole(['super_admin', 'admin'])) {
                return $next($request);
            }
            Auth::logout();
            return redirect()->route('login')->with('error', "You have been logged out because you don't 
                        have permission to access this page.");
            // abort(403, "User doesn't have permission to access this page!");
        }
        return redirect()->route('login')->with('error', 'Please log in to access this page.');
    }
}
