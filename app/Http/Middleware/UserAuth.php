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
            return redirect()->route('login');
        }
        if (Auth::check()) {
            if ($request->is('login')) {
                return redirect()->intended('/');
            }
            if (!Auth::user()->isAdmin && $request->is('events')) {
                return redirect()->intended('/')->with('error', 'You must be admin to access this page.');
            }
        }
        return $next($request);
    }
}
