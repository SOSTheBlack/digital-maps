<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Requests\Api\PointInterests\ListRequest;
use App\Http\Resources\PointInterestResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ListController extends PointInterestController
{
    /**
     * Handle the incoming request.
     *
     * @param  ListRequest  $request
     *
     * @return PointInterestResource|AnonymousResourceCollection
     */
    public function __invoke(ListRequest $request): PointInterestResource|AnonymousResourceCollection
    {
        return PointInterestResource::collection($this->pointInterestRepository->paginate());
    }
}
