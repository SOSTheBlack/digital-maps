<?php

namespace App\Repositories;

use App\Models\Approximation;
use App\Repositories\Contracts\ProximityRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class ApproximationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
final class ProximityRepositoryEloquent extends BaseRepository implements ProximityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Approximation::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
