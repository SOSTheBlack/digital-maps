<?php

namespace App\Repositories;

use App\Models\Approximation;
use App\Repositories\Contracts\ApproximationRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class ApproximationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
final class ApproximationRepositoryEloquent extends BaseRepository implements ApproximationRepository
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
