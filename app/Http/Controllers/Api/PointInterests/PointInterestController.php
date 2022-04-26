<?php

namespace App\Http\Controllers\Api\PointInterests;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\PointInterestRepository;

abstract class PointInterestController extends ApiController
{
    /**
     * @var PointInterestRepository
     */
    protected PointInterestRepository $pointInterestRepository;

    public function __construct()
    {
        $this->initializePointInterest();
    }

    public function initializePointInterest()
    {
        $this->pointInterestRepository = app(PointInterestRepository::class);
    }
}
