<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\AppException;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AuthController
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse|UserResource
    {
        try {
            $this->authAttempt($request);

            $user = User::where('email', $request['email'])->firstOrFail();
            $user->token = $user->createToken('auth_token')->plainTextToken;

            return new UserResource($user);

        } catch (AppException $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * @throws AppException
     */
    private function authAttempt(LoginRequest $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            throw new AppException('Invalid login details');
        }
    }
}
