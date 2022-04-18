<?php

namespace App\Http\Controllers\Api\PointInterests\Approximations;

use App\Http\Controllers\Api\PointInterests\PointInterestController;
use App\Repositories\Contracts\ApproximationRepository;
use App\Services\Proximity\ProximityService;

abstract class ApproximationController extends PointInterestController
{
    /**
     * @var ApproximationRepository
     */
    protected ApproximationRepository $approximationRepository;

    /**
     * @var ProximityService
     */
    protected ProximityService $proximityService;

    /**
     * @param  ApproximationRepository  $approximationRepository
     * @param  ProximityService  $proximityService
     */
    public function __construct(ApproximationRepository $approximationRepository, ProximityService $proximityService)
    {
        $this->approximationRepository = $approximationRepository;
        $this->proximityService = $proximityService;
    }
}
