<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Requests\Api\PointInterests\StorageRequest;
use App\Http\Resources\PointInterestResource;

final class StorageController extends PointInterestController
{
    /**
     * Handle the incoming request.
     *
     * @param  StorageRequest  $request
     *
     * @return PointInterestResource
     */
    final public function __invoke(StorageRequest $request): PointInterestResource
    {
        $newPointInterest = $this->pointInterestRepository->createByRequest($request);

        return new PointInterestResource($newPointInterest);
    }
}
