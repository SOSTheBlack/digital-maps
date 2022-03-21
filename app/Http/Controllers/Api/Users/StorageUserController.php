<?php

namespace App\Http\Controllers\Api\Users;

use App\Exceptions\AppException;
use App\Http\Requests\Api\User\StorageUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
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

            $newUser = $this->modelUser->create($request->only($this->modelUser->getFillable()));
            $var = $newUser->createToken($newUser->uuid);
            dump($newUser->token);

            DB::commit();

            return new UserResource($newUser);
        } catch (Throwable $exception) {
            dd($exception);
            try {
                DB::rollBack();
            } catch (Throwable $e) {
                throw new AppException(__('error creating user'));
            }
        }
    }
}
