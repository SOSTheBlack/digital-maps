<?php

namespace App\Repositories;

use App\Models\PointInterest;
use App\Repositories\Contracts\PointInterestRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class PointInterestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PointInterestRepositoryEloquent extends BaseRepository implements PointInterestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return PointInterest::class;
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
