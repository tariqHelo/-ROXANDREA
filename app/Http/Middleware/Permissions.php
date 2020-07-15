<?php

namespace App\Http\Middleware;

use Closure;

class Permissions
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
       $retutn = $next($request);
       
       $loggedInUser = auth()->user();

       $requestedRouteName = $request()->route()->getName();

       
    }
}
