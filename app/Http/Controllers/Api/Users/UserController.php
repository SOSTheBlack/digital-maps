<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;

abstract class UserController extends ApiController
{
    /**
     * @var User
     */
    protected User $modelUser;

    protected UserRepository $userRepository;

    /**
     * @param  User  $user
     */
    public function __construct(User $user, UserRepository $userRepository)
    {
        $this->modelUser = $user;
        $this->userRepository = $userRepository;
    }
}
