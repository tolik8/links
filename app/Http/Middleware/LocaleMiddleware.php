<?php

namespace App\Http\Middleware;

use Closure;
use Lang;

class LocaleMiddleware
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
        if ($request->hasCookie('language')) {
            Lang::setLocale($request->cookie('language'));
        }

        return $next($request);
    }
}
