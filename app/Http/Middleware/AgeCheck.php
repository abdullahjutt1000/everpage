<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // print_r('dd');
        // exit;
        if ($request->route()->named('signup')) {
            if ($request->route()->named('profile')) {
                return redirect()->route('signup');
            }
        }

        return $next($request);
    }


}