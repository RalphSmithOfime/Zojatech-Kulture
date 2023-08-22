<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouriteOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $favouriteId = $request->route('favourite');
            $auth = auth()->id();
            $fav = Favourite::where('id', $favouriteId)
                      ->where('user_id', $auth)->exists();
                      
        if ($fav == 0) 
            return response()->json([
            'message' => 'You are not authorized to perform this action'
        ], Response::HTTP_UNAUTHORIZED);
        } catch(\Throwable $th) {
    
        }
        return $next($request);
    }
}
