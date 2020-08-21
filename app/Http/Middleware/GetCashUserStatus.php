<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GetCashUserStatus
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
        if (Auth::user()->status == null || Auth::user()->approved_at == null) {
            abort(433); //Not the correct error code but useful. Pending Account
        }

        if (Auth::user()->status == 1 && Auth::user()->approved_at != null) {
            return $next($request);
        }

        if (Auth::user()->status == 10) {
            abort(423); //Blocked Account
        }

        abort(403);
    }
}
