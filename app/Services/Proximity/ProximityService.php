<?php

namespace App\Services\Proximity;

use App\Models\Approximation;
use App\Repositories\Contracts\PointInterestRepository;
use App\Services\Proximity\Contracts\ProximityContract;
use Illuminate\Database\Eloquent\Collection;

class ProximityService implements ProximityContract
{
    private PointInterestRepository $pointInterestRepository;

    /**
     * @param  PointInterestRepository  $pointInterestRepository
     */
    public function __construct(PointInterestRepository $pointInterestRepository)
    {
        $this->pointInterestRepository = $pointInterestRepository;
    }

    /**
     * Search point interests by the proximity.
     *
     * @param  Approximation  $approximation
     *
     * @return Collection
     */
    public function search(Approximation $approximation): Collection
    {
        return $this->pointInterestRepository->searchProximity($approximation->latitude, $approximation->longitude, $approximation->meters);
    }
}
