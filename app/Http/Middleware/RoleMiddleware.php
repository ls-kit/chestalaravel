<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!auth()->check() || !auth()->user()->hasRole($roles)) {

            return redirect()->back()->with('error', 'You Do not have permission !')->setStatusCode(403);
            // abort(403, 'Unauthorized');
        }
        return $next($request);
    }

}
