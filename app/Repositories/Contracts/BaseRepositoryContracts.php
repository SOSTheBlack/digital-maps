<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface BaseRepositoryContracts
{
    /**
     * Create new record in model with request data.
     *
     * @param  Request  $request
     *
     * @return Model
     */
    public function createByRequest(Request $request): Model;
}
