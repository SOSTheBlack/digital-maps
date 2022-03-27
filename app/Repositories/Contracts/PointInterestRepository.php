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
     * Get the fillable attributes for the model.
     *
     * @return array
     */
    public function getFillable(): array;
}
