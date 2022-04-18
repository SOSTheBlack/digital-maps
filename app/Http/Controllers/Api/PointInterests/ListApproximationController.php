<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Requests\Api\PointInterests\ListApproximationRequest;
use App\Http\Resources\PointInterestResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ListApproximationController extends PointInterestController
{
    /**
     * Handle the incoming request.
     *
     * @param  ListApproximationRequest  $request
     *
     * @return PointInterestResource|AnonymousResourceCollection
     */
    public function __invoke(ListApproximationRequest $request): PointInterestResource|AnonymousResourceCollection
    {
        return PointInterestResource::collection($this->pointInterestRepository->paginate());
    }
}
