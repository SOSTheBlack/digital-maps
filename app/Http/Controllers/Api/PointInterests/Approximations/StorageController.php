<?php

namespace App\Http\Controllers\Api\PointInterests\Approximations;

use App\Http\Requests\Api\PointInterests\Approximations\StorageRequest;
use App\Http\Resources\PointInterestResource;
use App\Models\Approximation;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class StorageController extends ApproximationController
{
    /**
     * @param  StorageRequest  $request
     *
     * @return AnonymousResourceCollection
     */
    final public function __invoke(StorageRequest $request): AnonymousResourceCollection
    {
        /** @var Approximation $newApproximation */
        $newApproximation = $this->approximationRepository->createByRequest($request);
        $pointInterestsByProximity = $this->proximityService->search($newApproximation);

        return PointInterestResource::collection($pointInterestsByProximity);
    }
}
