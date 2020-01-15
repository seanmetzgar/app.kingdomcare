<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $lastActive = Carbon::parse($user->last_active_at);
            $now = Carbon::now();

            if ($lastActive->diffInMinutes($now) >= 15) {
                $user->update([
                    'last_active_at' => $now->toDateTimeString(),
                    'last_active_ip' => $request->getClientIp()
                ]);
            }
        }
        return $next($request);
    }
}
