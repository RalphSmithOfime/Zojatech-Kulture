<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Producer;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Http\JsonResponse;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\{UserResources, ProducerResources};
use App\Models\Artiste;

class UserController extends Controller
{
    use ResponseTrait;
    public function index(Request $request): JsonResponse
    {
        $users = User::latest()->paginate(10)->through(fn ($user) => new UserResources($user));

        return $this->successResponse('Users retrieved successfully', $users);
    }

    public function show(string $id): JsonREsponse
    {
        try {
            $user = User::findOrFail($id);

            // dd($user);

            return $this->successResponse('User retrieved succcessfully', new UserResources($user));
        } catch (\Throwable $th) {

            return $this->errorResponse('user not found', 404);
        }
    }

    public function update(Request $request, string $user): JsonResponse
    {
        try {
            //code...
            $user = User::findOrFail($user);
            $data = $request->all();

            return $this->successResponse('User updated successfully', new UserResources($user));
        } catch (\Throwable $th) {
            return $this->errorResponse('User not found', 404);
        }
    }

    public function destroy(string $user): JsonResponse
    {
        try {
            //code...
            $user = User::findOrFail($user);
            $user->delete();

            return $this->successResponse('User deleted successfully', new UserResources($user));
        } catch (\Throwable $th) {
            return $this->errorResponse('User not found', 404);
        }
    }



}