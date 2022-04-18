<?php

namespace App\Http\Controllers\Api\Users;

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
     */
    public function __invoke(StorageUserRequest $request): UserResource|JsonResponse
    {
        try {
            DB::beginTransaction();

            /** @var User $newUser */
            $newUser = $this->userRepository->create($request->only($this->modelUser->getFillable()));
            $this->userRepository->generateToken($newUser);

            DB::commit();

            return new UserResource($newUser);
        } catch (Throwable $e) {
            \Log::error('error creating user', $e->getTrace());

            try {
                DB::rollBack();
            } catch (Throwable $e) {
                \Log::error('error creating user', $e->getTrace());
            }

            return response()->json(['message' => 'error creating user'], Response::HTTP_BAD_REQUEST);
        }
    }
}
