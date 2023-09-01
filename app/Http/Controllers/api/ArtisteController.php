<?php

namespace App\Http\Controllers\Api;

use App\Models\Beat;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Models\{Artiste, User};
use Illuminate\Http\JsonResponse;


use App\Http\Controllers\Controller;
use App\Http\Resources\{ArtisteResource};

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ResponseTrait;
    public function index(Request $request): JsonResponse
    {
        try {
            $artistes = Artiste::latest()->paginate(10)->through(fn ($artistes) => new ArtisteResource($artistes));

            return $this->successResponse('Artistes retrieved successfully', $artistes);
        } catch (\Throwable $th) {
            return $this->errorResponse('Artistes not found');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $artiste = User::findOrFail($id);

            if ($artiste) {
                $artiste = Artiste::where('user_id', $id)->first();
                $artiste->increment('profile_views');
            } else {
                return $this->errorResponse('User is not an Artiste');
            }


            return $this->successResponse('Artiste retrieved successfully', new ArtisteResource($artiste));
        } catch (\Throwable $th) {
            return $this->errorResponse('User not found');
        }
    }

}
