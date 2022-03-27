<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ApproximationRepository;
use App\Models\Approximation;
use App\Validators\ApproximationValidator;

/**
 * Class ApproximationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ApproximationRepositoryEloquent extends BaseRepository implements ApproximationRepository
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
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
