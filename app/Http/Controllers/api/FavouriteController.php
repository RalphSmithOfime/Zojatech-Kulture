<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):JsonResponse
    {
        try {

            $user = $request->user();
            $favourites = Favourite::where('user_id', '=', $user?->id)->paginate(10);

            return response()->json([
                'message' => 'Saved for later Successfully',
                'data' => $favourites,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'You have no beats Saved',
                
            ], Response::HTTP_OK);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FavouriteRequest $request):JsonResponse
    {
        try {

            $user = $request->user();
            $userInput = $request->user()?->id;
            $favourite = Favourite::create($request->validated());

            return response()->json([
                'message' => 'Beat has been saved for later successfully.',
                'data' => $favourite,
            ], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Beat has already been saved!',
            ], Response::HTTP_FORBIDDEN);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            //code...

            $favourite = Favourite::findOrFail($id);
            $favourite->delete();


            return response()->json([
                'message' => "Beat has been unsaved!",
                'data' => $favourite,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Beat not found in saved list.",
            ], Response::HTTP_NOT_FOUND);
    }
}
}