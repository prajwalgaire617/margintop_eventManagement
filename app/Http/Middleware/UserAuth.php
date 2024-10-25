<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Closure;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && !$request->is('login')) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
        if (Auth::check()) {
            if ($request->is('login')) {
                return redirect()->intended('/');
            }
        }

        return $next($request);
    }
}
