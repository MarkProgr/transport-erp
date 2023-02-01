<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\RegisterRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function register(RegisterRequest $request): UserResource
    {
        $user = $this->service->register($request->validated());

        return new UserResource($user);
    }

    public function login(LoginRequest $request): UserResource|JsonResponse
    {
        $user = $this->service->login($request->validated(), 'api');

        if (!$user) {
            return response()->json([
                'message' => 'Provided credentials are incorrect',
                'error' => 'Unauthorized'
            ], 401);
        }

        $token = Auth::user()->createToken(config('app.name'));

        $token->token->save();

        return new UserResource($user);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();

        $this->service->logout();

        return response()->json([
            'Successfully logout'
        ]);
    }
}
