<?php

namespace App\Http\Controllers\Api\PointInterests\Approximations;

use App\Http\Requests\Api\PointInterests\Approximations\StorageRequest;
use App\Http\Resources\PointInterestResource;
use App\Services\Proximity\ProximityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class StorageController extends ApproximationController
{
    final public function __invoke(StorageRequest $request): AnonymousResourceCollection
    {
        return PointInterestResource::collection(
            app(ProximityService::class)->search(
                $this->approximationRepository->createByRequest($request)
            )
        );
    }
}
