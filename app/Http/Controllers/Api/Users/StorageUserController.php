<?php

namespace App\Http\Controllers\Api\Users;

use App\Exceptions\AppException;
use App\Http\Requests\Api\User\StorageUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class StorageUserController extends UserController
{
    /**
     * Handle the incoming request.
     *
     * @param  StorageUserRequest  $request
     *
     * @return UserResource
     *
     * @throws AppException
     */
    public function __invoke(StorageUserRequest $request): UserResource
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
        }
    }
}
