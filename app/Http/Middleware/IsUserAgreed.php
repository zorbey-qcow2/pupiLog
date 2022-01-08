<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserAgreed
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('agreed')) {
            if (session('agreed') === "false") {
                return response()->redirectToRoute('hosgeldin');
            }
        }

        return $next($request);
    }
}
