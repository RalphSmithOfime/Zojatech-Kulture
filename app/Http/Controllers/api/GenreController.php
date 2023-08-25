<?php

namespace App\Http\Controllers\api;
use App\Traits\ResponseTrait;
use App\Models\Genre;
use App\Http\Requests\CreateGenreRequest;
use App\Http\Resources\GenreResources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    //
    use ResponseTrait;
    public function index(): JsonResponse
    {
       $genres = Genre::all();
         return $this->successResponse('Genres retrieved successfully', GenreResources::collection($genres));
    }

    public function show(string $id):  JsonResponse
    {
        try {
            $genre = Genre::findOrFail($id);
            return $this->successResponse('Genre retrieved successfully', new GenreResources($genre));

        } catch (\Throwable $th) {
            return $this->okResponse($th->getMessage());
        }
    }

    public function store(CreateGenreRequest $request): JsonResponse
    {
        try {
            
            $Genre = Genre::create([
                'name' => $request->name,

            ]);

            return $this->successResponse('Genre created successfully', new GenreResources($Genre), 201);
        } catch (\Throwable $th) {

            return $this->okResponse('Genre not created');
        }
    }

    public function update(Request $request,string $id): JsonResponse
    {
       try {
            $genre = Genre::findOrFail($id);
            $genre->update($request->all());
            return $this->successResponse('Genre updated successfully', new GenreResources($genre));
       } catch (\Throwable $th) {
            return $this->okResponse('Genre not updated');
       }
    }


    public function destroy(string $id): JsonResponse
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();
            return $this->successResponse('Genre deleted successfully', new GenreResources($genre));
        } catch (\Throwable $th) {
            return $this->okResponse('Genre not deleted');
        }
    }

    public function trending(): JsonResponse
    {
        try {
            $genres = Genre::orderBy('total_uploads', 'desc ')->take(10)->get();
            return $this->successResponse('Trending genres retrieved successfully', GenreResources::collection($genres));
        } catch (\Throwable $th) {
            return $this->okResponse('Trending genres not found');
        }
    }
}
