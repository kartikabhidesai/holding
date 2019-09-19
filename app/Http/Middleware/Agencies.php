<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Agencies
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="agencies")
    {
        if(Auth::guard()->guest()){
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('admin-login');
            }
        }
        return $next($request);
    }
}
