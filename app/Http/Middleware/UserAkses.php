<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  $role): Response
    {
        // if (auth()->user()->role == 'admin') {
        //     return $next($request);
        // }elseif (auth()->user()->role == 'bendahara') {
        //     return $next($request);
        // }elseif (auth()->user()->role == 'operator') {
        //     return $next($request);
        // }else{
        //     return response('Unauthorized', 401);
        // }
        // if (auth::check() && in_array(auth::user()->role, $role)) {
        //     return $next($request);
        // }
        if (auth()->user()->role == $role)  {
            return $next($request);
        }
        else{
            // return response('Unauthorized', 401);
            return response(
                " <h1>Access denied.</h1>"
            );
            // return response()->json(['message' => 'Access denied.'], 403);
        }
    }
}
