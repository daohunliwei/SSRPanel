<?php

namespace App\Http\Middleware;

use Cookie;
use Closure;
use Redirect;

class Affiliate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $aff = trim($request->get('aff', 0));
        if ($aff) {
            Cookie::queue('register_aff', $aff, 129600);
        }

        return $next($request);
    }
}
