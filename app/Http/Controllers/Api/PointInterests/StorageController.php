<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Requests\Api\PointInterests\StorageRequest;
use App\Http\Resources\PointInterestResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class StorageController extends PointInterestController
{
    /**
     * Handle the incoming request.
     *
     * @param  StorageRequest  $request
     *
     * @return PointInterestResource
     */
    public function __invoke(StorageRequest $request)
    {
        $fillable = $this->pointInterestRepository->getFillable();
        $data = $request->only($fillable);
        $newPointInterest = $this->pointInterestRepository->create($data);

        return new PointInterestResource($newPointInterest);
    }
}
