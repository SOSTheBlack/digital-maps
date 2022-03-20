<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;

abstract class UserController extends ApiController
{
    /**
     * @var User
     */
    protected User $modelUser;

    /**
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->modelUser = $user;
    }
}
