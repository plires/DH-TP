<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class AdminMiddleware
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
        if (!Auth::user()) {
            return redirect()->guest('home');
        }

        if (Auth::user()->admin != 1) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('home');
            }
        }

        return $next($request);
        

    }
}
