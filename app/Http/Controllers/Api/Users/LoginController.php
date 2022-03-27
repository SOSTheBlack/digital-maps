<?php

namespace App\Http\Controllers\Api\Users;

use App\Exceptions\AppException;
use App\Http\Requests\Api\Users\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class LoginController extends UserController
{
    /**
     * Handle the incoming request.
     *
     * @param  LoginRequest  $request
     *
     * @return JsonResponse|UserResource
     */
    final public function __invoke(LoginRequest $request): JsonResponse|UserResource
    {
        try {
            $this->authAttempt($request);

            /** @var User $user */
            $user = $this->userRepository->findByField('email', $request['email'])->first();
            $user->token = $this->userRepository->generateToken($user);

            return new UserResource($user);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], Response::HTTP_UNAUTHORIZED);
        }
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
