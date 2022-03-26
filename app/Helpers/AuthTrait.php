<?php

namespace App\Helpers;

use App\Models\User;

/**
 * @property User $user
 */
trait AuthTrait
{
    protected User $authUser;

    public function __construct()
    {
        $this->authUser = static::user();
    }

    /**
     * @return User
     */
    public static function user(): User
    {
        return request()->user();
    }
}
