<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $user = auth()->user();

        if($user->admin == 1) {
            return $next($request);
        }else {
            return abort(404);
        }
    }
}
