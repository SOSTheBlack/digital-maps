<?php

namespace App\Helpers;

use App\Models\User;

/**
 * @property User $user
 */
trait AuthUser
{
    /**
     * @var User|null
     */
    protected ?User $authUser;

    public function __construct()
    {
        $this->authUser = request()->user();
    }
}
