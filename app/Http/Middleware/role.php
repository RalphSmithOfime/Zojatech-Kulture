<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Beat;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $requiredRole): Response
    {
        $user = Auth()->user();


        if (!$user->tokenCan($requiredRole)) {
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
