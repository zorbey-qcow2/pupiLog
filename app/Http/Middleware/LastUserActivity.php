<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $expiresAt = Carbon::now()->addMinutes(10); // keep online for 10 min
            Cache::put('user-is-online-' . auth()->user()->id, true, $expiresAt);

            // last seen
            User::where('id', auth()->user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s") , 'last_action' => request()->path()]);
        }

        return $next($request);
    }
}
