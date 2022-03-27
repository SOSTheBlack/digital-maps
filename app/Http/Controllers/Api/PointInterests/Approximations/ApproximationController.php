<?php

namespace App\Http\Controllers\Api\PointInterests\Approximations;

use App\Http\Controllers\Api\PointInterests\PointInterestController;
use App\Repositories\Contracts\ApproximationRepository;

abstract class ApproximationController extends PointInterestController
{
    /**
     * @var ApproximationRepository
     */
    protected ApproximationRepository $approximationRepository;

    /**
     * @param  ApproximationRepository  $approximationRepository
     */
    public function __construct(ApproximationRepository $approximationRepository)
    {
        $this->approximationRepository = $approximationRepository;
    }
}
