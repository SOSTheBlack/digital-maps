<?php

namespace App\Services\Proximity\Contracts;

use App\Models\Approximation;
use Illuminate\Database\Eloquent\Collection;

interface ProximityContract
{
    /**
     * Search point interests by the proximity.
     *
     * @param  Approximation  $approximation
     *
     * @return Collection
     */
    public function search(Approximation $approximation): Collection;
}
