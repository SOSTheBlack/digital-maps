<?php

namespace App\Http\Controllers\Api\PointInterests\Approximations;

use App\Http\Requests\Api\PointInterests\Approximations\StorageRequest;
use App\Http\Resources\ApproximationResource;

final class StorageController extends ApproximationController
{
    final public function __invoke(StorageRequest $request): ApproximationResource
    {
        return new ApproximationResource($this->approximationRepository->createByRequest($request));
    }
}
