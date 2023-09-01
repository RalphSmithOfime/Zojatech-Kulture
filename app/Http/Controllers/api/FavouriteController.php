<?php

namespace App\Http\Controllers\api;

use App\Models\Beat;
use App\Models\User;
use App\Models\Artiste;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\FavouriteResource;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id)
    {
        $auth = auth()->id();
        $artiste = Artiste::where('user_id', $auth)->first();
        $favourites = $artiste->favourites;
         
        return response()->json([
            'message' => 'favourites displayed successfully',
            'favourites' => FavouriteResource::collection($favourites)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        try {
            $authId = auth()->id();

            if (!$authId) {
                return $this->errorResponse('User not found');
            }

            $artiste = Artiste::where('user_id', $authId)->first();
            // $artiste = User::find($auth);
            $beat = Beat::find($id);

            $favourited = $artiste->favourites->contains($beat->id);

            if($favourited) {
                return response()->json([
                    'message' => 'beat already exists in favourites'
                ], 200);
            }
                $artiste->favourites()->attach($beat->id);
                $beat->increment('like_count');

                return response()->json([
                    'message' => 'beat added to favourites'
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'error adding beat to favourites'
            ], 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, string $id): JsonResponse
    {
        try {
            $authId = auth()->id();
            $artiste = Artiste::where('user_id', $authId)->firstOrFail();
            $beat = Beat::findOrFail($id);
            
    
            $isExist = $artiste->favourites()->where('beat_id', $beat->id)->exists();

            if ($isExist) {
                $artiste->favourites()->detach($beat->id);
                $beat->decrement('like_count');
    
                return response()->json([
                    'message' => 'Beat removed from favorites.'
                ], 200);
            }
    
            return response()->json([
                'message' => 'Beat was not in favorites.'
            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'An error occurred while removing the beat from favorites.'
            ], 500);
        }
    }
    
    
}