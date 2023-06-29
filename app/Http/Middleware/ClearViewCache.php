<?php

namespace App\Http\Middleware;

use Closure;
use Artisan;
class ClearViewCache
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
          Artisan::call('view:clear');
          
        return $next($request);
    }
}
