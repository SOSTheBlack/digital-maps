<?php

namespace App\Http\Controllers\Api\Users;

use App\Exceptions\AppException;
use App\Http\Requests\Api\Users\StorageUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class StorageController extends UserController
{
    /**
     * Handle the incoming request.
     *
     * @param  StorageUserRequest  $request
     *
     * @return UserResource|JsonResponse
     *
     * @throws AppException
     */
    final public function __invoke(StorageUserRequest $request): UserResource|JsonResponse
    {
        try {
            DB::beginTransaction();

            /** @var User $newUser */
            $newUser = $this->userRepository->create($request->only($this->modelUser->getFillable()));
            $newUser->token = $this->userRepository->generateToken($newUser);

            DB::commit();

            return new UserResource($newUser);
        } catch (Throwable $exception) {
            try {
                DB::rollBack();
            } catch (Throwable $e) {
                throw new AppException(__('error creating user'));
            }

            return response()->json(['message' => 'error creating user'], Response::HTTP_BAD_REQUEST);
        }
    }
}
