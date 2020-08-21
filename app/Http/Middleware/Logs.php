<?php

namespace App\Http\Middleware;

use App\ActivityLog;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Logs
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
        Log::info('test');

        try {

            Log::info('test toto');

            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'action' => $request->getPathInfo(),
                'data' => json_encode($request->input()),
                'url' => $request->getUri(),
                'ip' => $request->getClientIp(),
                'roles' => json_encode(Auth::user()->roles),
            ]);

        }catch (Exception $e){
            Log::debug($e->getTraceAsString());
        }

        return $next($request);
    }


}
