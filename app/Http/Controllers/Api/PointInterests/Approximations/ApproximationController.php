<?php

namespace App\Http\Controllers\Api\PointInterests\Proximity;

use App\Http\Controllers\Api\PointInterests\PointInterestController;
use App\Repositories\Contracts\ProximityRepository;

abstract class ProximityController extends PointInterestController
{
    /**
     * @var ProximityRepository
     */
    protected ProximityRepository $proximityRepository;

    /**
     * @param  ProximityRepository  $proximityRepository
     */
    public function __construct(ProximityRepository $proximityRepository)
    {
        $this->proximityRepository = $proximityRepository;
    }
}
