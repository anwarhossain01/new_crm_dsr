<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        // Check if the token exists and has the "Bearer" prefix
        if ($token ) {
            // Attach the token to the request for further use
            $request->merge(['token' => $token]);
            return $next($request);
        }

        return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
    }
}
