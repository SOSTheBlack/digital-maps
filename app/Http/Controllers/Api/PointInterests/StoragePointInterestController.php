<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Requests\Api\PointInterests\StoragePointInterestRequest;
use App\Http\Resources\PointInterestResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoragePointInterestController extends PointInterestController
{
    /**
     * Handle the incoming request.
     *
     * @param  StoragePointInterestRequest  $request
     *
     * @return PointInterestResource
     */
    public function __invoke(StoragePointInterestRequest $request)
    {
        $fillable = $this->pointInterestRepository->getFillable();
        $data = $request->only($fillable);
        $newPointInterest = $this->pointInterestRepository->create($data);

        return new PointInterestResource($newPointInterest);
    }
}
