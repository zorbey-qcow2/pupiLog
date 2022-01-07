<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserAgreed
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->agreed === 0) {
            return response()->redirectToRoute('hosgeldin');
        }

        return $next($request);
    }
}
