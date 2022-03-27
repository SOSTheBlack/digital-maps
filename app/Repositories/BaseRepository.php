<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryContracts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository as Repository;

abstract class BaseRepository extends Repository implements BaseRepositoryContracts
{
    /**
     * @param  Request  $request
     *
     * @return Model
     */
    public function createByRequest(Request $request): Model
    {
        return $this->model->create($request->only($this->model->getFillable()));
    }
}
