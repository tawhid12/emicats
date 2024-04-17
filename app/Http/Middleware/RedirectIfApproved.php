<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfApproved
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status == 1) {
            return $next($request);
        } else {
            Auth::logout(); // Logout the user
            return redirect()->route('login')->with('status', 'Your account is not approved.'); // Redirect to login with a status message
        }
    }
}
