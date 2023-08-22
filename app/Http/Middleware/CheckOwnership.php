<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwnership
{
    /**
     * Handle an incoming request.
     * Checks if a users visiting the route is the owner of the resource
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId =  $request->route()?->parameter('id');
        $authUserId = $request->user()?->id;


        if ($userId !== $authUserId) return response()->json([
            'message' => 'You are not authorized to perform this action'
        ], 401);

        return $next($request);
    }
}
