<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Vendor
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

        if (!Auth::guard('vendor')->check()) {
            return redirect('/user/vendor/login');
          }
        return $next($request);
    }
}
