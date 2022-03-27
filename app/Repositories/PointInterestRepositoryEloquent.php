<?php

namespace App\Repositories;

use App\Models\PointInterest;
use App\Repositories\Contracts\PointInterestRepository;
use Illuminate\Database\Eloquent\Collection;
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
     * @return void
     *
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get all point interest proximity by parameters.
     *
     * @param  int  $latitude
     * @param  int  $longitude
     * @param  int  $meters
     *
     * @return Collection[PointInterest]
     */
    public function searchProximity(int $latitude, int $longitude, int $meters): Collection
    {
        return $this->model
            ->whereBetween('latitude', [
                $latitude - $meters,
                $latitude + $meters
            ])->whereBetween('longitude', [
                $longitude - $meters,
                $longitude + $meters
            ])->get();
    }
}
