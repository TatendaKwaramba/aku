<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App;

class GetCashAdmin
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
        if(Auth::user()->hasRole('admin_global')){
            return $next($request);
        }

        $url_path = $request->getPathInfo();
        $url = App\Url::where('path', $url_path )->first();
        if($url != null){
            foreach ($url->uielements as $element){
                foreach ($element->urls as $assoc_url){
                    if($assoc_url->path == $url_path){
                        $roles = $element->roles;
                        foreach ($roles as $role){
                            if(Auth::user()->hasRole($role->name)){
                                return $next($request);
                            }
                        }
                    }
                }
            }
        }

        abort(403);
    }
}
