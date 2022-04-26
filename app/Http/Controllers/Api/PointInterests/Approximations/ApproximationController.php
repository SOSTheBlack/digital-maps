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

    public function __construct()
    {
        parent::__construct();

        $this->initializeApproximation();
    }

    private function initializeApproximation()
    {
        $this->approximationRepository = app(ApproximationRepository::class);
        $this->proximityService = app(ProximityService::class);
    }
}
