<?php

namespace App\Http\Controllers\Api\Users;

use App\Exceptions\AppException;
use App\Http\Requests\Api\Users\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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

            /** @var Collection $userCollection */
            $userCollection = $this->userRepository->findByField('email', $request['email']);

            /** @var User $user */
            $user = $userCollection->first();
            $this->userRepository->generateToken($user);

            return new UserResource($user);
        } catch (Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @param  LoginRequest  $request
     *
     * @return void
     *
     * @throws AppException
     */
    private function authAttempt(LoginRequest $request): void
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            throw new AppException('Invalid login details');
        }
    }
}
