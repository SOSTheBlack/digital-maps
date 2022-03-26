<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\PointInterestRepository;

class PointInterestController extends ApiController
{
    /**
     * @var PointInterestRepository
     */
    protected PointInterestRepository $pointInterestRepository;

    /**
     * @param  PointInterestRepository  $pointInterestRepository
     */
    public function __construct(PointInterestRepository $pointInterestRepository)
    {
        $this->pointInterestRepository = $pointInterestRepository;
    }
}
