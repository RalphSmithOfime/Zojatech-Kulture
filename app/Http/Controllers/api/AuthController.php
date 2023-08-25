<?php

namespace App\Http\Controllers\api;

use App\Models\Artiste;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\MediaService;
use Illuminate\Http\JsonResponse;
use App\Models\{User, Producer, };
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResources;

class AuthController extends Controller
{
    //
    use ResponseTrait;
    public function register(SignUpRequest $request): JsonResponse
    {
        $data = $request->all();

        if ($request->hasFile('profile_picture')) {
            $imageUrl = MediaService::uploadImage($request->file('profile_picture'), 'profileImages');
        }

        $user = User::create(array_merge(
            $request->validated(),
            [
                'username' =>  $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'profile_picture' => $imageUrl ?? '',
                'user_type' => $request->user_type,
                'password' => $request->password,
                'confirm_password' => $request->confirm_password,
            ]
        ));

        if ($data['user_type'] === 'producer') {
            $user->producers()->create(['user_id' => $user->id]);
        } elseif ($data['user_type'] === 'artiste') {
            $user->artistes()->create(['user_id' => $user->id]);
        }
       
        return $this->successResponse('User created successfully', [
            'user' => new UserResources($user)
        ]);
    }
    
    public function signin(LoginRequest $request): JsonResponse
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->errorResponse('Invalid credentials', 401);
        }

        $token = $user->generateToken();

        $token = $user->createToken($user->email, [$user->user_type])->accessToken;

        return $this->successResponse('User logged in successfully', [
            'token' => $token,
            'user' => new UserResources($user)
        ]);
    }

    public function signout(Request $request): JsonResponse
    {
        Auth::logout();

        return $this->successResponse('User logged out successfully');
        
    }
}
