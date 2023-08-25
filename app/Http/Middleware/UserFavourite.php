<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserFavourite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $favourites = Favourite::where('user_id', '=', $user?->id)->get();

        if ($favourites == null) {
            return response()->json([
                'message' => 'You are not authorized to perform this action'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
