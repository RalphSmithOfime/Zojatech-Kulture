<?php

namespace App\Http\Controllers\api;

use App\Models\Beat;
use App\Http\Controllers\Controller;
use App\Models\{Genre, Producer};
use Illuminate\Http\Request;
use App\Http\Resources\BeatResources;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Services\MediaService;
use Symfony\Component\HttpFoundation\StreamedResponse;

use App\Http\Requests\{UploadBeatRequest};
use GuzzleHttp\Psr7\Stream;

class BeatController extends Controller
{
    //
    use ResponseTrait;
    public function index(): JsonResponse
    {
        //
        $beats = Beat::all();

        $beats = Beat::latest()->paginate(10)->through(fn ($beat) => new BeatResources($beat));
        return $this->successResponse('Beats retrieved successfully', $beats);
    }


    public function upload(UploadBeatRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $user = Auth()->user();

            if (!$user) {
                return $this->errorResponse('User not found');
            }

            $userId = $user->id;

            $producer = Producer::where('user_id', $userId)->first();

            if (!$producer) {
                return $this->errorResponse('User is not a producer');
            }

            $genre = Genre::where('name', $data['genre'])->first();

            if (!$genre) {
                return $this->errorResponse('Genre not found');
            }
            $genreId = $genre->id;

            if ($request->hasFile('image')) {
                $imageUrl = MediaService::uploadImage($request->file('image'), 'beatsImages');
            }

            if ($request->hasFile('audio')) {
                $audioUrl = MediaService::uploadAudio($request->file('audio'), 'beatsAudios');
            }

            $beat = Beat::create(array_merge(
                $request->validated(),
                [
                    'duration' => '00:51',
                    'size' => $data['audio']->getSize(),
                    'type' => $data['audio']->getMimeType(),
                    'imageUrl' => $imageUrl,
                    'fileUrl' => $audioUrl,
                    'user_id' => $userId,
                    'producer_id' => $producer->id,
                    'genre_id' => $genreId
                ]
            ));

            //update producer beats count
            $producer->increment('total_beats');

            //update Genere
            $genre->increment('total_uploads');
            $genre->increment('number_of_beats');



            return $this->successResponse('Beat uploaded successfully', new BeatResources($beat), 201);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            $beat = Beat::find($id);

            if (!$beat) {
                return $this->errorResponse('Beat not found');
            }
            $beat->increment('view_count');


            return $this->successResponse('Beat retrieved successfully', new BeatResources($beat));
        } catch (\Throwable $th) {
            return $this->errorResponse('Beat not found');
        }
    }

    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $beat = Beat::findOrFail($id);


            $beat->update($request->all());
            return $this->successResponse('Beat updated successfully', new BeatResources($beat));
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $beat = Beat::findOrFail($id);
            $beat->delete();
            return $this->successResponse('Beat deleted successfully', new BeatResources($beat));
        } catch (\Throwable $th) {
            return $this->errorResponse('Beat not deleted');
        }
    }

    public function trending(): JsonResponse
    {
        try {
            $beats = Beat::orderBy('view_count', 'desc')->take(10)->get();
            return $this->successResponse('Trending beats retrieved successfully', BeatResources::collection($beats));
        } catch (\Throwable $th) {
            return $this->errorResponse('Trending beats not found');
        }
    }

    public function download(string $id): StreamedResponse
    {
        try {
            $beat = Beat::find($id);
          
    
            if (!$beat) {
                return $this->errorResponse('Beat not found');
            }
    
            $downloadInfo = MediaService::downloadAsset($beat->fileUrl);
            
        
            // Prepare the response for download
            $filename = $downloadInfo['filename'];
            $contentType = $downloadInfo['content-type'];
            $fileContent = $downloadInfo['content'];
    
            $headers = [
                'Content-Type' => $contentType,
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
    
            //update beat download count
            $beat->increment('download_count'); 

            //update producer download count
            $beat->producer->increment('total_downloads');

            //update genre download count
            $beat->genre->increment('total_downloads');

            return response()->stream(function () use ($fileContent) {
                echo $fileContent;
            }, 200, $headers);

        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
    
}
