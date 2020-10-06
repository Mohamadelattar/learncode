<?php

namespace App\Http\Middleware;

use Closure;

class Owner
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
        // Owner: soltan_algaram41@yahoo.com
        $user = auth()->user();
        if(strtolower($user->email) == 'xhoeger@example.org'){
            return $next($request);
        }
        return abort(404);
    }
}
