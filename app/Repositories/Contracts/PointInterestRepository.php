<?php

namespace App\Repositories\Contracts;

use App\Models\PointInterest;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PointInterestRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface PointInterestRepository extends RepositoryInterface, BaseRepositoryContracts
{
    /**
     * Get all point interest proximity by parameters.
     *
     * @param  int  $latitude
     * @param  int  $longitude
     * @param  int  $meters
     *
     * @return Collection[PointInterest]
     */
    public function searchProximity(int $latitude, int $longitude, int $meters): Collection;
}
