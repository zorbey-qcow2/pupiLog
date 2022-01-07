<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserBanned
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role_id === 6) {
            return response()->view('login.banned');
        }
        return $next($request);
    }
}
