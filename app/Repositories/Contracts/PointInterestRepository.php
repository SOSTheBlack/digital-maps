<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PointInterestRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface PointInterestRepository extends RepositoryInterface, BaseRepositoryContracts
{
    /**
     * @param  int  $latitude
     * @param  int  $longitude
     * @param  int  $meters
     *
     * @return mixed
     */
    public function searchProximity(int $latitude, int $longitude, int $meters): \Illuminate\Database\Eloquent\Collection;
}
