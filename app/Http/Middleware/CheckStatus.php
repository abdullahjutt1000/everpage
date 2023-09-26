<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        dd('Middleware Executed');
        $userStatus = auth()->user()->status;

        // Check if the user's status is 'profile'
        if ($userStatus === 'profile page') {
            return redirect('profile');
        }

        return $next($request);
    }
}