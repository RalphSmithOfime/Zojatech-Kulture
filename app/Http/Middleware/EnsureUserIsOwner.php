<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Beat;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $model): Response
    {
        $user = Auth()->user();
        $model = ucfirst($model);
        $model = "App\Models\\$model";

        $modelId = $request->route()->parameter('id');

        $model = $model::findOrFail($modelId);

        if ($user->id !== $model->user_id) {
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
